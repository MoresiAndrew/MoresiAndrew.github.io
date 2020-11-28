$(document).ready(function(){
        $("#name").hide();
        $("#hammingNumber").hide();
        $("#passwordSim").hide();
        $("#listCreator").hide();
        $("#cylinderSurfaceArea").hide();
    
    $("#functions").on('change', function(){
        if($("#functions").val() == "name"){
            $(".submit").attr("type", "button");
            $("input").val("");
            $("#name").show();
            $("#hammingNumber").hide();
            $("#passwordSim").hide();
            $("#listCreator").hide();
            $("#cylinderSurfaceArea").hide();
        } else if($("#functions").val() == "hammingNumber") {
            $(".submit").attr("type", "button");
            $("input").val("");
            $("#name").hide();
            $("#hammingNumber").show();
            $("#passwordSim").hide();
            $("#listCreator").hide();
            $("#cylinderSurfaceArea").hide();
        } else if($("#functions").val() == "passwordSim") {
            $(".submit").attr("type", "button");
            $("input").val("");
            $("#name").hide();
            $("#hammingNumber").hide();
            $("#passwordSim").show();
            $("#listCreator").hide();
            $("#cylinderSurfaceArea").hide();
        } else if($("#functions").val() == "listCreator") {
            $(".submit").attr("type", "button");
            $("input").val("");
            $("#name").hide();
            $("#hammingNumber").hide();
            $("#passwordSim").hide();
            $("#listCreator").show();
            $("#cylinderSurfaceArea").hide();
        } else if($("#functions").val() == "cylinderSurfaceArea") {
            $(".submit").attr("type", "button");
            $("input").val("");
            $("#name").hide();
            $("#hammingNumber").hide();
            $("#passwordSim").hide();
            $("#listCreator").hide();
            $("#cylinderSurfaceArea").show();
        }
    });
    
    $('#name > input').keyup(function(){
       if(($("#firstName").val() == "") || ($("#lastName").val() == "") ) {
           $(".submit").attr("type", "button");
        } else {
            $(".submit").attr("type", "Submit");
        } 
    });
    
    $("#hammingNumber > input").keyup(function(){
        if($("#hamming").val() >= 1){
            $(".submit").attr("type", "Submit");
        } else {
            $(".submit").attr("type", "button");
        }
    });
    
    $("#passwordSim > input").keyup(function(){
        if(($("#password").val() == "") || ($("#username").val() == "")){
            $(".submit").attr("type", "button");
        } else {
            $(".submit").attr("type", "Submit");
        }
    });
    
    $("#listCreator > input").keyup(function(){
        if(($("#firsList").val() == "") || ($("#secondList").val() == "")){
            $(".submit").attr("type", "button");
        } else {
            $(".submit").attr("type", "Submit");
        }
    });
    
    $("#cylinderSurfaceArea > input").keyup(function(){
        if(($("#radius").val() == "") || ($("height").val() == "")){
            $(".submit").attr("type", "button");
        } else {
            $(".submit").attr("type", "Submit");
        }
    });
    
     $(".submit").click(function(){    
        if($(this).attr("type") == "Submit"){
            $(this).parent().submit();            
        } else {
             alert("Sorry, but all fields are required");
        }

    }); 

    $(".clear").click(function(){
        $(".submit").attr("type", "button");
        $("input").val("");
    }); 
});