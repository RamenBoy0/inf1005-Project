<html>
    <head>
        <?php include "header_home.php" ?>;
    </head>
    <body>
        <header> <?php include "navbar.php" ?>; </header>
        
       
        <?php include "slider.php" ?>;
        
            <div class="container">

            <section class="dishes" id="dishes">

                
                <h1 class="heading"> Recipes </h1>

                <div class="box-container">

                    <div class="box">
                        <img src="images/chinese-noodles.jpg" alt="">
                        <h3>Chinese</h3>
                        <a href="chinese.php" class="btn">View Recipe</a>
                    </div>

                    <div class="box">
                        <img src="images/pizza.jpg" alt="">
                        <h3>Western</h3>
                        <a href="western.php" class="btn">View Recipe</a>
                    </div>
                    
                    <div class="box">
                        <img src="images/japanese-sushi-platter.jpg" alt="">
                        <h3>Japanese</h3>
                        <a href="japanese.php" class="btn">View Recipe</a>
                    </div>
                </div>
            </section>
        </div>
        
        <footer>
            <?php include "footer.php" ?>;
        </footer>
    </body>
</html>
