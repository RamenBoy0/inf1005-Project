<!doctype html>
<html lang="en">
    <head>
        <?php
            include "header_nav_footer.php";
        ?>
        <link rel="stylesheet" href="css/cuisines.css">
    </head>
    
    <body>
        <header>
        <?php
            include "navbar.php";
        ?>  
        </header>
        
        <main class="cuisine-container">
            <h3>Chinese</h3>
            <div class="row">
                <article class="col-sm">
                    <h5>Kung Pao Chicken</h5>
                    <figure>
                        <img src="images/kungpaochic.jpg" class="img-thumbnail" alt="Kung Pao Chicken"/>
                    </figure>
                    <div class="button">
                        <a href="kungpaochic.php" >View More</a>
                    </div>
                </article>
                <article class="col-sm">
                    <h5>Sweet and Sour Pork</h5>
                    <figure>
                        <img src="images/sweetandsourpork.jpg" class="img-thumbnail" alt="Sweet & Sour Pork"/>
                    </figure>
                    <div class="button">
                        <a href="sweet&sourpork.php" >View More</a>
                    </div>
                </article>
            </div>
        </main>

    </body>
    <footer>
    <?php
        include "footer.php";
    ?>
    </footer>
</html>
        
