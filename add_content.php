<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
if (isset($_POST['submit'])){
	//fetching ingredients id's from user input
	
	$title 	= $_POST['title'];
	$visible = $_POST['visible'];
	$m_cat_id = $_POST['m_cat_id'];
	$m_type_id = $_POST['m_type_id'];
	$elm1	= $_POST['elm1'];

	if (!empty($_FILES['fileToUpload']['type'])) {
		$fileName = time().'_'.$_FILES['fileToUpload']['name'];
		$sourcePath = $_FILES['fileToUpload']['tmp_name'];
		$targetPath = 'upload/recipe-images/'.$fileName;
		$fileType = $_FILES['fileToUpload']['type'];
		fileUpload($fileName, $sourcePath, $targetPath, $fileType);
	
	} 




	$query 	=$dbh->prepare( "INSERT INTO contents(title, visible, m_cat_id, m_type_id, content, recipe_image )
													VALUES(:title, :visible, :m_cat_id,:m_type_id, :content,  :recipe_image)");
		$query->execute(array(':title'=>$title, ':visible'=> $visible, ':m_cat_id'=>$m_cat_id, ':m_type_id'=>$m_type_id, ':content'=>$elm1, ':recipe_image'=>$fileName));
		      if ($query->rowCount() == 1) {
		      // Success
		      redirect_to("meals.php");
		      } else {
		      // Failed
		    redirect_to("new_content.php");
		}
}

function fileUpload($fileName, $sourcePath, $targetPath, $fileType)
    {
        echo $fileName;
        $valid_extensions = array('jpeg', 'jpg', 'png');
        $temporary = explode('.', $fileName);
        $file_extension = end($temporary);
        if ((($fileType == 'image/png') || ($fileType == 'image/jpg') || ($fileType == 'image/jpeg')) && in_array($file_extension, $valid_extensions)) {
            // $sourcePath = $_FILES['file']['tmp_name'];
            //$targetPath = "../../static/mp/images/".$fileName;
            if (move_uploaded_file($sourcePath, $targetPath)) {
                $uploadedFile = $fileName;
            }
        }
    }

?>
<?php include("includes/header.php"); ?>
<!-- content area stats here -->
<!-- donot remove this div it start from sidebar -->
	    </div>
<!--  sidebar div Ends here  -->
<!-- content area sends here  -->
<?php include("includes/sidebar.php"); ?>
<?php include("includes/footer.php"); ?>
