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
    <main class="container">
    <h1>Login Page</h1>
        <p>For existing members, please go to the
            <a href="#">Sign In page</a>.
        </p>
         
        <div class ="form-group">
            <form action="process_login.php" method="post" novalidate>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email"
                placeholder="Enter email" class="form-control">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" id="pwd" required maxlength="45" name="pwd"
                placeholder="Enter password" class="form-control">
        </div>        
           <button type="submit" class = "btn btn-primary">Home Page</button>
       </form>
    </main>
 <?php
 include "footer.inc.php";
 ?>
</body>