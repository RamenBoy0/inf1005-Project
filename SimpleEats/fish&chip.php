<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Fish & Chip</title>
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
        <h3>Fish & Chip</h3>
        <p>
            Fish and chips is a classic British dish that consists of battered
            fish and deep-fried chips (French fries). 
        </p>
        <div class="recipe-img">
            <img src="images/fishandchips.jpg" alt="Fish & Chips">
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
          <p class="single-ingredient">2 large potatoes, peeled and cut into thick wedges</p>
          <p class="single-ingredient">Vegetable oil for frying</p>
          <p class="single-ingredient">1 lb white fish fillets (cod, haddock, or pollock)</p>
          <p class="single-ingredient">1 cup all-purpose flour</p>
          <p class="single-ingredient">1/2 cup cornstarch</p>
          <p class="single-ingredient">1 teaspoon baking powder</p>
          <p class="single-ingredient">1/2 teaspoon salt</p>
          <p class="single-ingredient">1 cup cold beer</p>
          <p class="single-ingredient">Lemon wedges and tartar sauce for serving</p>
    </section>
   
    <section class="recipe-guide">
        <h4>How to cook?</h4>
        <div class="steps">
            <h5>Step 1</h5>
          <p>
            Rinse the potato wedges in cold water and pat them dry with a paper towel.
          </p>
        </div>
        <div class="steps">
            <h5>Step 2</h5>
          <p>
            Heat the vegetable oil in a deep fryer or a large pot over medium-high 
            heat. When the oil is hot, add the potato wedges and fry them for 
            6-8 minutes until they are golden brown and crispy. Remove the fries 
            with a slotted spoon and drain them on paper towels.
          </p>
        </div>
        <div class="steps">
            <h5>Step 3</h5>
          <p>
            In a large bowl, whisk together the flour, cornstarch, baking powder, 
            and salt. Gradually pour in the beer, whisking until the batter is 
            smooth and thick.
          </p>
        </div>
        <div class="steps">
            <h5>Step 4</h5>
          </header>
          <p>
            Cut the fish fillets into bite-sized pieces and pat them dry with a 
            paper towel.
          </p>
        </div>
        <div class="steps">
            <h5>Step 5</h5>
          <p>
            Dip the fish pieces in the batter, shaking off any excess, and 
            carefully drop them into the hot oil. Fry the fish for 4-5 minutes 
            until they are golden brown and cooked through. Remove the fish 
            with a slotted spoon and drain them on paper towels.
          </p>
        </div>
        <div class="steps">
            <h5>Step 6</h5>
          <p>
            Serve the fish and chips hot with lemon wedges and tartar sauce.
          </p>
        </div>
    </section>   
    </main>
  </body>
  
    <footer>
    <?php include "footer.php" ?>;
    </footer>
</html>
