<html lang = "en">
    <head>
    <?php include "header_nav_footer.php"?>
    </head>
        <header><?php include "navbar.php";?></header>
        
    <form action="" id="search-form">
  <input type="search" placeholder="search here..." name="" id="search-box">
  <label for="search-box" class="fas fa-search"></label>
  <i class="fas fa-times" id="close"></i>
    </form>   
    <div class="container" id ="reg">
    <h1>Member Registration</h1>
        <p>For existing members, please go to the
            <a href="login.php">Login Page</a>
        </p>
        <div class ="form-group">
            <form action="process_register.php" method="post" novalidate>
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname"
                placeholder="Enter first name" class="form-control">
        </div>
            
        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" required maxlength="45" name="lname"
                placeholder="Enter last name" class="form-control">
        </div>
            
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" required maxlength="45" name="email"
                placeholder="Enter email" class="form-control">
        </div>
            
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" id="pwd" required maxlength="45" name="pwd"
                placeholder="Enter password" class="form-control">
        </div>
            
        <div class="form-group">
            <label for="pwd_confirm">Confirm Password:</label>
            <input type="password" id="pwd_confirm" required maxlength="45" name="pwd_confirm"
                placeholder="Confirm password" class="form-control">
        </div>
            
        <div class="form-check">
            <label>
            <input type="checkbox" name="agree">
            Agree to terms and conditions.
            </label>
        </div>
        <button type="submit" class = "btn btn-primary">Submit</button>
    </div>

        <footer>
            <?php include "footer.php" ?>;
        </footer>
 ?>
</body>