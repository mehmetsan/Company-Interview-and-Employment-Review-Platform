var active = false;

document.querySelector('.btn-hold').addEventListener('click', function() {

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
}
);
