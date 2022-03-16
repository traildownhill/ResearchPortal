
// ready page first
$(document).ready(function(){
    $('#btn_search').click(function(){
        e.preventDefault();

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
              data: "name="+name+"&age="+age+"&message="+message,
            }).done(function( msg ) {
              alert( "Data Saved: " + msg );
            });
    })
})
