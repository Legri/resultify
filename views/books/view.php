<?php
include_once("views/template/header.php");
?>
<script>
function showHint(id) {
	var text = $("#textareaupd").val();
	var texautor = $("#textareaupdautor").val();
	
$.ajax({
type: 'POST',
url: '../../components/update.php',
data: {'id':id,'text':text,'texautor':texautor},
success: function(data){
$('#txtHint').html(data);
}
});
}
</script>
<div class="container">
	<div class="row">
		
		
		<div class="col m12 viewbooks">
			
			<?php if ($_SESSION['user']){ ?>
			
			<?php if ($arrOne->num_rows > 0) {
				$row = $arrOne->fetch_assoc() ?>
			<div class="row">
				<div class="col m4 offset-m4">
					<div class="right">
						<img class="materialboxed responsive-img" src="../../uploads/<?php echo  $row["foto"]; ?>">
					</div>
				</div>
			</div>	

				<div class="input-field col s12">
		          <input   name="textareaupd" id="textareaupd" value="<?php echo  $row["name"]; ?>" type="text" class="validate">
		          <label for="first_name">Name Book</label>
		        </div>
				<div class="input-field col s12">
		          <input  name="textareaupdautor" id="textareaupdautor" value="<?php echo  $row["autor"]; ?>" type="text" class="validate">
		          <label for="first_name">Name Autor</label>
		        </div>

				
				<?php
			}
			
			$idaj=$row["id"];
			
			?>
			<div class="row">
				
			<div class="col m6">
				<div class="right">
					<button type="submit" class="btn btn-default " name="addbooks" onclick="showHint('<?php echo $idaj?>')">Save</button>
				</div>
			</div>
			<div class="col m6">
				<div class="right">
					<form method="post" action="">
						<button type="submit" class="btn btn-default " name="delnews" >Delete</button>
					</form>
				</div>
			</div>
		</div>
			<div id="txtHint"></div>
			<?php if((isset($_POST['delnews']))){
			
			Books::delById($id);?>
			<script type="text/javascript">
				window.location.href = 'view';
			</script>
			<?php	 }?>
			
			<?php }
			else {
				
			
			?>
			
			<?php
				if ($arrOne->num_rows > 0) {
				$row = $arrOne->fetch_assoc();
			?>
			<table class='bordered'>
				<tr>
					<td><?php echo $row["id"] ?></td>
					<td><?php echo $row["name"] ?></td>
					<td><?php echo $row["autor"] ?></td>
				</tr>
			</table>
			
			<?php  }
			
			?>
			<?php } ?>
		</div>
		
	</div>
</div>




<?php
include_once("views/template/footer.php");
?>