<?php 

/*
Plugin Name: Wordpress Menu
Plugin URI: http://web-dorado.com/products/wordpress-menu-vertical.html
Description: Folder Menu Vertical is a WordPress Flash menu module for your website, designed to meet your needs and preferences.
Version: 2.0.2
Author: http://web-dorado.com
License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/
$addflashonce=1;
//add to head javascript
function my_custom_js()
{
global $addflashonce;
$Menu_Name=get_option('Menu_Name');

if($Menu_Name !='- Select Menu -' && $Menu_Name)
{
	echo  ' <script type="text/javascript" src="'.plugins_url( 'js/AC_RunActiveContent.js' , __FILE__ ).'"></script>
 			<script type="text/javascript" src="'.plugins_url( 'js/functions.js' , __FILE__ ).'"></script>';
}
}


// hook for adding js code
add_action('wp_head', 'my_custom_js',0);



//display font end
function front_end_vertical($content)  
{ 
$url_swf=plugins_url( '' , __FILE__ );
global $addflashonce;
$wrand=mt_rand();
global $post;
$from_top=get_option('Distance_from_top').'px';
$Menu_Name=get_option('Menu_Name');
$Menu_Font=get_option('Menu_Font');
$positoin=get_option('Position');
$mh_after_head = did_action( 'wp_enqueue_scripts' );
if($Menu_Name !='- Select Menu -' && $addflashonce==1 && $Menu_Name && ($mh_after_head==1))
{
	$addflashonce=0;
$FC_frontend=<<<HERE
       <div id="foldermenuverticalContainer" onmouseover="onmouseover_vertical();" onmouseout="onmouseout_vertical();" style="position:$positoin; left:0px; top:$from_top; overflow:hidden;width:50px; z-index:1000; height:1500px;">

	<style type="text/css">
	#foldermenuverticalContainer embed {max-width: initial;}
	</style>
<script language="javascript">

	if (typeof(AC_FL_RunContent)=="undefined") {

		alert("This page requires AC_RunActiveContent.js.");

	} else {

		AC_FL_RunContent(

			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',

			'width', '1000',

			'height', '3000',

			'src', '$url_swf/Vertical$Menu_Font?wdrand=372906355',

			'quality', 'high',

			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',

			'align', 'left',

			'play', 'true',

			'loop', 'true',

			'scale', 'showall',

			'wmode', 'transparent',

			'devicefont', 'false',

			'id', 'FolderMenuVerticalElem',

			'name', 'FolderMenuVerticalElem',

			'menu', 'true',

			'allowFullScreen', 'false',

			'allowScriptAccess','always',

			'movie', '$url_swf/Vertical$Menu_Font?wdrand=1018799407',

			'salign', 't',

			'flashvars', 'xmlUrl=$url_swf/Folder_vertical.php?wdrand=1566406044'

			);

			

	if(typeof(FolderMenuVerticalElem)=="undefined") 

		initFlash_Moz_vertical();

	else

		initFlash_vertical();

		

		}



	

function onmouseover_vertical()

{

if(typeof(FolderMenuVerticalObj)!="undefined")

	{

		FolderMenuVerticalObj.TOtrigger=true;

		FolderMenuVerticalObj.setHeightAndWidthTO();

	}

}

	

function onmouseout_vertical()

{

if(typeof(FolderMenuVerticalObj)!="undefined")

	{

		FolderMenuVerticalObj.TOtrigger=false;

	}

}

	

function initFlash_Moz_vertical()

{

if(typeof(document.FolderMenuVerticalElem.getWidth)=='function')

	FolderMenuVerticalObj=new FolderMenuVertical("foldermenuverticalContainer",document.FolderMenuVerticalElem,"FolderMenuVerticalObj");

else {setTimeout("initFlash_Moz_vertical()",500);}

}



function initFlash_vertical()

{

if(typeof(FolderMenuVerticalElem.getWidth)=='function')

	FolderMenuVerticalObj=new FolderMenuVertical("foldermenuverticalContainer",FolderMenuVerticalElem,"FolderMenuVerticalObj");

else {setTimeout("initFlash_vertical()",500);}

}

</script>

<noscript>



</noscript>

</div>

<script language="javascript">

	var foldermenuverticalContainerDiv = document.getElementById('foldermenuverticalContainer');

	document.body.appendChild(foldermenuverticalContainerDiv);

</script> 
HERE;
?><?php
echo $FC_frontend;
 $contenttt=$FC_frontend.$content;
return $content;

}

else
{
 return $content;
}

}



//// add frot end hook
add_action('the_content', 'front_end_vertical'); 


function front_end_vertical_fotter()  
{ 
$url_swf=plugins_url( '' , __FILE__ );
global $addflashonce;
$wrand=mt_rand();
global $post;
$from_top=get_option('Distance_from_top').'px';
$Menu_Name=get_option('Menu_Name');
$Menu_Font=get_option('Menu_Font');
$positoin=get_option('Position');
if($Menu_Name !='- Select Menu -'  && $Menu_Name && $addflashonce==1)
{
	$addflashonce=0;
$FC_frontend=<<<HERE
       <div id="foldermenuverticalContainer" onmouseover="onmouseover_vertical();" onmouseout="onmouseout_vertical();" style="position:$positoin; left:0px; top:$from_top; overflow:hidden;width:50px; z-index:1000; height:1500px;">

<script language="javascript">

	if (typeof(AC_FL_RunContent)=="undefined") {

		alert("This page requires AC_RunActiveContent.js.");

	} else {

		AC_FL_RunContent(

			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',

			'width', '1000',

			'height', '3000',

			'src', '$url_swf/Vertical$Menu_Font?wdrand=372906355',

			'quality', 'high',

			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',

			'align', 'left',

			'play', 'true',

			'loop', 'true',

			'scale', 'showall',

			'wmode', 'transparent',

			'devicefont', 'false',

			'id', 'FolderMenuVerticalElem',

			'name', 'FolderMenuVerticalElem',

			'menu', 'true',

			'allowFullScreen', 'false',

			'allowScriptAccess','always',

			'movie', '$url_swf/Vertical$Menu_Font?wdrand=1018799407',

			'salign', 't',

			'flashvars', 'xmlUrl=$url_swf/Folder_vertical.php?wdrand=1566406044'

			);

			

	if(typeof(FolderMenuVerticalElem)=="undefined") 

		initFlash_Moz_vertical();

	else

		initFlash_vertical();

		

		}



	

function onmouseover_vertical()

{

if(typeof(FolderMenuVerticalObj)!="undefined")

	{

		FolderMenuVerticalObj.TOtrigger=true;

		FolderMenuVerticalObj.setHeightAndWidthTO();

	}

}

	

function onmouseout_vertical()

{

if(typeof(FolderMenuVerticalObj)!="undefined")

	{

		FolderMenuVerticalObj.TOtrigger=false;

	}

}

	

function initFlash_Moz_vertical()

{

if(typeof(document.FolderMenuVerticalElem.getWidth)=='function')

	FolderMenuVerticalObj=new FolderMenuVertical("foldermenuverticalContainer",document.FolderMenuVerticalElem,"FolderMenuVerticalObj");

else {setTimeout("initFlash_Moz_vertical()",500);}

}



function initFlash_vertical()

{

if(typeof(FolderMenuVerticalElem.getWidth)=='function')

	FolderMenuVerticalObj=new FolderMenuVertical("foldermenuverticalContainer",FolderMenuVerticalElem,"FolderMenuVerticalObj");

else {setTimeout("initFlash_vertical()",500);}

}

</script>

<noscript>



</noscript>

</div>

<script language="javascript">

	var foldermenuverticalContainerDiv = document.getElementById('foldermenuverticalContainer');

	document.body.appendChild(foldermenuverticalContainerDiv);

</script> 
HERE;
?><?php
echo $FC_frontend;
}

}



//// add frot end hook
add_action('wp_footer', 'front_end_vertical_fotter'); 



//add menu hook
add_action('admin_menu', 'Vertical_menu');

// function creatin menu
function Vertical_menu(){
  add_menu_page('Folder Menu', 'Folder Menu', 'manage_options', 'Vertical_menu', 'Manage_Vertical_menu');
}



function Manage_Vertical_menu()
{
	echo '<script src="'.plugins_url( 'jscolor/jscolor.js' , __FILE__ ).'"></script>';
	echo '	<div style="text-align:left;font-size:16px;padding:20px; padding-right:50px">
		<a href="http://web-dorado.com/files/fromFolderMenu.php?from=wp" target="_blank" style="color:red; text-decoration:none;">
		<img src="http://web-dorado.com/images/header_paypal.png" border="0" alt="www.web-dorado.com" width="215"><br />
		If you want to have more then 3 menus</br> or more then 5 submenus, <br />
		you can buy the full version of Folder Menu here
		</a>
	</div>';
	echo "<h2>" . __( 'Folder Menu Parametrs', 'oscimp_trdom' ) . "</h2>";
	if(isset($_POST['Fold_men_vert']) && $_POST['Fold_men_vert'] == 'YY') {  
        //update display
        $Menu_Name = $_POST['Menu_Name'];  
        update_option('Menu_Name', $Menu_Name);  
		
		 $Position = $_POST['Position'];  
        update_option('Position', $Position);
		
		 $Distance_from_top = $_POST['Distance_from_top'];  
        update_option('Distance_from_top', $Distance_from_top);
		
		 $Menu_Background_Color = $_POST['Menu_Background_Color'];  
        update_option('Menu_Background_Color', $Menu_Background_Color);
		
		 $Menu_Text_Color = $_POST['Menu_Text_Color'];  
        update_option('Menu_Text_Color', $Menu_Text_Color);
		
		 $Menu_Hover_Color = $_POST['Menu_Hover_Color'];  
        update_option('Menu_Hover_Color', $Menu_Hover_Color);
		
		 $Submenu_Text_Color = $_POST['Submenu_Text_Color'];  
        update_option('Submenu_Text_Color', $Submenu_Text_Color);
		
		 $Submenu_Hover_Color = $_POST['Submenu_Hover_Color'];  
        update_option('Submenu_Hover_Color', $Submenu_Hover_Color);
        
         $Menu_Font = $_POST['Menu_Font'];  
        update_option('Menu_Font', $Menu_Font);
		$menu_items=wp_get_nav_menus();
		foreach($menu_items as $menu_item ){
    if($Menu_Name===$menu_item->name)
	$menu_count_all=$menu_item->count;
	}
	
	foreach($menu_items as $menu_item1 ){
	if($Menu_Name == $menu_item1->name)
	{
	  $menu_id=$menu_item1->term_id;
	}
	}
	$menu_count=0;
	$menu_itemsss = wp_get_nav_menu_items($menu_id);
	
	foreach((array) $menu_itemsss as $key => $menu_itemss)
		 {			 
			 if($menu_itemss->menu_item_parent==0){
				$menu_count++;					
		}		
	 }
	 $submenu_count=$menu_count_all-$menu_count;	
        ?>  
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>  
        <?php  
    }
	
	
	 else {  
        //Normal page display  
   		 $Menu_Name=get_option('Menu_Name');  
         $Position=get_option('Position');
         $Distance_from_top=get_option('Distance_from_top');  
         $Menu_Background_Color=get_option('Menu_Background_Color');
         $Menu_Text_Color=get_option('Menu_Text_Color'); 
         $Menu_Hover_Color=get_option('Menu_Hover_Color'); 
         $Submenu_Text_Color=get_option('Submenu_Text_Color');
         $Submenu_Hover_Color=get_option('Submenu_Hover_Color'); 
		 $Menu_Font=get_option('Menu_Font');
    }  
	
?>

<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<input type="hidden" value="YY" name="Fold_men_vert" />
<table class="form-table">
<tr>
<th>Menu Name</th>
<td>
<select name="Menu_Name" style="width:200px">
<option value="- Select Menu -"  <?php if($Menu_Name==='- Select Menu -') echo ' selected="selected"' ?>>- Select Menu -</option>
<?php			$menu_items=wp_get_nav_menus();

			foreach($menu_items as $menu_item ){
?>
<option value="<?php echo $menu_item->name ?>" <?php if($Menu_Name===$menu_item->name) echo ' selected="selected"' ?>><?php echo $menu_item->name ?></option>
<?php } ?>
</select>
</td>
</tr>
<tr>
<th>Position</th>
<td>
<select name="Position" style="width:200px">
<option value="Fixed" <?php if($Position==='Fixed') echo ' selected="selected"'; ?>>Fixed</option>
<option value="Absolute" <?php if($Position==='Absolute') echo ' selected="selected"'; ?>>Absolute</option>
</select>
</td>
</tr>

<tr>
<th>Distance from top</th>
<td>
<input type="text" value="<?php echo $Distance_from_top ?>" name="Distance_from_top" />
</td>
</tr>

<tr>
<th>Menu Background Color</th>
<td>
<input type="text" value="<?php echo $Menu_Background_Color ?>" name="Menu_Background_Color" class="color" />
</td>
</tr>

<tr>
<th>Menu Text Color</th>
<td>
<input type="text" value="<?php echo $Menu_Text_Color ?>" name="Menu_Text_Color" class="color" />
</td>
</tr>

<tr>
<th>Menu Hover Color</th>
<td>
<input type="text" value="<?php echo $Menu_Hover_Color ?>" name="Menu_Hover_Color" class="color" />
</td>
</tr>

<tr>
<th>Submenu Text Color</th>
<td>
<input type="text" value="<?php echo $Submenu_Text_Color ?>" name="Submenu_Text_Color" class="color" />
</td>
</tr>

<tr>
<th>Submenu Hover Color</th>
<td>
<input type="text" value="<?php echo $Submenu_Hover_Color ?>" name="Submenu_Hover_Color" class="color" />
</td>
</tr>

<tr>
<th>Menu Font</th>
<td>
<select  name="Menu_Font" >
<?php echo $Menu_Font ?>
<option value="Verdana" <?php if($Menu_Font=='Verdana') echo 'selected="selected"'?>>Verdana</option>
<option value="Lucida" <?php if($Menu_Font=='Lucida') echo 'selected="selected"'?>>Lucida</option>
<option value="Georgia" <?php if($Menu_Font=='Georgia') echo 'selected="selected"'?>>Georgia</option>
</select>

</td>
</tr>
</table>
<p class="submit">
<input type="submit" value="Save"  />
</p>


 </form>
<?php 
?>




<?php
}
function folder_activate()
{
if(!get_option('Menu_Background_Color'))
{
        add_option('Menu_Name','- Select Menu -');  
        add_option('Position', 'fixed');
        add_option('Distance_from_top', '80');  
        add_option('Menu_Background_Color', '00ADEF');
        add_option('Menu_Text_Color', 'FFFFFF'); 
        add_option('Menu_Hover_Color', '174287'); 
        add_option('Submenu_Text_Color', 'FFFFFF');
        add_option('Submenu_Hover_Color', '174287'); 
        add_option('Menu_Font', 'Verdana');
}
	
}
register_activation_hook( __FILE__, 'folder_activate' );
?>