$(function(){

  var counter = 3;
  $(".loadAjax").on("click", function(){
      $.ajax({
        url: 'includes/ajax.php',
        type: 'get',
        data: {'page': counter},

        success: function(data) {
          if(data == ''){
            $('.loadAjax').html('no more');
            $('.loadAjax').attr('disabled', true);
          }
          counter += 3;
            $('.posts').append(data);
        },

        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
        }
      })
})
})
