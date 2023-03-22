<html lang = "en">
    <head>
    <?php
    include "header_nav_footer.php"
    ?>
    </head>
    <body>
        <header>  <?php include "navbar.php";?></header>
    <main class="form-container" id="log">
    <h1>Login Page</h1>
        <p>To sign up, please go to the
            <a href="register.php">Sign In page</a>.
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
           <button type="submit" class = "btn btn-primary">Submit</button>
    </main>
        <footer>
 <?php
 include "footer.php";
 ?>
        </footer>
</body>
</html>