$(document).ready(function()
{
	console.log("Website is Ready");
	$("#id").attr("disabled", "disabled");
	var today = new Date();
	var dd = String(today.getDate()).padStart(2, '0');
	var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
	var yyyy = today.getFullYear();
	var hh =today.getHours();
	var mm = today.getMinutes();
	var ss = today.getSeconds();
  
	today = yyyy + dd + hh + mm + ss;
	
	document.getElementById("id").value = today;
	console.log(today);

  
	//Verification of Textbox
	$("#submit").click(function(){
	//if form is not empty
	var id = $('#id').val();
	var title = $('#title').val();
	var abstract = $('#abstract').val();
	var comment = $('#comment').val();
	var author = $('#author').val();
	var email = $('#email').val();
	var dpub = $('#dpub').val();
	var fstudy = $('#fstudy').val();
	var tags = $('#tags').val();
	  
	$.ajax({
	type: "POST",
	url: "http://localhost/ResearchPortal/papers/api/api_new_book_post.php",
	data: 	"id="+id+
			"&title="+title+
			"&abstract="+abstract+
			"&comment="+comment+
			"&author="+author+
			"&email="+email+
			"&dpub="+dpub+
			"&fstudy="+fstudy+
			"&tags="+tags,
			beforeSend: function(data)
			{  
				alert("this test");  
			}
	});
	



	// if($.trim($('#title').val()).length == 0)
	// {
	//  alert("Please Enter the title");
	//  return false;
	// }
	// if($.trim($('#abstract').val()).length == 0)
	// {
	//  alert("Please Enter the abstract");
	//  return false;
	// }
	// if($.trim($('#author').val()).length == 0)
	// {
	//  alert("Please Enter the author");
	//  return false;
	// }
	// if($.trim($('#email').val()).length == 0)
	// {
	//  alert("Please Enter the email");
	//  return false;
	// }
	// if($.trim($('#dpub').val()).length == 0)
	// {
	//  alert("Please Enter the date publish");
	//  return false;
	// }
	// if($.trim($('#fstudy').val()).length == 0)
	// {
	//  alert("Please Enter the field of study");
	//  return false;
	// }
	// else if($.trim($('#tags').val()).length == 0)
	// {
	//  alert("Please Enter Atleast one tag");
	//  return false;
	// }
	// else
	// {
	
	// }
   });
});