var active = false;

var link1 = document.getElementById("edit-btn");
if (typeof window.addEventListener != "undefined") {
    link1.addEventListener("click",handleclick,false);
} else {
    link1.attachEvent("onclick",handleclick);
}


function handleclick(){


    if(active){
      document.getElementById('edit-btn').textContent = "Edit Profile";
      var els = document.getElementsByClassName("test");
      Array.prototype.forEach.call(els, function(el) {
        el.contentEditable = "false";
      })
      active = false;


    }
    else{
      document.getElementById('edit-btn').textContent = "Finish Editing";
      var els = document.getElementsByClassName("test");
      Array.prototype.forEach.call(els, function(el) {
        el.contentEditable = "true";
      })
      active = true;

    }
};
