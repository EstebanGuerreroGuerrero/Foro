/*
function likes() {
    $.post("likes.php",
        function (data) {
            var data = JSON.parse(data);

            var comments = "";
            var replies = "";
            var item = "";
            var parent = -1;
            var results = new Array();

            var list = $("<ul class='outer-comment'>");
            var item = $("<li>").html(comments);

            for (var i = 0; (i < data.length); i++) {
                var commentId = data[i]['comentario_id'];
                parent = data[i]['parent_comentario_id'];

                var obj = getStatus(commentId);
            }
        });

}

function getStatus(commentId)
            {
//Llamamos al archivo php
                $.ajax({
                    type: 'POST',
                    async: false,
                    url: 'likes.php',
                    data: {comentario_id: commentId},
                    success: function (data)
                    {
                        totalLikes = data;
                    }

                });

}
*/

    
