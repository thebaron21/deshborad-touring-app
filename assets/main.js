$(document).ready(function() {
    
    $("#btn").on("click",function(){
        var id  =  document.getElementById("btn").getAttribute("value");    
        $.ajax({
            method: "POST",
            url:"ahmed.php",
            data: {name: id},
            beforeSend:function(xhr){

            },
            success: function(data, status,xhr) {
              console.log(data);
              console.log(status);
              console.log(xhr);  
            },
            error: function(xhr,status,error) {
              console.log(status);
              console.log(xhr);  
                console.log(error);
            }
        });

        window.location.reload();
    });
})