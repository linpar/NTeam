<?php
/*
 * NTeam
 * @package mod_nteam
 * @license GNU/GPL, see LICENSE.txt
 * Author: Nitish Gundherva
 */

 // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 
$document = JFactory::getDocument();
$_SESSION['color'] = $params->get('border-color');
$_SESSION['width'] = $width = $params->get('image-width');
$_SESSION['height'] = $height = $params->get('image-height');
$_SESSION['border_width'] = $params->get('border-width');
include_once('modules/mod_nteam/css/mod_nteam.php');
include("resize-class.php");
?>
<div id="nteam">
	<div class="container">
		<?php 
		for($i=1; $params->get('name_'.$i) != NULL ; $i++)
		{
			$name = $params->get('name_'.$i);
			$field1 = $params->get('field1_'.$i);
			$field2 = $params->get('field2_'.$i);
			$link = $params->get('link_'.$i);
			$image = $params->get('image_'.$i);
			$imageno = $params->get('imageno');
			$method = $params->get('image-method');
			$resizeObj = new resize($image);
			$resizeObj -> resizeImage( $width, $height, $method);
			$resizeObj -> saveImage('media/mod_nteam/'.basename($image), 100);
			$image = 'media/mod_nteam/'.basename($image);

		?>
			<div class="member">
				<div class="details">
					<?php if($link != NULL)?>
						<a href="<?php echo $link;?>" target="_blank">
					<?php if($image!=NULL)?>
						<img alt="<?php echo $name;?>" src="<?php echo $image;?>" height="170px"/>
					</a>
					<?php if($link != NULL)?>
					<a href="<?php echo $link;?>" target="_blank">
						<h2><?php echo $name;?></h2>
					</a>
					<?php if($field1!= NULL)
					{?>
					<h5><?php echo $field1;?></h5>
					<?php
					}
					if($field2!= NULL)
					{?>
					<h5><?php echo $field2;?></h5>
					<?php } ?>
				</div>
			</div>
			<?php
			if($i%$imageno == 0) 
			{?>
			<div class="clearfi"></div>
			<?php }
		}?>
	</div>
</div>
<div class="clearfix"></div>
	