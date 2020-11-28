var inManifest = [];
var photos = [];
var slideIndex = 1;
var slides;
var rover = "";
var site = "";
var camera = [];

$(document).ready(function(){

    
    
    rover = $("#rovers").val();
    getManifest("https://api.nasa.gov/mars-photos/api/v1/manifests/curiosity?api_key=x3ij4A7Z997rlBbyNdh8Uz344b8k2t8mkoqfdwZI");
    getRovers(rover);
    
    site = "https://api.nasa.gov/mars-photos/api/v1/rovers/" + rover + "/photos";
    options = {
        "sol": $("#sol").val(),
        "api_key": "x3ij4A7Z997rlBbyNdh8Uz344b8k2t8mkoqfdwZI"
    };
    
    getPhotos(site, options);
    
    $("#rovers").change(function(){
        rover = $("#rovers").val();
        site = "https://api.nasa.gov/mars-photos/api/v1/manifests/" + $(this).val() + "?api_key=x3ij4A7Z997rlBbyNdh8Uz344b8k2t8mkoqfdwZI";
        getRovers(rover);
        getManifest(site);
        $("#sol").val("");
        $("#camera").empty();
    });
    
        var correct = 0;

        $("#sol").keyup(function(){   

            getCameras();
            var i;
            var x = 0;
            for(i in inManifest){
                if(inManifest[i].sol == $("#sol").val()){
                    x = 1;
                }
            }
            if(x == 0){
                alert("That sol has no photos");
            }
        });
    
        $("#sol").change(function(){   
          
            getCameras();
            var i;
            var x = 0;
            for(i in inManifest){
                if(inManifest[i].sol == $("#sol").val()){
                    x = 1;
                }
            }
            if(x == 0){
                alert("That sol has no photos");
            }
        });

        var options;

        $("#query").click(function(){
            slideIndex = 1;

            site = "https://api.nasa.gov/mars-photos/api/v1/rovers/" + rover + "/photos";
            
            options = {
                "sol": $("#sol").val(),
                "api_key": "x3ij4A7Z997rlBbyNdh8Uz344b8k2t8mkoqfdwZI"
            };

            $("img").remove(".photos");
            $("#loader").css("display", "inline-block");
            $.get(site, options, function(data){

                
                photos = data.photos;
                var image = "";
                for(i in photos){
                    if(photos[i].camera.name == $("#camera").val()){
                        image = "<img class='photos' style='display:none' src='" + photos[i].img_src + "' />";
                        $("#photoWrapper").append(image);
                    }
                }
                $("#loader").css("display", "none");
                showSlides(slideIndex);
            });

   
        }); 

    $("#prev").click(function(){
        plusSlides(-1);
    });
    
     $("#next").click(function(){
        plusSlides(1);
    });
    
}); 

function getPhotos(url, options){
    $.get(url, options, function(data){
        photos = data.photos;
    });
}

function getRovers(rover){
    var xmlHttp = new XMLHttpRequest();
    
    xmlHttp.onload = function() {
        if(xmlHttp.status == 200) {
            var xmlDoc = xmlHttp.responseXML;
            
            var roverName = xmlDoc.getElementsByTagName("name");
            var roverDesc = xmlDoc.getElementsByTagName("description");
            
            if(rover == "curiosity"){
                $("#roverTitle").html(roverName[0].textContent);
                $("#roverData").html(roverDesc[0].textContent);
            } else if(rover == "opportunity"){
                $("#roverTitle").html(roverName[1].textContent);
                $("#roverData").html(roverDesc[1].textContent);
            } else if(rover == "spirit"){
                $("#roverTitle").html(roverName[2].textContent);
                $("#roverData").html(roverDesc[2].textContent);
            }
            
            
        }
        
        
    };
    
    xmlHttp.open("GET", "https://www.professorwergeles.com/webService.php?content=data&format=xml", true);
    xmlHttp.send();
}

function getManifest(site){
    $.getJSON(site, function(data){
        inManifest = data.photo_manifest.photos;
    });
}

function getCameras(){
    $("#camera").empty();
    $.each(inManifest, function(index, value){
        if(inManifest[index].sol == $("#sol").val()){
            $.each(inManifest[index].cameras, function(i, val){
                $("#camera").append(new Option(inManifest[index].cameras[i],    inManifest[index].cameras[i]));
            });    
            
        }
    });
}
        
function showSlides(n){
    var i;
    slides = $(".photos");
    if(n > slides.length){
        slideIndex = 1;
    }
    if(n < 1){
        slideIndex = slides.length;
    }
    for(i=0; i < slides.length; i++){
        slides[i].style.display = "none";
    }
    slides[slideIndex-1].style.display = "block";
    slides[slideIndex-1].style.position = "relative";
    slides[slideIndex-1].style.margin = "auto";
    slides[slideIndex-1].style.maxWidth = "100%";
    slides[slideIndex-1].style.maxHeight = "100%";
}

function plusSlides(n) {
    showSlides(slideIndex += n);
}   
