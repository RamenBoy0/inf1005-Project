<!doctype html>
<html lang="en">
    <head>
        <title>Indian</title>
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
            <h3>Indian</h3>
            <div class="row">
                <article class="col-sm">
                    <h5>Briyani</h5>
                    <figure>
                        <img src="images/briyani.jpg" class="img-thumbnail" alt="Briyani"/>
                    </figure>
                    <div class="button">
                        <a href="briyani.php" >View More</a>
                    </div>
                </article>
                <article class="col-sm">
                    <h5>Roti Prata</h5>
                    <figure>
                        <img src="images/rotiprata.jpg" class="img-thumbnail" alt="Roti Prata"/>
                    </figure>
                    <div class="button">
                        <a href="rotiprata.php" >View More</a>
                    </div>
                </article>
                <article class="col-sm">
                    <h5>Chicken Masala</h5>
                    <figure>
                        <img src="images/chicmasala.jpg" class="img-thumbnail" alt="Chicken Masala"/>
                    </figure>
                    <div class="button">
                        <a href="chicmasala.php" >View More</a>
                    </div>
                </article>
            </div>
            </section>
        </main>

    </body>
    <footer>
    <?php include "footer.php" ?>;
    </footer>
</html>
