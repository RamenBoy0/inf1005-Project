<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html lang = "en">
    <head>
        <!--jQuery script-->
        <script defer
                src ="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity = "sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin = "anonymous">
        </script>
        <script defer
            src = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
            integrity = "sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
            crossorigin="anonymous">
        </script>
        <script defer src="js/main.js">
        </script>
        <title>World of Pets</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel ="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity ="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css" type="text/css">
    </head>
    <body>
        <?php 
            include "nav.inc.php";
        ?>
        <div>
        <header class = "jumbotron text-center bg-dark">
            <section id ="home">
            <h1 class = "display-4">Welcome to the World of Pets!</h1>
            <h2>Home of Singapore's Pet Lovers</h2>
            </section>
        </header>
        </div>
        <main class = "container">
            <div id ="pets">
            <section id = "dogs">
                        <h2 id="dog_title">All about Dogs!</h2>
                        <div class="row">
                        <article class = "col-sm">
                            <h3>Poodles</h3>
                            <figure>
                                <img class="img-thumbnail" src="images/poodle_small.jpg" alt ="Poodle" id="poodle">
                                <figcaption>Standard Poodle</figcaption>
                            </figure>
                            <p>
                                Poodles are a group of formal dog breeds, the Standard Poodle, 
                                Miniature Poodle and the Toy Poodle...
                            </p>
                        </article>
                        <article class = "col-sm">
                            <h3>Chihuahua</h3>
                            <figure>
                                    <img class = "img-thumbnail" src="images/chihuahua_small.jpg" alt="Chihuahua" 
                                    id="chihuahua"    title ="View larger image....">
                                <figcaption>Chihuahua</figcaption>
                            </figure>
                            <p>
                                The Chihuahua is the smallest breed of dog and is named 
                                after the Mexican state of Chihuahua
                            </p>
                        </article>
                        </div>
            </section>
            <section id ="cats">
                <h2 id = "cat_title">All About Cats!</h2>
                <div class="row">
                <article class="col-sm"> 
                <h3>Tabby</h3>
                <figure>
                        <img class = "img-thumbnail" src="images/tabby_small.jpg" alt ="Tabby"
                             id="tabby">
                    <figcaption>Tabby Cat</figcaption>
                </figure>
              
                <p>
                   A tabby is any domestic cat with a distinctive 
                   'M'-shaped marking on its forehead; stripes by its eyes and across its cheeks, 
                   along its back, and around its legs and tail or swirled patterns on the body.
                </p>
                </article>
                <article class = "col-sm"> 
                <h3>Calico</h3>
                <figure>
                        <img  class = "img-thumbnail" src="images/calico_small.jpg" alt="Calico"
                             id="calico" >
                    <figcaption>Calico Cat</figcaption>
                </figure>
                <p>
                    A calico cat is a domestic cat of any breed with a tri-color coat. 
                    The calico cat is most commonly thought of as being 25% to 75% white with large orange and black patches
                    Calicoes are almost exclusively female except under rare genetic conditions.
                </p>
                </article>
                </div>
            </section>
                </div>
            </main>
    <?php 
        include "footer.inc.php";
    ?>
    </body>
</html>
