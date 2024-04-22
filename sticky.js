window.onscroll = function () {
  myFunction();
};

function myFunction() {
  var header = document.getElementById("myHeader");
  var sticky = header.offsetTop;

  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
