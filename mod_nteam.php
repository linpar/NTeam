<?php
/*
 * NTeam
 * @package mod_nteam
 * @license GNU/GPL, see LICENSE.txt
 * Author: Nitish Gundherva
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
// Include the syndicate functions only once
require_once( dirname(__FILE__).'/helper.php' );
 
$nteam = modTeamHelper::getTeam( $params );
$layout = $params->get('layout', 'default');
require( JModuleHelper::getLayoutPath( 'mod_nteam', $layout ) );
?>
