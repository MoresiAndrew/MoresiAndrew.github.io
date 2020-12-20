$(function(){    
    $(".nav").load("nav.php");
    
    var $infoTabs = $("#mainWrapper").tabs();
    var $cipherTabs = $("#mainCipherWrapper").tabs();
    
    
    $("loginSubmit[type=submit]").button();
    
    var url = window.location.href;
    var activePage = url;
    
    if(activePage == "https://moresiandrew.github.io/Ajm9ccFinalProject"){
        activePage = "https://moresiandrew.github.io/Ajm9ccFinalProject/index.php";
    } else if (activePage == "https://moresiandrew.github.io/Ajm9ccFinalProject/login.php"){
        activePage = "https://moresiandrew.github.io/Ajm9ccFinalProject/login_form.php";
    }
    
   
    
    $("#nav a").each(function(){
        var link = this.href;
        if(activePage == link){
            $(this).closest('a').removeClass('name');
            $(this).closest("a").addClass("active");
        }
    });
    
    $("input[name='cCode']").change(function(){
            $("#caesarMessage").val('');
            $("#caesarOutput").val('');
            $("#shift").val('');
    });
    
    $("input[name='vCode']").change(function(){
        $("#vigenereMessage").val('');
        $("#vigenereOutput").val('');
        $("#key").val('');
    });
    
    $("#caesarSubmit").click(function(){
        
        if($("#caesarMessage").val() == ""){
            alert("Please fill out all fields");
        } else if($("#shift").val() == ""){
            alert("Please fill out all fields");
        } else {
        
            var code = $("input[name='vCode']:checked").val();
            
            var options = {
                "code": code,
                "message": $("#caesarMessage").val(),
                "shift": $("#shift").val()
            }


            $.getJSON("Ajm9ccFinalProjectF20.php", options, function(data){
                var $temp = data;
                
                console.log(data);
                
                $("#caesarOutput").val($temp);
            });
        }

    });
    
    $("#vigenereSubmit").click(function(){
           
        if($("#vigenereMessage").val() == ""){
            alert("Please fill out all fields");
        } else if($("#shift").val() == ""){
            alert("Please fill out all fields");
        } else {
            var code = $("input[name='vCode']:checked").val();
            
            var options = {
                "code": code,
                "message": $("#vigenereMessage").val(),
                "key": $("#key").val()
            }


            $.getJSON("Ajm9ccFinalProjectF20.php", options, function(data){
                var $temp = data;
                
                console.log(data);
                
                if($temp == "Please enter all fields"){
                    var $error = $temp;
                } else {
                    $("#vigenereOutput").val($temp);
                }
            });

        }
    });
    
});