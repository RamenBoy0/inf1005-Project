<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Cheese Burger</title>
        <?php
        include "header_home.php";
        ?>
    </head>
  <body>     
    <header>
    <?php
        include "navbar.php";
    ?>  
    </header>
      
    <?php include "search.php" ?>;

    <main class="cuisine-container">
    <section class="recipe-info">
        <h3>Cheese Burger</h3>
        <p>
            A cheeseburger is a type of sandwich that consists of a beef patty, 
            usually grilled or fried, placed between two buns, typically sesame 
            seed buns. The patty is topped with a slice or melted cheese, usually 
            American cheese, and garnished with various toppings such as lettuce, 
            tomato, pickles, onions, ketchup, and mustard. It is a popular fast 
            food item and can be found at many fast food chains and restaurants 
            around the world. The combination of the juicy beef patty, melted 
            cheese, and flavorful toppings make for a delicious and satisfying meal.
        </p>
        <div class="recipe-img">
            <img src="images/cheeseburger.jpg" alt="Cheese Burger">
        </div>
        <div class="recipe-icons">
          <div class="box">
            <h5>prep time</h5>
            <p>15 mins</p>
          </div>
          <div class="box">
            <h5>cook time</h5>
            <p>20 mins</p>
          </div>
          <div class="box">
            <h5>serving</h5>
            <p>2 servings</p>
          </div>
        </div>
      </article>    
    </section>
     
    <section class="recipe-ingredient">
          <h4>Ingredients</h4>
          <p class="single-ingredient">1 pound ground beef (80% lean, 20% fat)</p>
          <p class="single-ingredient">1/2 teaspoon salt</p>
          <p class="single-ingredient">1/4 teaspoon black pepper</p>
          <p class="single-ingredient">4 slices cheddar cheese</p>
          <p class="single-ingredient">4 hamburger buns</p>
          <p class="single-ingredient">Lettuce, tomato, and onion slices, for topping</p>
          <p class="single-ingredient">Ketchup, mustard, and mayonnaise, for serving</p>
    </section>
  
    <section class="recipe-guide">
        <h4>How to cook?</h4>
        <div class="steps">
            <h5>Step 1</h5>
          <p>
            Preheat a grill or grill pan over medium-high heat.
          </p>
        </div>
        <div class="steps">
            <h5>Step 2</h5>
          <p>
            In a large bowl, mix together the ground beef, salt, and black pepper. 
            Divide the mixture into four equal portions and shape each one into 
            a patty about 1/2 inch thick.
          </p>
        </div>
        <div class="steps">
            <h5>Step 3</h5>
          <p>
            Place the burgers on the grill and cook for 3-4 minutes per side for 
            medium-rare, or longer if you prefer a more well-done burger. During 
            the last minute of cooking, place a slice of cheese on top of each 
            burger to melt.
          </p>
        </div>
        <div class="steps">
            <h5>Step 4</h5>
          <p>
            While the burgers are cooking, toast the hamburger buns on the grill 
            or in a toaster.
          </p>
        </div>
        <div class="steps">
            <h5>Step 5</h5>
          <p>
            Assemble the burgers by placing each patty on a bun, and topping it 
            with lettuce, tomato, onion slices, and any other toppings you like.
          </p>
        </div>
        <div class="steps">
            <h5>Step 6</h5>
          <p>
            Serve the burgers hot with ketchup, mustard, and mayonnaise on the 
            side.
          </p>
        </div>
    </section>   
    </main>
  </body>
  
    <footer>
    <?php include "footer.php" ?>;
    </footer>
</html>


