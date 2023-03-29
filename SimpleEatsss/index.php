<html lang="en">
    <head>
        <?php include "header_home.php" ?>;
    </head>
    <body>
        <header> <?php include "navbar.php" ?>; </header>
        
        <main>
        <?php include "slider.php" ?>;
        
            <div class="container">

            <section class="dishes" id="dishes">

                
                <h1 class="heading"> Recipe Examples </h1>

                <div class="box-container">

                    <div class="box">
                        <img src="images/chinese-noodles.jpg" alt="">
                        <h1>Chinese</h1>
                        <a href="chinese.php" class="btn">View Recipe</a>
                    </div>

                    <div class="box">
                        <img src="images/western-platter.jpg" alt="">
                        <h1>Western</h1>
                        <a href="western.php" class="btn">View Recipe</a>
                    </div>
                    
                    <div class="box">
                        <img src="images/japanese-sushi-platter.jpg" alt="">
                        <h1>Japanese</h1>
                        <a href="japanese.php" class="btn">View Recipe</a>
                    </div>
                </div>
            </section>
        </div>
        </main>
        <footer>
            <?php include "footer.php" ?>;
        </footer>
    </body>
</html>
