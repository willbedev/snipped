nel script

  $('#menu_placeholder').on('click', function () {
    let rows = $(document).find('#container-competenze .et_pb_row_4col');
    $(rows).each(function (key,row) {
      console.log()
      if ( $(row).hasClass('menu') ){
        $(row).removeClass('menu');
      }
      else{
        $(row).addClass('menu');
      }
    });
  });
  
  bel css
      #container-competenze.servizi-page .et_pb_row_4col {
        max-height: 0;
        overflow: hidden;
        transition: max-height 1s ease-out;
    }

    #container-competenze.servizi-page .et_pb_row_4col.menu {
        max-height: 1000px;
        transition: max-height 1s ease-out;
    }
