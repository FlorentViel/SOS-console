
const button = document.querySelector('#flexCheckDefault1');
const arrow = document.querySelector('#arrow');
button.addEventListener("click", Arrow );


function Arrow(button, arrow) {
  document.querySelector('#arrow').style.display="block";
  document.querySelector('#arrow').classList.add("arrow1");
}