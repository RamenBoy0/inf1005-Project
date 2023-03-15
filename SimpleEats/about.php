<!doctype html>
<html lang="en">
    <head>
        <title>About Us Section</title>
        <?php
        include "header_nav_footer.php";
        ?>
    </head>
    
    <body>
        <header>
        <?php
          include "navbar.php";
        ?>  
        </header>
        
        <div class="section">
            <div class="about-container">
                <div class="content-section">
                    <div class="title">
                        <h1>About</h1>
                    </div>
                    <div class="content">
                        <h3>Welcome!!</h3>
                        <p>Welcome to our recipe website, where we offer a vast collection of delicious and easy-to-follow recipes for all occasions. 
                           Whether you're a seasoned home cook or a beginner looking to try out new dishes, we've got you covered.</p>
                        
                        <h3>What our website provides</h3>
                        <p> Our website is designed to be user-friendly, with easy-to-navigate categories and clear step-by-step instructions for each recipe. 
                            So, whether you're looking to impress your guests or simply want to treat yourself to a tasty meal, 
                            explore our recipe collection and get cooking today!</p>
                        
                        <h3>Explore our recipes here</h3>
                        <div class="button">
                            <a href="chinese.php" >Chinese</a>
                        </div>
                        <div class="button">
                            <a href="western.php" >Western</a>
                        </div>
                        <div class="button">
                            <a href="japanese.php" >Japanese</a>
                        </div>
                        <div class="button">
                            <a href="indian.php" >Indian</a>
                        </div>
                    </div>
                </div>
                <div class="image-section">
                    <img src="images/chinese-noodles.jpg">
                </div>
            </div>
        </div>
    </body>
    <footer>
    <?php
        include "footer.php";
    ?>
    </footer>
</html>
        
