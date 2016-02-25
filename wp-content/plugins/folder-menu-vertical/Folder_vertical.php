<?php
include '../../../wp-load.php';
echo '<dropdown>
	<settings
		closeMenuOnClick= "yes"
		menuColor = "0x'.get_option('Menu_Background_Color').'"
		menuFontColor = "0x'.get_option('Menu_Text_Color').'"
		menuFontGlowColor = "0x'.get_option('Menu_Hover_Color').'"
		subMenuFontColor = "0x'.get_option('Submenu_Text_Color').'"
		subMenuFontGlowColor = "0x'.get_option('Submenu_Hover_Color').'"
		>
	 </settings>';
	 $menu_items1=wp_get_nav_menus();
	 $Menu_Name=get_option('Menu_Name');
	 $k=0;
	 $y=0;
	foreach($menu_items1 as $menu_item1 ){
	if($Menu_Name == $menu_item1->name)
	{
	$menu_id=$menu_item1->term_id;
	}
	}
	 
	  if($Menu_Name !='- Select Menu -' && $Menu_Name)
	 {
		 $menu_items = wp_get_nav_menu_items($menu_id);
		 
		 
		 foreach((array) $menu_items as $key => $menu_item)
		 {			 
			 if($menu_item->menu_item_parent==0){
				 if($k==0)
				 {
			 echo '<menu cap="'.str_replace('"','',$menu_item->title).'"
			 url = "'.$menu_item->url.'"
			 window = "'.(($menu_item->target) ? '_blank' : '_self').'">';
			   $k=1;
				 }
			 else
			 {
				
			 echo '</menu><menu cap="'.str_replace('"','',$menu_item->title).'"
			 url = "'.$menu_item->url.'"
			 window = "'.(($menu_item->target) ? '_blank' : '_self').'">';
			 }
			 
		}
		else
		{
			echo  
			 '<submenu cap="'.str_replace('"','',$menu_item->title).'"		
				url = "'.$menu_item->url.'" 	 
				window = "'.(($menu_item->target) ? '_blank' : '_self').'" >
			</submenu>';
		}
	 }
	 if($k==1)
	 {
	 echo '</menu></dropdown>';
	 }
	 else
	 {
	  echo '</dropdown>';
	 }
	 }
?>