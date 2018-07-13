$(document).ready(function(){

    $("#scancode").change(function(){
        var serialcode = $(this).val();

        $.ajax({
            url: 'getOfficeTag.php',
            type: 'post',
            data: {depart:serialcode},
            dataType: 'json',
            success:function(response){

                var len = response.length;

                $("#sel_user").empty();
                for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    $("#equipOfficeTag").append("<option value='"+id+"'>"+name+"</option>");

                }
            }
        });
    });

});