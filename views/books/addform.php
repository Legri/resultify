


<?php if((isset($_POST['addname']))){
                $_POST['addfoto']= $_FILES['addfoto']['name'];
                 Books::addBooksItem($_POST['addname'],$_POST['addautor'],$_POST['addfoto']);?>
                 
              	<?php
					$uploaddir = ROOT.'/uploads/';
					$uploadfile = $uploaddir . basename($_FILES['addfoto']['name']);

					
					if (move_uploaded_file($_FILES['addfoto']['tmp_name'], $uploadfile)) {
					   
					} else {
					   
					}

					?>
              	 
              	 <script type="text/javascript"> 
					document.location.href = '';
				</script>
				
				
              	 	
              	 <?php  } ?>	
<?php if ($_SESSION['user']){ ?>
<div class=" booksaddform z-depth-3">
<div class="col m12">
		<h5>ADD BOOK</h5>
	</div>
<form method="post" action="" enctype="multipart/form-data">
	<div class="col m12">
		<input type="text" class="form-control"  required  placeholder="Input name*" name="addname">
	</div>
	<div class="col m12">
		<input type="text" class="form-control" required placeholder="Input autor" name="addautor" >
	</div>	
	<div class="col m12">
	
      	<div class="file-field input-field">
      <div class="btn">
        <span>File</span>
        <input type="file" name="addfoto" id="addfoto">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    </div>
    
  
	  
	 
    
	<div class="col m12">
	<div class="right">
      <button type="submit" class="btn btn-default " name="addbooks">SAVE</button>
      </div>
    </div>
</form>
</div>
<?php } ?>



