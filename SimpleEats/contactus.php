<html lang = "en">
    <head>
    <?php include "header_nav_footer.php";?>
    </head>
    
        <header>  
        <?php include "navbar.php";?>
        </header>
    
    <body>
        <div class="container" id ="contactus">
        <h1>Contact Us</h1>
        
            <div class="map-section" id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.79056782293!2d103.77739031478225!3d1.300512912094177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da19a0ba4217fb%3A0x5213c91433e6d4e9!2sSingapore%20Institute%20of%20Technology%20(SIT)!5e0!3m2!1sen!2ssg!4v1679324547981!5m2!1sen!2ssg" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

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
        </div>
    </body>

    <footer>
    <?php
    include "footer.php";
    ?>
    </footer>
</html>
    