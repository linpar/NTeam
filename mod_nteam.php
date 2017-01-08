<?php
/*
 * NTeam Plus
 * @package mod_nteam_plus
 * @license GNU/GPL, see LICENSE.txt
 * Author: Nitish Gundherva
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
// Include the syndicate functions only once
require_once( dirname(__FILE__).'/helper.php' );
require_once( dirname(__FILE__).'/imageresize.php' );

ModNTeamHelper::$imageResizeHelper = new ModNTeamImageResizeHelper();

$teamMembers = ModNTeamHelper::getMembers($params);
print_r($teamMembers);
$imageWidth = $params->get('image-width');
$imageHeight = $params->get('image-height');
$borderColor = $params->get('border-color');
$borderWidth = $params->get('border-width');
$titleFontSize = $params->get('title-size');
$field1FontSize = $params->get('field1-size');
$field2FontSize = $params->get('field2-size');

// Include CSS Files
require_once(dirname(__FILE__).'/css/style.php');

$layout = $params->get('layout', 'default');
require( JModuleHelper::getLayoutPath( 'mod_nteam', $layout ) );
?>