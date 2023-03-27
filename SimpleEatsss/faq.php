<!doctype html>
<html lang="en">
    <head>
<?php
    include "header_nav_footer.php";
?>
        <link rel="stylesheet" href="css/faq.css">


        <!-- Custom JS -->
        <script defer src="js/faq.js"></script>


  
    </head>
 
    <body>

        <header>
             <?php
            include "navbar.php";
            ?>
        </header>
        
        <main>
        <div class="container"> 
        <section> 
            
            <div class="jumbotron text-center">
               <h1 class="display-2">Frequently Asked Questions</h1>
           </div>

         
        <div class="row">
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li ><a data-toggle="tab" href="#tab1" aria-selected="true" class="active" id="tabbing">Cuisine 1</a></li>
				<li><a data-toggle="tab" href="#tab2" aria-selected="false" id="tabbing">Cuisine 2</a></li>
			</ul>
		</div>
        </div>
            
            
     
            
    	<div class="row">
		<div class="col-sm-12">
			
			<div class="tab-content">
				<div id="tab1" class="tab-pane fade show active">
					
                                            
                                            <div class="faq-one">
                                                <!-- faq question -->
                                                <h2 class="faq-page">What does Simple Eats provide?</h2>
                                                <!-- faq answer -->
                                                <div class="faq-body">
                                                    <h4>Simple Eat provides and allows sharing of recipes. The recipes are easy to follow, we ensure that the preparation will not exceed by 15 minutes and cooking time will not exceed 60 minutes. 
                                                        You can simply cook a dish with no experience needed. To know more about Simple Eat click here.</h4>
                                                </div>
                                            </div>
                                            <hr class="hr-line">
                                            <div class="faq-two">
                                                <!-- faq question -->
                                                <h2 class="faq-page">How many types of cuisine does Simple Eats provide?</h2>
                                                <!-- faq answer -->
                                                <div class="faq-body">
                                                    <h4>There are many different types of cuisine Simple Eat provide. 
                                                        Cuisine such as Chinese, Indian, Western, etc. Click here for more.
                                                    </h4>
                                                </div>
                                            </div>
                                            <hr class="hr-line">
                                            <div class="faq-three">
                                                <!-- faq question -->
                                                <h2 class="faq-page">How to create your own recipe?</h2>
                                                <!-- faq answer -->
                                                <div class="faq-body">
                                                    <h4>You will need to register an account and login to create your own recipe.</h4>
                                                </div>
                                            </div>
                                         
				
				</div><!-- tab 1-->
			<div id="tab2" class="tab-pane fade">
			
                                 
                                    <div class="faq-four">
                                        <!-- faq question -->
                                        <h2 class="faq-page">This is another accordion?</h2>
                                        <!-- faq answer -->
                                        <div class="faq-body">
                                            <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                                                necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                                                aperiam.
                                                Perspiciatis, porro!</h4>
                                        </div>
                                    </div>
                                    <hr class="hr-line">
                                    <div class="faq-five">
                                        <!-- faq question -->
                                        <h2 class="faq-page">Testing 123?</h2>
                                        <!-- faq answer -->
                                        <div class="faq-body">
                                            <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                                                necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                                                aperiam.
                                                Perspiciatis, porro!</h4>
                                        </div>
                                    </div>
                                    <hr class="hr-line">
                                    <div class="faq-six">
                                        <!-- faq question -->
                                        <h2 class="faq-page">How to change the receipe?</h2>
                                        <!-- faq answer -->
                                        <div class="faq-body">
                                            <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                                                necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                                                aperiam.
                                                Perspiciatis, porro!</h4>
                                        </div>
                                    </div>
                    
			
			</div><!-- tab2 -->
		  </div><!-- tab content-->
		</div>
	</div>
        </section>
        </div>
        </main>
        <br>
        <?php
            include "footer.php";
        ?>
        
    </body>

</html>
