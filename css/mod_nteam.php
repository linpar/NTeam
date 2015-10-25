<?php
/*
 * NTeam
 * @package mod_nteam
 * @license GNU/GPL, see LICENSE.txt
 * Author: Nitish Gundherva
 */
defined( '_JEXEC' ) or die( 'Restricted access' );  
$color = $_SESSION['color'];
$width = $_SESSION['width'];
$border_width = $_SESSION['border_width'];
$height = $_SESSION['height'];
$titleFontSize= $_SESSION['titleFontSize'];
$field1FontSize= $_SESSION['field1FontSize'];
$field2FontSize= $_SESSION['field2FontSize'];
?>
<style type="text/css">
#nteam
{
	width: 100%;
}
#nteam .container
{
	width: auto;
}
#nteam a
{
	text-decoration:none;
}
#nteam .title
{
	font-size: <?php echo $titleFontSize;?>px !important;
	text-align: center;
}
#nteam .field1
{
	font-size: <?php echo $field1FontSize;?>px !important;
	text-align: center;
}
#nteam .field2
{
	font-size: <?php echo $field2FontSize;?>px !important;
	text-align: center;
}
#nteam .member
{
	width: <?php echo $width;?>px;
	height: auto;
	padding: 5px;
	border-style: solid;
   	border-width: <?php echo $border_width;?>px;
	border-color: <?php echo $color;?>;
	overflow: hidden;
	-webkit-transform: scale(0.8); /*Webkit: Scale down image to 0.8x original size*/
	-moz-transform: scale(0.8); /*Mozilla scale version*/
	-o-transform: scale(0.8); /*Opera scale version*/
	-ms-transform: scale(0.8); /*Internet Explorer*/
	-webkit-transition-duration: 0.5s; /*Webkit: Animation duration*/
	-moz-transition-duration: 0.5s; /*Mozilla duration version*/
	-o-transition-duration: 0.5s; /*Opera duration version*/
	-ms-transition-duration: 0.5s; /*Internet Explorer*/
	transition-duration: 0.5s;
	opacity: 0.8; /*initial opacity of images*/
	margin: 0 -6px; /*margin between images*/
	float: left;
}
#nteam .member:hover
{	
	transform: scale(1.0);
	-webkit-transform: scale(1.0); /*Webkit: Scale up image to 1.2x original size*/
	-moz-transform: scale(1.0); /*Mozilla scale version*/
	-o-transform: scale(1.0); /*Opera scale version*/
	-ms-transform: scale(1); /*Internet Explorer*/
	box-shadow: 0px 0px 20px #ABABAB; /*CSS3 shadow: 30px blurred shadow all around image*/
	-webkit-box-shadow: 0px 0px 20px #ABABAB; /*Safari shadow version*/
	-moz-box-shadow: 0px 0px 20px #ABABAB; /*Mozilla shadow version*/
	-o-box-shadow: 0px 0px 20px #ABABAB; /*Mozilla shadow version*
	-ms-box-shadow: 0px 0px 20px #ABABAB; /*Mozilla shadow version*
	opacity: 1;
}
#nteam img
{
	width: <?php echo $width;?>px;
	height: <?php echo $height;?>px;
}
#nteam .details
{
	text-align: center;
}
</style>