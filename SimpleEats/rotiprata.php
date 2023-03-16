<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Roti Prata</title>
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
        <h3>Roti Prata</h3>
        <p>
            Roti prata is a popular flatbread in Southeast Asia, especially in 
            Singapore and Malaysia.
        </p>
        <div class="recipe-img">
            <img src="images/rotiprata.jpg" alt="Roti Prata">
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
          <p class="single-ingredient">2 cups all-purpose flour</p>
          <p class="single-ingredient">1/2 tsp salt</p>
          <p class="single-ingredient">1 tbsp sugar</p>
          <p class="single-ingredient">1/2 cup warm water</p>
          <p class="single-ingredient">1/4 cup vegetable oil, plus extra for frying</p>
          <p class="single-ingredient">1/4 cup sweetened condensed milk</p>
    </section>
  
    <section class="recipe-guide">
        <h4>How to cook?</h4>
        <div class="steps">
            <h5>Step 1</h5>
          <p>
            In a large bowl, mix together the flour, salt, and sugar.
          </p>
        </div>
        <div class="steps">
            <h5>Step 2</h5>
          <p>
            In a separate bowl, whisk together the warm water, vegetable oil, 
            and sweetened condensed milk.
          </p>
        </div>
        <div class="steps">
            <h5>Step 3</h5>
          <p>
            Pour the wet ingredients into the dry ingredients and stir until a 
            dough forms.
          </p>
        </div>
        <div class="steps">
            <h5>Step 4</h5>
          <p>
            Knead the dough on a floured surface for 5-10 minutes or until smooth 
            and elastic.
          </p>
        </div>
        <div class="steps">
            <h5>Step 5</h5>
          <p>
            Divide the dough into 8-10 equal-sized balls and cover them with a 
            damp cloth. Let the dough rest for 30 minutes.
          </p>
        </div>
        <div class="steps">
            <h5>Step 6</h5>
          <p>
            Working with one dough ball at a time, flatten it into a thin disc 
            using a rolling pin. Stretch the disc as thin as possible without 
            tearing it.
          </p>
        </div>
        <div class="steps">
            <h5>Step 7</h5>
          <p>
            Fold the disc into thirds, then roll it into a tight spiral. Repeat 
            with the remaining dough balls.
          </p>
        </div>
        <div class="steps">
            <h5>Step 8</h5>
          <p>
            Heat a non-stick skillet over medium-high heat. Add a tablespoon of 
            vegetable oil to the skillet.
          </p>
        </div>
        <div class="steps">
            <h5>Step 9</h5>
          <p>
            Flatten one of the dough spirals with a rolling pin, then place it 
            in the skillet. Fry the roti prata for 2-3 minutes on each side or 
            until golden brown and crispy.
          </p>
        </div>
        <div class="steps">
            <h5>Step 10</h5>
          <p>
            Repeat with the remaining dough spirals, adding more oil to the 
            skillet as needed.
          </p>
        </div>
    </section>   
    </main>
  </body>
  
    <footer>
    <?php include "footer.php" ?>;
    </footer>
</html>
