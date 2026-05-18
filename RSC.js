// JavaScript Document
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

var btn = document.getElementById('btn_form');
var form = document.getElementById('my_form');

btn.addEventListener('click', function() {
  if(form.style.display != 'block') {
    form.style.display = 'block';
    return;
  }
  form.style.display = 'none';
});
