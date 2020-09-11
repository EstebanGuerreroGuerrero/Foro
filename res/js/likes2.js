console.log('jeje');
$(document).ready(function(){
    $(".like").click(function(){
        var comment_id = $("#mg1").val();
        var user = $("#mg2").val();
        var status = $("#mg3").val();

        console.log(comment_id);
        console.log(user);
        console.log(status);
       
        
        $.ajax({

            url: './core/app/action/likes-action.php',
            type: 'POST',
            data: {id:comment_id, user:user, status:status},
            dataType: 'application/json',

            success:function(data){

                var likes = data['likes'];
                var text = data['text'];
                   
                $("#likes_"+comment_id).text(likes);
                $("#"+comment_id).text(likes);
            
                console.log('JEJEJE');

    
            }
            ,
            error: function(jqxhr) {
                console.warn(jqxhr.responseText);
            }
            ,
            
            

        
        });
        
    });
});