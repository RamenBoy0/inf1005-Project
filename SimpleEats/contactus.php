<html lang = "en">
    <head>
    <?php
    include "header_nav_footer.php"
    ?>
    </head>
    <body>
        <header>  <?php include "navbar.php";?></header>
    <main class="container" id="log">
    <h1>Contact Us</h1>
        <div class ="form-group">
            <form action="process_contact.php" method="post" novalidate>
            <label for="message">Message:</label>
            <input type="text" id="message" name="message"
                placeholder="Enter message" class="form-control">
        </div> 
        <div class ="form-group">
            <form action="process_contact.php" method="post" novalidate>
            <label for="fname">Name:</label>
            <input type="text" id="fname" name="fname"
                placeholder="Enter name" class="form-control">
        </div>
        <div class ="form-group">
            <form action="process_contact.php" method="post" novalidate>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email"
                placeholder="Enter email" class="form-control">
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