$(document).ready(function(){
    $("ul").hide();
});

const searchButton = document.getElementById('mybutton');
const searchInput = document.getElementById('myInput');

searchButton.addEventListener('click', () => {
  myFunction();
  $("ul").show();
});


function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('li');

  // Hide all list items by default
  for (i = 0; i < li.length; i++) {
    li[i].style.display = "none";
  }

  // Loop through all list items, and show those that match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    }
  }
}