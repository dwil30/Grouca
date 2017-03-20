function changeClass(){    
    
    var div = document.getElementById('login-menu');
    div.style.display = div.style.display == 'none' ? 'block' : 'block';
    document.getElementById("email").className = "nav-email";
    document.getElementById("password").className = "nav-email nav-password";
    document.getElementById("confirm").className = "nav-email nav-password";
    document.getElementById("continue").className = "nav-email nav-continue";
    document.getElementById("button").className = "button btn-slider none";
    document.getElementById("title").className = "title none";
    document.getElementById("slidertext").className = "slidertext none";
    document.getElementById("titletext").className = "slidertext";
    document.getElementById("security_code").className = "nav-email nav-password";
    document.getElementById("label").className = "label";
    
}