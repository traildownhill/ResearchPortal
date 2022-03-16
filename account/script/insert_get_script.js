$(document).ready(function () 
    {
      $("#submit").on('click',function()
      {
        //get values from form
        var uname = $("#name").val();
        var uemail = $("#email").val();
        var upassword = $("#password").val();
        var ucategory = $("#category").val();
        var ustatus = $("#status").val();

        if(uname!="" && uemail!="" && upassword!="" && ucategory!="" && ustatus!="")
        {
          //asking ajax
          $.ajax
          ({
            type: "POST",
            url: "post_new_user.php",
            data:
            {
              uname:uname,
              uemail:uemail,
              upassword:upassword,
              ucategory:ucategory,
              ustatus:ustatus,
            },
            cache:false,
            success:function(dataResult)
            {
              var dataResult = JSON.parse(dataResult);
              if(dataResult.statusCode==200)
              {
                //alert('Data Added Successfully!');
                $("#submit-btn").removeAttr("disabled");
                $('#value-form').find('input:text').val('');
                alert("New User Added Succesfully!");
              }
              else if(dataResult.statusCode==201)
              {
                alert("Error occured !");
              }
            }
          });
        }
        else
        {
          alert('Pleae fill all the field!');
        }
      }) 
  });