$(document).ready(function(){
    $("#close").on("click", function(){
        $(".show-data").css({
            display:"none"
        });
        $(".show").css({
            display:"none"
        });
    });

    $(".show-edit").on("click", function(){
        console.log($(this).attr("region-id"));
        $(".show-data").css({
            display:"block"
        });
        $(".show").css({
            display:"block"
        });

        $(".id").text("#"+$(this).attr("region-id"));
    });

});