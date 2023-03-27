$(document).ready(function () {
  // Send Search Text and Sort Option to the server

  $("#search").keyup(function () {
    let searchText = $(this).val();
    let sortBy = $("#sortBy").val(); // get selected option

    if (searchText != "") {
      $.ajax({
        url: "search_action.php",
        method: "post",
        data: {
          query: searchText,
          sort: sortBy, // pass selected option to the server
        },
        success: function (response) {
          $("#show-list").html(response);
        },
      });
    } else {
      $("#show-list").html("");
    }
  });

  // Listen for changes on the sort option

  $("#sortBy").change(function () {
    let sortBy = $(this).val();
    let searchText = $("#search").val(); // get search text

    if (searchText != "") {
      $.ajax({
        url: "search_action.php",
        method: "post",
        data: {
          query: searchText,
          sort: sortBy, // pass selected option to the server
        },
        success: function (response) {
          $("#show-list").html(response);
        },
      });
    }
  });

  
$(document).on("click", "a", function () {
  // Check if clicked anchor tag is inside the search area
  if (!$(this).closest("#searching").length) {
    return; // Ignore anchor tags outside the search area
  }
  
  // Perform the search
  $("#search").val($(this).text());
  $("#show-list").html("");
});
});