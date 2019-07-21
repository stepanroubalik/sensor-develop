$("#metadata").click(function(){
            $.ajax({
                url:'rasterProperties.php',
                type:'POST',
                data:{
                    meta: $("#meta").val(),
					},
                success: function(response){
                    $("#rasterTable").html(response);
                }
            });
        });