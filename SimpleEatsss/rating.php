<!doctype html>
<html lang="en">
    <head>
        <?php
            include "header_nav_footer.php";
            
        ?>
        <link rel="stylesheet" href="css/ratings.css">


    </head>
    
    <header>
       <?php
      include "navbar.php";
      $recipe_name = $_GET["id"];
      $_SESSION["recipe_name"] = $recipe_name;
      ?>
        
<!--            <script>
      // define a JavaScript variable using the PHP session variable
      var recipeName = "<?php echo $_SESSION['recipe_name']; ?>";
    </script>-->
  </header>
  <script defer src="js/ratings.js"></script>
        
  <main>
        <div class="container">
 
    	<div class="card">
    		<div class="card-header"></div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star fa-3x"></i>
                            <i class="fas fa-star star-light mr-1 main_star fa-3x"></i>
                            <i class="fas fa-star star-light mr-1 main_star fa-3x"></i>
                            <i class="fas fa-star star-light mr-1 main_star fa-3x"></i>
                            <i class="fas fa-star star-light mr-1 main_star fa-3x"></i>
	    				</div>
    					<h1><span id="total_review">0</span> Review</h1>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning fa-2x"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"
                                       aria-label="Aria Name"></div>
                            </div>
                       
    				
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning fa-2x"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"
                                      aria-label="Aria Name"></div>
                            </div>               
                     
    					
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning fa-2x"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"
                                       aria-label="Aria Name"></div>
                            </div>               
                        
    					
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning fa-2x"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"
                                       aria-label="Aria Name"></div>
                            </div>               
                     
    					
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning fa-2x"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"
                                      aria-label="Aria Name"></div>
                            </div>               
                    
    				</div>
    				<div class="col-sm-4 text-center">
                                    <p>This is how users view our website!</p>
                                    
                                    <?php if ($_SESSION["logged_in"] == true): ?>
    					<h3 class="mt-4 mb-3">Write Review Here</h3>
                                        <?php endif; ?>
                                    <?php if ($_SESSION["logged_in"] == true): ?>
                                        <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
                                 <?php endif; ?>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div id="review_content"></div>
    </div>



<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
                   
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>  

</main>
    
    
    <footer>
    <?php
//    echo($recipe_id);
        include "footer.php";
    ?>
    </footer>
</html>

        
        

