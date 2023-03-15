<!doctype html>
<html lang="en">
    <head>
        <?php
            include "header_nav_footer.php";
        ?>
        <link rel="stylesheet" href="css/cuisines.css">  
        <header>
        <?php
            include "navbar.php";
        ?>  
        </header>
        
        <main class="cuisine-container">
            <h3>Japanese</h3>
            <div class="row">
                <article class="col-sm">
                    <h5>Chawanmushi</h5>
                    <figure>
                        <img src="images/chawanmushi.jpg" class="img-thumbnail" alt="Chawanmushi"/>
                    </figure>
                    <div class="button">
                        <a href="chawanmushi.php" >View More</a>
                    </div>
                </article>
                <article class="col-sm">
                    <h5>Pork Ramen</h5>
                    <figure>
                        <img src="images/porkramen.jpg" class="img-thumbnail" alt="Pork Ramen"/>
                    </figure>
                    <div class="button">
                        <a href="porkramen.php" >View More</a>
                    </div>
                </article>
                <article class="col-sm">
                    <h5>Teriyaki Chicken with Rice</h5>
                    <figure>
                        <img src="images/teriyakichicrice.jpg" class="img-thumbnail" alt="Teriyaki Chicken Rice"/>
                    </figure>
                    <div class="button">
                        <a href="teriyakichic.php" >View More</a>
                    </div>
                </article>
            </div>
        </main>

    </body>
    <?php
        include "footer.php";
    ?>  
</html>

