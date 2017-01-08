<?php
/*
 * NTeam
 * @package mod_nteam
 * @license GNU/GPL, see LICENSE.txt
 * Author: Nitish Gundherva
 */

 // no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

echo '<div id="nteam">';
    echo '<div class="container">';
        $imageno = $params->get('imageno');
        foreach ($teamMembers as $i => $member)
		{
            echo $member->link != '' ? '<div class="member" onclick="window.open(\'' . $member->link . '\', \'' . $params->get('link-tab') . '\');" style="cursor: pointer;">' : '<div class="member">';
        		echo '<div class="details">';
            		echo '<img alt="' . $member->name . '" src="' . $member->image . '" height="170px"/>';
		            echo '<h2 class="title">' . $member->name . '</h2>';
		            echo $member->field1 != '' ? '<h5 class="field1">' . $member->field1 . '</h5>' : '';
		            echo $member->field2 != '' ? '<h5 class="field2">' . $member->field2 . '</h5>' : '';
        		echo '</div>';
        	echo '</div>';
            echo $imageno!=0 && ($i+1)%$imageno == 0 ? '<div style="clear:both;"></div>' : '';
	    }
    echo '</div>';
echo '</div>';
echo '<div style="clear:both;"></div>';