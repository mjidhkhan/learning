<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php confirm_logged_in(); ?>


 <script language="javascript" type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
                <link language="javascript" href="jscripts/tiny_mce/tiny_mce.js" media="all" rel="stylesheet" type="text/javascript" />
<!-- TinyMCE -->
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		skin : "o2k7",
		plugins : "autolink,lists,pagebreak,style,layer,table,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",
		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code",
		theme_advanced_buttons3 : "charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		content_css : "sylesheets/css/word.css",
		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
<?php  include("includes/header.php"); ?>
</head>
	<!-- ---- content area stats here            ----->
        <h3> Create contents</h3>    
        <form method="post" action="add_content.php">
            <table>
	    <tr>
                <td><strong>Title:</strong><span class= "req" > * </span></td>
                <td><input type="text" name="title" value="" id="title" size="50" /></td>
            </tr>
            <tr>
                <td><strong>Visible:</strong><span class= "req" > * </span></td>
                <td><input type="radio" name="visible" value="0"/> No
			&nbsp;
			<input type="radio" name="visible" value="1"/> Yes
                </td>
	    </tr>
	    <tr>
                <td><strong>Category:</strong><span class= "req" > * </span></td>
                <td><input type="radio" name="m_cat_id" value="1"/> Vegetarian
			&nbsp;
			<input type="radio" name="m_cat_id" value="2"/> None-Vegetarian
                </td>
	    </tr>
	    <tr>
		<td><strong>Meal Type</strong> <span class= "req" > * </span> </td>
                <td><select id="m_type_id" name="m_type_id" >
                        <?php
                        $sql = $dbh->prepare("SELECT * FROM `meal_category` ");
                        $sql->execute();
                        while($row= $sql->fetch()){
                        ?>
                        <option value="<?php echo $row['id'];?>"><?php  echo $row ['meal_category'];?></option>
                        <?php }?>
                        </select>
		</td>
            </tr>
	    <tr>
                <!-- Gets replaced with TinyMCE, remember HTML in a textarea should be encoded -->
                <td><strong>Content</strong><span class= "req" > * </span></td>
                <td><textarea id="elm1" name="elm1" rows="20" cols="50" style=" width: 50%"></textarea>
                </td>
            </tr>
	    <tr>
                <td></td>
                <td><input type="submit"  class="searchsubmit formbutton"  name="submit" value="Submit" />
                <input type="reset" class="searchsubmit formbutton" name="reset" value="Reset" /></td>
            </tr>
            </table>
        </form>
        
	
       
	<!------ content area sends here            ----->	
        <?php  if( $_SESSION['status']== 1){
                include("includes/staff_sidebar.php");
        }else{
            include("includes/sidebar.php");
        }
        ?>       
	<?php include("includes/footer.php"); ?>
        
