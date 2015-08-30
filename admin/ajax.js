$(function(){
  $(".ajaxCat").on("click", function(){
   var addcat = document.getElementById('addcat').value;
      $.ajax({
        url: 'add-category.php',
        type: 'post',
        data: {'submit': 'Submit',
             'catTitle': addcat,
            },

        success: function(data) {
          $('.categories').append("<input type='checkbox' name='catID[]' value=" + data +"> "+ addcat +  "<br />");
        },

        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
        }
      })
})
})

function delcat(id, title)
{
	if (confirm("Are you sure you want to delete '" + title + "'"))
	{
		$.ajax({
		 url: 'categories.php',
		 type: 'get',
		 data: {'action': 'deleted',
					'delcat': id,
				 },

		 success: function(data) {
			 $("."+id).remove();
		 },

		 error: function(xhr, desc, err) {
			 console.log(xhr);
			 console.log("Details: " + desc + "\nError:" + err);
		 }
	 })
	}
}

function editcat(id, title){
$("#edit"+id).after(" <div class='btn btn-sm btn-info editBtnCat'><i class='fa fa-pencil'></i></div> <input id='catedit' type='text' name='catTitle' value=''>");
$(".editBtnCat").on("click", function(){
	var cattitle = document.getElementById('catedit').value;
console.log(catedit);
$.ajax({
 url: 'edit-category.php',
 type: 'post',
 data: {'submit': 'edited',
			'catID': id,
		'catTitle': cattitle
		 },

 success: function(data) {
	 $("."+id+">td:nth-child(1)").replaceWith("<td>"+cattitle+"</td>");
	$(".editBtnCat").remove();
	$("#catedit").remove();
 },

 error: function(xhr, desc, err) {
	 console.log(xhr);
	 console.log("Details: " + desc + "\nError:" + err);
 }
})
})
}



$(".ajaxCat").on("click", function(){
 var addcat = document.getElementById('addcat').value;
		$.ajax({
			url: 'add-category.php',
			type: 'post',
			data: {'submit': 'Submit',
					 'catTitle': addcat,
					},

			success: function(data) {
				$('.categories').append(
"<tr class='"+data+"'><td>"+addcat+"</td> <td><div class='btn-group' role='group'><a class'btn btn-danger' href='javascript:delcat('"+data+"','"+addcat+"')>Delete</a><a class'btn btn-danger' href='javascript:delcat('"+data+"','"+addcat+"')>Delete</a><a class'btn btn-info' id='edit"+data+"' href='javascript:editcat('"+data+"','"+addcat+"'>Edit</a></div> </td> </tr>");
			},

			error: function(xhr, desc, err) {
				console.log(xhr);
				console.log("Details: " + desc + "\nError:" + err);
			}
		})
})
