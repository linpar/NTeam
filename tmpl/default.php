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
$_SESSION['titleFontSize'] = $params->get('title-size');
$_SESSION['field1FontSize'] = $params->get('field1-size');
$_SESSION['field2FontSize'] = $params->get('field2-size');
include_once('modules/mod_nteam/css/mod_nteam_' . $params->get('style-type') . '.php');
include_once("resize-class.php");
include($params->get('style-type') . '.php');
?>
<div style="clear:both;"></div>