/*jslint browser: true*/
/*global $, jQuery, alert*/
$(document).ready(function(){
    $("#priority").on("input", function() {
    $(this).next("#value").html(this.value); 
    }); 
    $("#alert").hide();
    
    var theme = "light";
    
    if(theme == "light"){
        $("td").css("color", "white")
    } else if (theme == "dark") {
        $("td").css("color", "black")
    }
    
    $("#add").click(function(){

        console.log($("#title").attr("id") + " = " + $("#title").val());

        console.log($("#type").attr("id") + " = " + $("#type").val());

        console.log($("#priority").attr("id") + " = " + $("#priority").val());

        console.log($("#date").attr("id") + " = " + $("#date").val());

        var date = $("#date").val();

        var inputDate = new Date(date);
        var currDate = new Date();
        
        var stars = "";
        
        if(inputDate < currDate) {
            alert("Select a future date");
        }
        
        if($("#title").val() == "") {
            $("#alert").show();
        } else if($("#type").val() == null) {
            $("#alert").show();
        } else if($("#priority").val() == 0 ) {
            $("#alert").show();
        } else if($("#date").val() == "") {
            $("#alert").show();   
        } else {
            $("#alert").hide();
            
            if($("#priority").val() == 1){
                stars = '<img src="1star.png" >'
            } else if ($("#priority").val() == 2) {
                stars = '<img src="2stars.png" >'
            } else if ($("#priority").val() == 3) {
                stars = '<img src="3stars.png" >'
            } else if ($("#priority").val() == 4) {
                stars = '<img src="4stars.png" >'
            } else if ($("#priority").val() == 5) {
                stars = '<img src="5stars.png" >'
            }
            
            $(".toDoTable").find('tbody')
                .append($('<tr>')
                        .attr("class", "toDo")
                        .append($('<td>')
                                .append("<span>")
                                .text($("#title").val())
                               )
                        .append($('<td>')
                                .append("<span>")
                                .text($("#type").val())
                               )
                        .append($('<td>')
                                .append(stars)
                                .attr("class", "stars")
                               )
                        .append($('<td>')
                                .append("<span>")
                                .text($("#date").val())
                               )
                        .append($('<td>')
                                .html('<img src="checkmark.jpg" class="action">')
                               )
                       );

        }
        

    });

    $("#clear").click(function(){
        $("#title").val("");
        $("#type").val("");
        $("#priority").val("0");
        $("#date").val("null");
        $("#value").text("0");
    });
    
    
    $("body").on('click', 'img' ,function(){
        $(this).closest('tr').remove();
    });
    
    $("#theme").click(function(){
        if(theme == "light") {
            theme = "dark";
            $("#theme").text("Theme: Dark");
            $("body").css("background-color", "#5c5c5c");
            $("#toDoWrapper").css("background-color", "aqua");
            $("th").css("color", "black");
            $("td").css("color", "black");
            $("#header").css("color", "silver");
            $("#navigate").css("color", "silver");
        } else if (theme == "dark") {
            theme = "light";
            $("#theme").text("Theme: Light");
            $("body").css("background-color", "lightblue");
            $("#toDoWrapper").css("background-color", "grey");
            $("th").css("color", "white");
            $("td").css("color", "white");
            $("#header").css("color", "black");
            $("#navigate").css("color", "black");
        }
        
    });
    
    var header = "";
    
    $("#header").dblclick(function(){
        header = prompt("Please enter the new title", "To Do List");
        $("#header").text(header);
    });

});