jQuery( document ).ready( function( $ ) {

	// inserisce la classe focused.
    $( document ).on( 'focus', 'form input, form textarea, form select', function () {
		if ( ! $(this).parent().siblings('label').hasClass('focused') ) {
			$(this).parent().siblings('label').addClass('focused');
		}
	});

	// rimuove la classe focused.
	$( document ).on( 'focusout', 'form input, form textarea, form select', function () {
		var input = jQuery(this);
		if ( input.val().length === 0 ) {
			$(this).parent().siblings('label').removeClass('focused');
		}
	});

	// observer su tutti i field.
	const targetNode = document.querySelector( '#main' );

	// Options for the observer (which mutations to observe)
	const config = { attributes: true, childList: false, subtree: true };

	// Callback function to execute when mutations are observed
	const callback = ( mutationList, observer ) => {
		for ( const mutation of mutationList ) {
			if ( mutation.type === 'childList' ) {
				// console.log( 'A child node has been added or removed.', mutation );
			} else if ( mutation.type === 'attributes' ) {
				// console.log( `The ${mutation.attributeName} attribute was modified.`, mutation );
			}
		}
		for ( const mutation of mutationList ) {
			$( 'form input.datepicker' ).each( function(key, element) {
				if ( typeof $( element ).val() === 'string' ) {
					$(element).parent().siblings( 'label' ).addClass( 'focused' );
				}
			});
			$( 'form .wrap input, form .wrap textarea, form .wrap select' ).each( function( key, element ) {
				if ( typeof $( element ).val() === 'string' ) {
					if ( $(element).val().length !== 0 ) {
						$(element).parent().siblings( 'label' ).addClass( 'focused' );
					} else {
						if ( $(element).parent().siblings( 'label' ).hasClass( 'focused' ) ) {
							$(element).parent().siblings( 'label' ).removeClass( 'focused' );
						}
					}
				}
			});
			$(".gform_wrapper .gfield_required").html("*");
		}
	};

	$( 'body' ).on( 'click', 'input[id^=gform_previous_button_], input[id^=gform_next_button_] ', function() {
		const myFunction = () => {
			$('input, textarea, select').each( function( key, element ) {
				if ( ! $(element).parent().siblings('label').hasClass('focused') ) {
					$(element).parent().siblings('label').addClass('focused');
				} else {
					var input = jQuery(element);
					if ( input.val().length === 0 ) {
						$(element).parent().siblings('label').removeClass('focused');
					}
				}
			});
		};
		setTimeout( myFunction, 1000 );
	});

	// aggiunge la classe focused alle label dopo aver cliccato sul pulsante submit e compaiono degli errori.
	$( 'body' ).on( 'click', 'input[id^=gform_submit_button_], input[id^=gform_next_button_] ', function() {
		const myFunction = () => {
			if ( 'validation error', $( '.gform_validation_errors' ).length ) {
				$( 'form input, form textarea, form select' ).each( function( key, element ) {
					//console.log( typeof $( element ).val() );
					if ( typeof $( element ).val() === 'string' ) {
						if ( $(element).val().length !== 0 ) {
							$(element).parent().siblings( 'label' ).addClass( 'focused' );
						}
					}
					if ( $( element )[0].getAttribute( "aria-describedby" ) !== null ) {
						var attributesAriaDescribedby = $( element )[0].getAttribute( "aria-describedby" ).toString();
						if ( attributesAriaDescribedby.match("^validation_message") ) {
							if ( typeof $( element ).val() === 'string' ) {
								if ( $(element).val().length !== 0 ) {
									$(element).parent().siblings( 'label' ).addClass( 'focused' );
								} else {
									if ( $(element).parent().siblings( 'label' ).hasClass( 'focused' ) ) {
										$(element).parent().siblings( 'label' ).removeClass( 'focused' );
									}
								}
							}
							$(element).parent().siblings( 'label' ).css( 'color', '#c02b0a' );
						}
					}

					// datepicker.
					if ( $( element )[0].getAttribute( "aria-describedby" ) !== null && $( element ).hasClass( 'datepicker' ) ) {
						var attributesAriaDescribedby = $( element )[0].getAttribute( "aria-describedby" ).toString();
						// console.log( $( element )[0].getAttribute( "aria-describedby" ).toString(),  attributesAriaDescribedby.includes( 'validation_message' ) );
						if ( attributesAriaDescribedby.includes( 'validation_message' ) ) {
							if ( typeof $( element ).val() === 'string' ) {
								$(element).parent().siblings( 'label' ).addClass( 'focused' );	
							}
							$(element).parent().siblings( 'label' ).css( 'color', '#c02b0a' );
						}
					}
				});
			}
		};
		setTimeout( myFunction, 1000 );
	});

	// Create an observer instance linked to the callback function
	const observer = new MutationObserver( callback );

	// Start observing the target node for configured mutations
	observer.observe( targetNode, config );
	//oserver

	$( '.gform_wrapper .gfield_required' ).html( '*' );
});