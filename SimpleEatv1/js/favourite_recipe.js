function addToFavorites(id) {
  // Make an AJAX request to the server to add the recipe to the favorites list
  // Once the request is completed, show a message to the user
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      swal("Success!", "Recipe added to Favourites");
    }
  };
  xhttp.open("GET", "favourites.php?recipe_id=" + id, true);
  xhttp.send();
}