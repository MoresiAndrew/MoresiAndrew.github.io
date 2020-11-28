$(document).ready(function(){
    
    $(".nums").click(function(){
        var temp = $("#output").html();
        
        if (temp == "0"){
            $("#output").html($(this).html());
        } else {
            $("#output").html(temp.concat($(this).html()));
        }  
    });
    
    
    $(".equate").click(function(){
        var temp = $("#output").html();
        var prevTemp = $("#prevOutput").html();
        if($(this).html() == "+"){
            
            calculate($(this).html());

        } else if($(this).html() == "-"){
            
            calculate($(this).html());
            
        } else if($(this).html() == "*"){
            
            calculate($(this).html());
            
        } else if($(this).html() == "/"){
            
            calculate($(this).html());
            
        } else if($(this).html() == "C"){
            $("#prevOutput").html("");
            $("#output").html("");
        } else if($(this).html() == "DEL"){
            temp = temp.slice(0, -1);
            $("#output").html(temp);
        } else if($(this).html() == "="){
            calculate($(this).html());
        } else if($(this).html() == "√") {
            
            temp = Math.sqrt(temp);
            $("#output").html(temp);
            $("#prevOutput").html("");
            
        } else if($(this).html() == "."){
            if(temp == ""){
                temp = "0.";
                $("#output").html(temp);
            }
            if(temp.includes(".")){
                
            } else {
                temp = temp.concat(".");
                $("#output").html(temp);
            }
        } else if($(this).html() == "+ / -"){
            temp = parseFloat(temp);
            if( temp > 0) {
                temp = - temp;
            } else if(temp < 0){
                temp = Math.abs(temp);
            }
            
            $("#output").html(temp);
        }
    }); 
    
    function calculate(operand){
        var temp = $("#output").html();
        var prevTemp = $("#prevOutput").html();
        
        if(prevTemp.slice(-1) == "-"){
            if($("#output").html() == ""){
                    prevTemp = prevTemp.slice(0, -1);
                    $("#prevOutput").html(prevTemp.concat(operand));
                    $("#output").html("");
                    return;
                } else {
                    var first = parseFloat($("#prevOutput").html());
                    var second = parseFloat($("#output").html());
                    var total = first - second;
                    total = total.toString();
                    
                    if(operand == "="){
                        $("#output").html(total);
                        $("#prevOutput").html("");
                    } else {
                        $("#prevOutput").html(total.concat(operand));
                        $("#output").html("");
                        return;
                    }
                }
        } else if (prevTemp.includes("+")){
            if($("#output").html() == ""){
                    prevTemp = prevTemp.slice(0, -1);
                    $("#prevOutput").html(prevTemp.concat(operand));
                    $("#output").html("");
                    return;
                } else {
                    var first = parseFloat($("#prevOutput").html());
                    var second = parseFloat($("#output").html());
                    var total = first + second;
                    total = total.toString();
                    
                    if(operand == "="){
                        $("#output").html(total);
                        $("#prevOutput").html("");
                    } else {
                        $("#prevOutput").html(total.concat(operand));
                        $("#output").html("");
                        return;
                    }
                }
            
        } else if (prevTemp.includes("*")){
            if($("#output").html() == ""){
                    prevTemp = prevTemp.slice(0, -1);
                    $("#prevOutput").html(prevTemp.concat(operand));
                    $("#output").html("");
                    return;
                } else {
                    var first = parseFloat($("#prevOutput").html());
                    var second = parseFloat($("#output").html());
                    var total = first * second;
                    total = total.toString();
                    
                    if(operand == "="){
                        $("#output").html(total);
                        $("#prevOutput").html("");
                    } else {
                        $("#prevOutput").html(total.concat(operand));
                        $("#output").html("");
                        return;
                    }
                }
            
        } else if (prevTemp.includes("/")){
                if($("#output").html() == ""){
                    prevTemp = prevTemp.slice(0, -1);
                    $("#prevOutput").html(prevTemp.concat(operand));
                    $("#output").html("");
                    return;
                } else {
                    var first = parseFloat($("#prevOutput").html());
                    var second = parseFloat($("#output").html());
                    var total = first / second;
                    total = total.toString();
                    
                    if(operand == "="){
                        $("#output").html(total);
                        $("#prevOutput").html("");
                    } else {
                        $("#prevOutput").html(total.concat(operand));
                        $("#output").html("");
                        return;
                    }

                }
                
        } else {
            
            $("#prevOutput").html(temp.concat(operand));
            $("#output").html("");
        }
        
                    

    }
});