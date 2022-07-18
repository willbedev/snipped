
$("#myModal").hide();
function closeSlide() {
    $(".mySlides").each(function () {
        $(this).hide();
    });
}

closeSlide();
let modalOpen= false;


$(document).ready(function () {

    
    $(".gfield.imagine img").click(function (event) {
        element = $(event.target).attr('onclick');
        if ($(event.target).attr('onclick').startsWith("currentSlide(")) {
            element = element.replace("currentSlide(", "");
            element = element.replace(")", "");
        }
        showSlides(element);
        $("#myModal").show();
        modalOpen=true
        console.log('open')
    });
    
    $('.close.cursor').on('click',function() {
        console.log($(this))
            $("#myModal").hide();
            closeSlide()    
            modalOpen = false
    })
    
    $('#myModal').on('click', function (e) {
        console.log(e.target.tagName)
        if (modalOpen && e.target.tagName!='IMG') {
            $("#myModal").hide();
            closeSlide()
            modalOpen = false
        }
    })
    
    
});
$(document).on('keydown',function (e) {
    console.log(e)
    if (e.key == "Escape") {
        $("#myModal").hide();
        closeSlide()
        modalOpen = false
    }   
});



function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    $($('.mySlides')[n-1]).show();
    console.log($('.mySlides')[n - 1],n);
}
