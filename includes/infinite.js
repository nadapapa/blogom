$(function(){
  var counter = 3;
  $(".loadAjax").on("click", function(){
      $.ajax({
        url: 'includes/ajax.php',
        type: 'get',
        data: {'page': counter,
               'pagetype': pagetype,
               'catid': catid,
               'from': from,
               'to': to
             },

        success: function(data) {
          if(data == ''){
            $('.loadAjax').html('Nincs több :(');
            $('.loadAjax').attr('disabled', true);
          } else {
            counter += 3;
            $('.posts').append(data);
            $('.loadAjax').html('Még ' + remaining + ' poszt');
          }
          if(remaining <= 0) {
            $('.loadAjax').html('Nincs több :(');
            $('.loadAjax').attr('disabled', true);
          }

        },

        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
        }
      })
})
})
