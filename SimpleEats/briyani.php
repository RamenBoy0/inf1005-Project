<!DOCTYPE html>
<html lang="en">
  <head>
        <title>Briyani</title>
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
        <h3>Briyani</h3>
        <p>
            Biryani is a traditional South Asian dish that originated in the 
            Indian subcontinent. It is made by cooking long-grain rice with 
            aromatic spices, meat (usually chicken, lamb, or beef), and sometimes 
            vegetables, herbs, and nuts. The meat is typically marinated in spices 
            before cooking and layered with the rice to infuse the flavors.
            
            The dish is usually served with a side of raita, a yogurt-based 
            condiment, and sometimes with pickles or chutneys. Biryani is known 
            for its complex and rich flavors, which are a result of the blending 
            of various spices, such as cardamom, cinnamon, cloves, cumin, and 
            coriander. It is often served on special occasions or celebrations, 
            such as weddings and festivals, and is a popular dish in many parts 
            of South Asia, as well as in the Middle East and beyond.
        </p>
        <div class="recipe-img">
            <img src="images/briyani.jpg" alt="Briyani">
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
          <p class="single-ingredient">2 cups basmati rice</p>
          <p class="single-ingredient">1 lb boneless, skinless chicken thighs, cut into small pieces (or vegetables of your choice)</p>
          <p class="single-ingredient">2 onions, sliced</p>
          <p class="single-ingredient">2 garlic cloves, minced</p>
          <p class="single-ingredient">1 tbsp ginger paste</p>
          <p class="single-ingredient">1 tsp cumin powder</p>
          <p class="single-ingredient">1 tsp coriander powder</p>
          <p class="single-ingredient">1/2 tsp turmeric powder</p>
          <p class="single-ingredient">1/2 tsp red chili powder (adjust to taste)</p>
          <p class="single-ingredient">2 cups chicken or vegetable broth</p>
          <p class="single-ingredient">1/4 cup vegetable oil</p>
          <p class="single-ingredient">Salt, to taste</p>
          <p class="single-ingredient">Fresh cilantro leaves, chopped, for garnish</p>
    </section>
   
    <section class="recipe-guide">
        <h4>How to cook?</h4>
        <div class="steps">
            <h5>Step 1</h5>
          <p>
            Rinse the rice in cold water until the water runs clear. Soak the 
            rice in water for 30 minutes.
          </p>
        </div>
        <div class="steps">
            <h5>Step 2</h5>
          <p>
            In a large pot, heat the vegetable oil over medium-high heat. Add 
            the onions and sauté until softened and translucent.
          </p>
        </div>
        <div class="steps">
            <h5>Step 3</h5>
          <p>
            Add the garlic and ginger paste and sauté for another minute. Add 
            the chicken or vegetables and cook until browned on all sides.
          </p>
        </div>
        <div class="steps">
            <h5>Step 4</h5>
          <p>
            Add the cumin powder, coriander powder, turmeric powder, red chili 
            powder, and salt, and stir until the chicken or vegetables are well 
            coated.
          </p>
        </div>
        <div class="steps">
            <h5>Step 5</h5>
          <p>
            Drain the soaked rice and add it to the pot. Stir until the rice is 
            well coated.
          </p>
        </div>
        <div class="steps">
            <h5>Step 6</h5>
          <p>
            Add the chicken or vegetable broth and bring the mixture to a boil. 
            Reduce the heat to low, cover the pot, and simmer for 15-20 minutes 
            or until the rice is cooked and the liquid is absorbed.
          </p>
        </div>
        <div class="steps">
            <h5>Step 7</h5>
          <p>
            Fluff the rice with a fork, garnish with chopped cilantro leaves, 
            and serve hot.
          </p>
        </div>
    </section>   
    </main>
  </body>
  
    <footer>
        <?php include "footer.php" ?>;
    </footer>
</html>
