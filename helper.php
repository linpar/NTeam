<?php
/*
 * NTeam Plus
 * @package mod_nteam_plus
 * @license GNU/GPL, see LICENSE.txt
 * Author: Nitish Gundherva
 */
defined( '_JEXEC' ) or die( 'Restricted access' ); 
class ModNTeamHelper
{
	static $imageResizeHelper;

	private static $titlePrefix = 'name_';
	private static $field1Prefix = 'field1_';
    private static $field2Prefix = 'field2_';
	private static $imagePrefix = 'image_';
	private static $linkPrefix = 'link_';

    public static function resizeImage($sourceImage, $width, $height, $method, $saveToImage)
    {
		self::$imageResizeHelper->resizeImage($sourceImage, $width, $height, $method);
		self::$imageResizeHelper->saveImage($saveToImage, 100);
    }

    public static function getMembers($params)
    {
    	$members = array();
    	for($i=1; $i<=100; $i++)
    	{
    		$member = self::getMember($params, $i);
    		if($member != null)
    		{
    			$members[] = $member;
    		}
    	}
        if($params->get('sort-by') != '')
        {
            usort($members, array("self", "sortBy".ucfirst($params->get('sort-by'))));
        }
        return $members;
    }

    public static function getMember($params, $i)
    {
    	if($params->get(self::$titlePrefix.$i) != null)
    	{
	    	$member = new stdClass();
	   		$member->name = $params->get(self::$titlePrefix.$i);
	   		$member->field1 = $params->get(self::$field1Prefix.$i);
            $member->field2 = $params->get(self::$field2Prefix.$i);
	   		$member->link = self::getMemberLink($params, $i);
	   		$member->image = self::getMemberImage($params, $i);
	   		return $member;
    	}
    	return null;
    }

    public static function getMemberLink($params, $i)
    {
        $link = '';
        if($params->get(self::$linkPrefix.$i) != null)
        {
            if(parse_url($params->get(self::$linkPrefix.$i), PHP_URL_SCHEME) === null)
            {
                $link = 'http://' . $params->get(self::$linkPrefix.$i);
            }
            else
            {
                $link = $params->get(self::$linkPrefix.$i);
            }
        }
        return $link;
    }

    public static function getMemberImage($params, $i)
    {
    	$image = $params->get(self::$imagePrefix.$i);
    	$width = $params->get('image-width');
    	$height = $params->get('image-height');
		$method = $params->get('image-method');

		if(!file_exists($image))	
			$image = JURI::root().'media/mod_nteam/img/no-image.jpg';
		$target = JPATH_BASE.'/media/mod_nteam/'.basename($image);
		$newImage = JURI::root().'/media/mod_nteam/'.basename($image);

		self::resizeImage($image, $width, $height, $method, $target);
		return $newImage;
    }

    public static function sortByName($a, $b)
	{
	    return strcmp($a->name, $b->name);
	}

	public static function sortByField1($a, $b)
	{
	    return strcmp($a->field1, $b->field1);
	}

    public static function sortByField2($a, $b)
    {
        return strcmp($a->field2, $b->field2);
    }
}
?>