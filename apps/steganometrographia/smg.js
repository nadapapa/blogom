$(function(){
  $('#verset').on('click', function(){

    $('#verset').fadeOut(300);

    $.ajax({
      url: 'smg-controller.php',
      type: 'post',
      data: {'sor': $('input[name=sor]').val()},
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call
  });
