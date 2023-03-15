<!doctype html>
<html lang="en">
    <head>
        <title>Japanese</title>
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
            <h3>Japanese</h3>
            <div class="row">
                <article class="col-sm">
                    <h5>Chawanmushi</h5>
                    <figure>
                        <img src="image/chawanmushi.jpg" class="img-thumbnail" alt="Chawanmushi"/>
                    </figure>
                    <div class="button">
                        <a href="chawanmushi.php" >View More</a>
                    </div>
                </article>
                <article class="col-sm">
                    <h5>Pork Ramen</h5>
                    <figure>
                        <img src="image/porkramen.jpg" class="img-thumbnail" alt="Pork Ramen"/>
                    </figure>
                    <div class="button">
                        <a href="porkramen.php" >View More</a>
                    </div>
                </article>
                <article class="col-sm">
                    <h5>Teriyaki Chicken with Rice</h5>
                    <figure>
                        <img src="image/teriyakichicrice.jpg" class="img-thumbnail" alt="Teriyaki Chicken Rice"/>
                    </figure>
                    <div class="button">
                        <a href="teriyakichic.php" >View More</a>
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

