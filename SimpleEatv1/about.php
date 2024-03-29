<!doctype html>
<html lang="en">
    <head>
        <title>About Us Section</title>
        <?php
        include "header_nav_footer.php";
        ?>
               <link rel="stylesheet" href="css/about.css">  
    </head>
    
    <body>
        <header>
        <?php
          include "navbar.php";
        ?>  
        </header>    
        
        <main class="about-container">
                
            <section>

                <div class="header-section">
                <h1>About</h1>
                </div>

                <div class="image-section">
                <img src="images/about-img.png">
                </div>

                <div class="content-section">
                    <h2>Welcome!!</h2>
                    <p>Welcome to our recipe website, where we offer a vast collection of delicious and easy-to-follow recipes for all occasions. 
                       Whether you're a seasoned home cook or a beginner looking to try out new dishes, we've got you covered.</p>

                    <h2>What our website provides</h2>
                    <p> Our website is designed to be user-friendly, with easy-to-navigate categories and clear step-by-step instructions for each recipe. 
                        So, whether you're looking to impress your guests or simply want to treat yourself to a tasty meal, 
                        explore our recipe collection and get cooking today!</p>

                    <h2>Explore our recipes here</h2>
                    
                    <div class="button">
                        <a href="view_all_recipes.php" >Recipe</a>
                    </div>
                </div>
            </section>
        </main>
    </body>
    
    <footer>
        <?php include "footer.php" ?>;
    </footer>
</html>