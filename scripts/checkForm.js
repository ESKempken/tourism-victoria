function muralFormCheck(){

    var width = document.forms["muralForm"]["width"].value;
    var height = document.forms["muralForm"]["height"].value;
    var location = document.forms["muralForm"]["location"].value;
    var price = document.forms["muralForm"]["price"].value;
    var description = document.forms["muralForm"]["description"].value;
    var image = document.forms["muralForm"]["image"].value;
    var artist = document.forms["muralForm"]["artist"].value;
    var isValid = true;


    if(width ==""){
        document.getElementById('width').placeholder="Width must be provided";
        isValid = false;
    } else {
        document.getElementById('width').placeholder="Meters";
    }
    if(height ==""){
        document.getElementById('height').placeholder="Height must be provided";
        isValid = false;
    } else {
        document.getElementById('height').placeholder="Meters";
    }
    if(location ==""){
        document.getElementById('location').placeholder="Location must be provided";
        isValid = false;
    } else {
        document.getElementById('location').placeholder="";
    }
    if(price ==""){
        document.getElementById('price').placeholder="Price must be provided";
        isValid = false;
    } else {
        document.getElementById('price').placeholder="$";
    }
    if(description ==""){
        document.getElementById('description').placeholder="Description must be provided";
        isValid = false;
    } else {
        document.getElementById('description').placeholder="";
    }
    if(image ==""){
        document.getElementById('imageError').innerHTML="Image must be provided";
        isValid = false;
    } else {
        document.getElementById('imageError').innerHTML="Upload successful";
    }
    if(artist ==""){
        document.getElementById('artist').placeholder="Artist name must be provided";
        isValid = false;
    } else {
        document.getElementById('artist').placeholder="";
    }

    return isValid;
}