function setRecipeId(recipeId) {
    document.getElementById("recipe-id").value = recipeId;
}

document.getElementById("delete-recipe-btn").addEventListener("click", function() {
    var recipeId = document.getElementById("recipe-id").value;
    window.location.href = "process_delete_recipe.php?recipe_id=" + recipeId;
});