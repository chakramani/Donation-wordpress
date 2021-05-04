//js starts here
//Search Bar
var searchBar = document.getElementById("express-form-typeahead");
searchBar.addEventListener('click' , function(){ 
    var closeSearch = document.getElementById("closeSearch");
    closeSearch.style.display = "block";
});
window.addEventListener('mouseup', e =>{
    //alert(e);
    if(e.target != searchBar && e.target.parentNode != searchBar ){
        var closeSearch = document.getElementById("closeSearch");
        closeSearch.style.display = "none";
    }                  
});