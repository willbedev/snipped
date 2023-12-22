jQuery( document ).ready( function( $ ) {
	// inserisce la classe focused.
    $( document ).on( 'focus', 'form input, form textarea, form select', function () {
		if ( ! $(this).parent().siblings('label').hasClass('focused') ) {
			$(this).parent().siblings('label').addClass('focused');
		}
		// eg: email and confirm email
		if ( ! $(this).parent().parent().siblings('legend').hasClass('focused') ) {
			$(this).parent().parent().siblings('legend').addClass('focused');
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
			$( 'form fieldset.gfield--type-time > legend' ).each( function(key, element) {
				$(element).addClass( 'focused' );
			});

			$( 'form input, form textarea, form select' ).each( function( key, element ) {
				if ( $(element).val().length !== 0 ) {
					if ( ! $(element).parent().siblings('label').hasClass('focused') ) {
						$(element).parent().siblings('label').addClass('focused');
					}
					// eg: email and confirm email
					if ( ! $(element).parent().parent().siblings('legend').hasClass('focused') ) {
						$(element).parent().parent().siblings('legend').addClass('focused');
					}
				} /*else {
					if ( $(element).parent().siblings('label').hasClass('focused') ) {
						$(element).parent().siblings('label').removeClass('focused');
					}
					// eg: email and confirm email
					if ( $(element).parent().parent().siblings('legend').hasClass('focused') ) {
						$(element).parent().parent().siblings('legend').removeClass('focused');
					}
				}*/
			});

			$(".gform_wrapper .gfield_required").html("*");
		}
	};

	$( 'body' ).on( 'click', 'input[id^=gform_previous_button_], input[id^=gform_next_button_] ', function() {
		const myFunction = () => {
			$('input, textarea, select').each( function( key, element ) {
				var input = jQuery(element);
				if ( ! $(element).parent().siblings('label').hasClass('focused') && input.val().length !== 0) {
					$(element).parent().siblings('label').addClass('focused');
				} else {
					if ( input.val().length === 0 ) {
						$(element).parent().siblings('label').removeClass('focused');
					}
				}
			});
		};
		setTimeout( myFunction, 1000 );
	});

	// aggiunge la classe focused alle label dopo aver cliccato sul pulsante submit e compaiono degli errori.
	$( 'body' ).on( 'click', 'input[id^=gform_submit_button_]', function() {
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

	$( '.gform_validation_error_link' ).on( 'click', function(e) {
		e.preventDefault();
	});
	
	// Edit form.

	$( "#edit-form .datepicker" ).datepicker({
		changeMonth: true,
		changeYear: true,
		todayHighlight: true,
		autoclose: true,
		//dateFormat: "yy-mm-dd"
	}); // datepicker.

	$( "#edit-form .ginput_container_checkbox > .gfield_checkbox > .gchoice > input" ).on( "click", function() {
		if ( $(this).is(':checked') ) {
			$(this).attr('checked', 'checked');
		} else {
			$(this).removeAttr('checked');
		}
	});

	$( "#edit-form .gfield_radio > .gchoice > input" ).on( "change", function() {
		$( "#edit-form .gfield_radio > .gchoice > input" ).each( function( index ) {
			$(this).prop('checked', false);
		});
		$(this).prop('checked', true);
	});

	var select_value = '';
	$( "#edit-form .ginput_container.ginput_container_select" ).on( "change", function() {
		$( this ).find('option').each( function( index ) {
			if ( $(this).prop('selected') ) {
				select_value = $(this).val();
				$(this).attr( 'selected', 'selected' );
			}
			if ( $(this).val() !== select_value ) {
				$(this).attr( 'selected', false );
			}
		});
	});

	$( "#edit-form .ginput_container.ginput_container_select > select" ).on( "change", function() {
		if ( $(this).val() === 'No' ) {
			$( "#edit-form > div:nth-child(5), #edit-form > div:nth-child(6)" ).css( 'display', 'none' );
		} else {
			$( "#edit-form > div:nth-child(5), #edit-form > div:nth-child(6)" ).css( 'display', '' );
		}
	});

	$( "#edit-form .ginput_container.ginput_container_select > select" ).on( "change", function() {
		if ( $(this).val() === 'No' ) {
			$( "#edit-form > div:nth-child(5), #edit-form > div:nth-child(6)" ).css( 'display', 'none' );
		} else {
			$( "#edit-form > div:nth-child(5), #edit-form > div:nth-child(6)" ).css( 'display', '' );
		}
	});

	$( "#edit-form .ginput_container.ginput_container_select > select > option" ).each(function() {
		if ( $(this).prop('selected') && $(this).val() === 'No' ) {
			$( "#edit-form > div:nth-child(5), #edit-form > div:nth-child(6)" ).css( 'display', 'none' );
		}
	});

	// ajax edit form
	$( '#edit-form-submit-modify' ).on( 'click', function(e){
		e.preventDefault();

		var data    = $('input#results').data('results');
		var id_form = $('#edit-form').attr('data-formid');

		$.each( data, function( index, value ) {
			if ( value[0].includes(".") ) {
				var tmp = value[0].split('.');
				value[0] = tmp[0] + '\\.' + tmp[1];
			}

			// console.log( $( "#input_"+id_form+"_"+value[0] ), $( "#input_"+id_form+"_"+value[0] ).prop('type') );

			/*if ( typeof $( "#input_"+id_form+"_"+value[0] ).prop('type') === 'undefined' ) {
				$( "#input_"+value[0] + ' input' ).each( function(index2, value2) {
					if ( $(value2).is(':checked') ) {
						data[index][1] = $(value2).val();
					}
				});
			}*/

			if ( $( "#input_"+id_form+"_"+value[0] ).prop('type') === 'text' ) {
				data[index][1] = $( "#input_"+id_form+"_"+value[0] ).val();
			}

			if ( $( "#input_"+id_form+"_"+value[0] ).prop('type') === 'textarea' ) {
				data[index][1] = $( "#input_"+id_form+"_"+value[0] ).val();
			}

			if ( $( "#input_"+id_form+"_"+value[0] ).hasClass('gfield_radio') ) {
				$( "#input_"+id_form+"_"+value[0] ).find('>div>input').each( function(index2, value2) {
					if ( $(this).is(':checked') ) {
						data[index][1] = $(this).val();
					}
				});
			}

			if ( $( "#input_"+id_form+"_"+value[0] ).prop('type') === 'select-one' ) {
				$( "#input_"+id_form+"_"+value[0] ).find( 'option' ).each( function(index2, value2) {
					if ( $(this).is(':checked') ) {
						data[index][1] = $(this).val();
					}
				});
			}

			if ( $( "#input_"+id_form+"_"+value[0] ).hasClass('ginput_container_time') ) {
				var hour    = $( "#input_"+id_form+"_"+value[0]+"_1" ).val();
				var minutes = $( "#input_"+id_form+"_"+value[0]+"_2" ).val();
				data[index][1] = hour+":"+minutes;
			}

			if ( $( "#"+value[0] ).prop('type') === 'checkbox' ) {
				if ( ! $( "#"+value[0] ).is(':checked') ) {
					data[index][1] = '';
				} else {
					data[index][1] = $( "#"+value[0] ).val();
				}
			}
		});
		
		$.ajax({
			type: 'POST',
			url: ajax_edit_form.ajaxurl,
			data: {
				action : 'editform',
				data: data,
				//security : ajax_edit_form.security,
			},
			beforeSend:function(xhr){
				$( '#edit-form-submit-modify' ).append( '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: transparent; display: block;" width="30px" height="30px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><g transform="translate(20 50)"><circle cx="0" cy="0" r="20" fill="#456caa"><animateTransform attributeName="transform" type="scale" begin="-0.375s" calcMode="spline" keySplines="0.3 0 0.7 1;0.3 0 0.7 1" values="0;1;0" keyTimes="0;0.5;1" dur="1s" repeatCount="indefinite"></animateTransform></circle></g><g transform="translate(40 50)"><circle cx="0" cy="0" r="20" fill="#88a2ce"><animateTransform attributeName="transform" type="scale" begin="-0.25s" calcMode="spline" keySplines="0.3 0 0.7 1;0.3 0 0.7 1" values="0;1;0" keyTimes="0;0.5;1" dur="1s" repeatCount="indefinite"></animateTransform></circle></g><g transform="translate(60 50)"><circle cx="0" cy="0" r="20" fill="#c2d2ee"><animateTransform attributeName="transform" type="scale" begin="-0.125s" calcMode="spline" keySplines="0.3 0 0.7 1;0.3 0 0.7 1" values="0;1;0" keyTimes="0;0.5;1" dur="1s" repeatCount="indefinite"></animateTransform></circle></g><g transform="translate(80 50)"><circle cx="0" cy="0" r="20" fill="#fefefe"><animateTransform attributeName="transform" type="scale" begin="0s" calcMode="spline" keySplines="0.3 0 0.7 1;0.3 0 0.7 1" values="0;1;0" keyTimes="0;0.5;1" dur="1s" repeatCount="indefinite"></animateTransform></circle></g></svg>');
			},
			success: function( response ) {
				if ( response.message === 'success' ) {
					window.location = window.location.pathname + '?msg=ok';
				}
			},
			error: function( errorThrown ) {
				console.log( errorThrown );
			},
			complete: function(){
				$( '#edit-form-submit-modify svg' ).remove();
			}
		});

	});
});
