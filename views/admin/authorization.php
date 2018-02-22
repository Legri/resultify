<?php include_once("views/template/header.php");?>


 <div class="container">

     <div class="row col m12">
    	<div class="autorisationform">
              <?php if((isset($_POST['Username'])&&(isset($_POST['Username'])))){
              	echo 
              	 AdminController::login($_POST['Username'],$_POST['Password']);
              	 
              	 }?>
              	
               <?php if((isset($_POST['Exit']))){
              	
              	  AdminController::out();
              	 }?>	 
             
                        
             <?php if (!$_SESSION['user']){ ?>
            
		                    <h5 class="text-center">SIGN UP</h5>
		                        
		                    <form class="form form-signup" role="form" method="post" action="">
			                   
			                     <?php echo $_SESSION['status']?>
			                        
			                            <input type="text" class="form-control" name="Username" placeholder="Username" />
			                       
			                   
			                            <input type="password" class="form-control" placeholder="Password" name="Password" />
			                        
			                    
			                     <input class="btn btn-sm btn-primary btn-block" type="submit" value="SUBMIT" onclick="myFunction()" />
			                   </form> 
		                 
		
            <?php }else{ ?>
	<?php echo 'You are logged in successfully'; ?>
	
	<form method="post" action="">
	 <input class="btn " type="submit" value="Exit ?" name="Exit" onclick="myFunction()" />
	 </form>
   <?php } ?>
<script>
			function myFunction() {
    			location.reload();
			}
		</script>
           		 </div>
           
   </div>
    </div>

<?php
include_once("views/template/footer.php");
?>
