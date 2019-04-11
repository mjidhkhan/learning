<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>


	<!------ content area stats here            ----->
<?php		


	if(isset($_REQUEST['submit']))
	{	

		$imgtype=$_FILES['uploadfile']['type'];
		$name=$_REQUEST['name'];

		if($imgtype=="image/jpeg" || $imgtype=="image/jpg" || $imgtype=="image/pjpeg" || $imgtype=="image/gif" || $imgtype=="image/x-png" || $imgtype=="image/bmp")
		{
					
			$image=$_FILES['uploadfile']['tmp_name'];
			$fp = fopen($image, 'r');
			$content = fread($fp, filesize($image));
			$content = addslashes($content);
			fclose($fp);
			$sql="insert into table (name,image) values ('$name','$content')";
			$res=mysql_query($sql) or die (mysql_error());
	   }
	}
?>
<form name="form" method="post" ENCTYPE="multipart/form-data" action="image_upload.php">
<table>
	<tr>
		<td>Name: <input type="text" name="name"></td>
	</tr>
	<tr>
		<td >
			Upload image: <input type="file" name="uploadfile"> 
		</td>
	</tr>
	<tr>
		<td><input name="submit" value="submit" type="submit"> </td>
	</tr>
</table>
</form>
</BODY>
</HTML>



	<!------ content area sends here            ----->	
        <?php  include("includes/sidebar.php");?>       
	<?php include("includes/footer.php"); ?>
        
