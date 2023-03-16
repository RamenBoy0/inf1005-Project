<!doctype html>
<html lang="en">
    <head>
        <title>Western</title>
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
            <section class="all-recipes">
            <h3>Western</h3>
            <div class="row">
                <article class="col-sm">
                    <h5>Fish & Chips</h5>
                    <figure>
                        <img src="images/fishandchips.jpg" class="img-thumbnail" alt="Fish & Chips"/>
                    </figure>
                    <div class="button">
                        <a href="fish&chip.php" >View More</a>
                    </div>
                </article>
                <article class="col-sm">
                    <h5>Cheese Burger</h5>
                    <figure>
                        <img src="images/cheeseburger.jpg" class="img-thumbnail" alt="Cheese Burger"/>
                    </figure>
                    <div class="button">
                        <a href="cheeseburger.php" >View More</a>
                    </div>
                </article>
                <article class="col-sm">
                    <h5>Egg & Carbonara Pasta</h5>
                    <figure>
                        <img src="images/carbonarapasta.jpg" class="img-thumbnail" alt="Egg & Carbonara Pasta"/>
                    </figure>
                    <div class="button">
                        <a href="carbonarapasta.php" >View More</a>
                    </div>
                </article>
                <article class="col-sm">
                    <h5>Tomato & Scallop Pasta</h5>
                    <figure>
                        <img src="images/scalloppasta.jpg" class="img-thumbnail" alt="Scallop Pasta"/>
                    </figure>
                    <div class="button">
                        <a href="scalloppasta.php" >View More</a>
                    </div>
                </article>
            </div>
        </main>
        </section>
    </body>
    
    <footer>
    <?php include "footer.php" ?>;
    </footer>
</html>

