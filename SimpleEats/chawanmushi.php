<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Chawanmushi</title>
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
        <h3>Chawanmushi</h3>
        <p>
            Chawanmushi is a traditional Japanese dish that is a type of savory 
            custard made with eggs, dashi (a type of Japanese soup stock), and 
            soy sauce. The custard is typically steamed in a small, lidded bowl 
            called a chawan.
            
            Chawanmushi is often served as an appetizer or as part of a multi-course 
            meal. It is usually garnished with toppings such as seafood, chicken, 
            or vegetables. The dish is known for its delicate, silky texture and 
            subtle flavors.
            
            Chawanmushi can be made with a variety of ingredients, but some common 
            additions include shrimp, shiitake mushrooms, ginkgo nuts, and 
            kamaboko (fish cake). The dish is often enjoyed in Japan during the 
            autumn and winter months, when the ingredients used in the dish are 
            in season.
        </p>
        <div class="recipe-img">
            <img src="images/chawanmushi.jpg" alt="Chawanmushi">
        </div>
        <div class="recipe-icons">
          <div class="box">
            <h5>prep time</h5>
            <p>10 mins</p>
          </div>
          <div class="box">
            <h5>cook time</h5>
            <p>15 mins</p>
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
          <p class="single-ingredient">2 large eggs</p>
          <p class="single-ingredient">1 cup dashi broth</p>
          <p class="single-ingredient">1 tablespoon soy sauce</p>
          <p class="single-ingredient">1 tablespoon mirin</p>
          <p class="single-ingredient">1/2 teaspoon salt</p>
          <p class="single-ingredient">1/2 teaspoon sugar</p>
          <p class="single-ingredient">2 shiitake mushrooms, sliced</p>
          <p class="single-ingredient">2 tablespoons cooked shrimp, chopped</p>
          <p class="single-ingredient">2 tablespoons frozen peas</p>
          <p class="single-ingredient">2 small cooked shrimp or scallops, for garnish (optional)</p>
          <p class="single-ingredient">Fresh herbs, such as cilantro or shiso leaves, for garnish (optional)</p>
    </section>
   
    <section class="recipe-guide">
        <h4>How to cook?</h4>
        <div class="steps">
            <h5>Step 1</h5>
          <p>
            In a medium bowl, whisk together the eggs until frothy.
          </p>
        </div>
        <div class="steps">
            <h5>Step 2</h5>
          <p>
            In a separate bowl, whisk together the dashi broth, soy sauce, mirin, 
            salt, and sugar until well combined.
          </p>
        </div>
        <div class="steps">
            <h5>Step 3</h5>
          <p>
            Slowly pour the dashi mixture into the eggs, whisking constantly, 
            until well combined.
          </p>
        </div>
        <div class="steps">
            <h5>Step 4</h5>
          <p>
            Strain the egg mixture through a fine mesh sieve into a measuring 
            cup or bowl with a spout.
          </p>
        </div>
        <div class="steps">
            <h5>Step 5</h5>
          <p>
            Divide the sliced mushrooms, chopped shrimp, and peas among 2 small 
            ceramic cups or ramekins.
          </p>
        </div>
        <div class="steps">
            <h5>Step 6</h5>
          <p>
            Pour the egg mixture into the cups, filling them about 3/4 of the way full.
          </p>
        </div>
        <div class="steps">
            <h5>Step 7</h5>
          <p>
            Cover the cups tightly with plastic wrap and place them in a steamer 
            basket or on a steaming rack over a pot of simmering water.
          </p>
        </div>
        <div class="steps">
            <h5>Step 8</h5>
          <p>
            Steam the chawanmushi for 15-20 minutes or until the custard is set 
            but still slightly jiggly in the center.
          </p>
        </div>
        <div class="steps">
            <h5>Step 9</h5>
          <p>
            Remove the cups from the steamer and let them cool slightly before 
            removing the plastic wrap.
          </p>
        </div>
        <div class="steps">
            <h5>Step 10</h5>
          <p>
            Garnish each cup with a small cooked shrimp or scallop and fresh 
            herbs, if desired.
          </p>
        </div>
    </section>   
    </main>
  </body>
 
    <footer>
    <?php include "footer.php" ?>;
    </footer>
</html>

