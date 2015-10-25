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
$padding = $height / 25;
?>
<style type="text/css">
#nteam {
	width: 100%
}

#nteam .container {
	width: auto
}

#nteam .member {
	width: <?php echo $width;?>px;
    height: auto;
    border: <?php echo $border_width;?>px solid <?php echo $color;?>;
    overflow: hidden;
	position: relative;
	-webkit-transform: scale(0.8);
	-moz-transform: scale(0.8);
	-o-transform: scale(0.8);
	-ms-transform: scale(0.8);
	-webkit-transition-duration: 0.5s;
	-moz-transition-duration: 0.5s;
	-o-transition-duration: 0.5s;
	-ms-transition-duration: 0.5s;
	transition-duration: 0.5s;
	margin: 0 -6px;
	float: left;
	text-align: center;
	background: #fff url('/media/mod_nteam/img/bg.jpg') no-repeat center center;
}

#nteam .member .mask {
    width: <?php echo $width;?>px;
    height: <?php echo $height;?>px;
	position: absolute;
	overflow: hidden;
	top: 0;
	left: 0
}

#nteam .member img {
    width: <?php echo $width;?>px;
    height: <?php echo $height;?>px;
	display: block;
	position: relative
}

#nteam h2 {
	text-transform: uppercase;
	color: #FFF;
	text-align: center;
	position: relative;
	font-size: 17px;
	padding: 10px;
	background: rgba(0, 0, 0, 0.8);
	margin: 20px 0 0 0
}

#nteam .member a.info {
	display: inline-block;
	text-decoration: none;
	padding: 7px 14px;
	font-weight: bold;
	background: #000;
	color: #FFF;
	text-transform: uppercase;
	-webkit-box-shadow: 0 0 1px #000;
	-moz-box-shadow: 0 0 1px #000;
	box-shadow: 0 0 1px #000
}

#nteam .member p {
	font-family: Georgia, serif;
	font-style: italic;
	font-size: 12px;
	position: relative;
	color: #fff;
	padding: <?php echo $padding;?>px <?php echo $padding;?>px <?php echo $padding;?>px;
    margin: 0;
	text-align: center
}
#nteam .member .title {
    font-size: <?php echo $titleFontSize;?>px !important;
    text-align: center;
}
#nteam .member .field1
{
    font-size: <?php echo $field1FontSize;?>px !important;
    text-align: center;
}
#nteam .member .field2
{
    font-size: <?php echo $field2FontSize;?>px !important;
    text-align: center;
}

#nteam .member a.info: hover {
	-webkit-box-shadow: 0 0 5px #000;
	-moz-box-shadow: 0 0 5px #000;
	box-shadow: 0 0 5px #000
}

.clearfi {
	clear: both
}
#nteam .member img {
	-webkit-transition: all 0.2s ease-in;
	-moz-transition: all 0.2s ease-in;
	-o-transition: all 0.2s ease-in;
	-ms-transition: all 0.2s ease-in;
	transition: all 0.2s ease-in
}

#nteam .member .mask {
	background-color: rgba(0, 0, 0, 0.6);
	-ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
	filter: alpha(opacity=0);
	opacity: 0;
	-webkit-transform: translate(460px, -100px) rotate(180deg);
	-moz-transform: translate(460px, -100px) rotate(180deg);
	-o-transform: translate(460px, -100px) rotate(180deg);
	-ms-transform: translate(460px, -100px) rotate(180deg);
	transform: translate(460px, -100px) rotate(180deg);
	-webkit-transition: all 0.2s 0.4s ease-in-out;
	-moz-transition: all 0.2s 0.4s ease-in-out;
	-o-transition: all 0.2s 0.4s ease-in-out;
	-ms-transition: all 0.2s 0.4s ease-in-out;
	transition: all 0.2s 0.4s ease-in-out
}

#nteam .member h2 {
	-webkit-transform: translateY(-100px);
	-moz-transform: translateY(-100px);
	-o-transform: translateY(-100px);
	-ms-transform: translateY(-100px);
	transform: translateY(-100px);
	-webkit-transition: all 0.2s ease-in-out;
	-moz-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	-ms-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out
}

#nteam .member p {
	-webkit-transform: translateX(300px) rotate(90deg);
	-moz-transform: translateX(300px) rotate(90deg);
	-o-transform: translateX(300px) rotate(90deg);
	-ms-transform: translateX(300px) rotate(90deg);
	transform: translateX(300px) rotate(90deg);
	-webkit-transition: all 0.2s ease-in-out;
	-moz-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	-ms-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out
}

#nteam .member a.info {
	-webkit-transform: translateY(-200px);
	-moz-transform: translateY(-200px);
	-o-transform: translateY(-200px);
	-ms-transform: translateY(-200px);
	transform: translateY(-200px);
	-webkit-transition: all 0.2s ease-in-out;
	-moz-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	-ms-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out
}

#nteam .member:hover .mask {
	-ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
	filter: alpha(opacity=100);
	opacity: 1;
	-webkit-transition-delay: 0s;
	-moz-transition-delay: 0s;
	-o-transition-delay: 0s;
	-ms-transition-delay: 0s;
	transition-delay: 0s;
	-webkit-transform: translate(0px, 0px);
	-moz-transform: translate(0px, 0px);
	-o-transform: translate(0px, 0px);
	-ms-transform: translate(0px, 0px);
	transform: translate(0px, 0px)
}

#nteam .member:hover h2 {
	-webkit-transform: translateY(0px);
	-moz-transform: translateY(0px);
	-o-transform: translateY(0px);
	-ms-transform: translateY(0px);
	transform: translateY(0px);
	-webkit-transition-delay: 0.5s;
	-moz-transition-delay: 0.5s;
	-o-transition-delay: 0.5s;
	-ms-transition-delay: 0.5s;
	transition-delay: 0.5s
}

#nteam .member:hover p {
	-webkit-transform: translateX(0px) rotate(0deg);
	-moz-transform: translateX(0px) rotate(0deg);
	-o-transform: translateX(0px) rotate(0deg);
	-ms-transform: translateX(0px) rotate(0deg);
	transform: translateX(0px) rotate(0deg);
	-webkit-transition-delay: 0.4s;
	-moz-transition-delay: 0.4s;
	-o-transition-delay: 0.4s;
	-ms-transition-delay: 0.4s;
	transition-delay: 0.4s
}

#nteam .member:hover a.info {
	-webkit-transform: translateY(0px);
	-moz-transform: translateY(0px);
	-o-transform: translateY(0px);
	-ms-transform: translateY(0px);
	transform: translateY(0px);
	-webkit-transition-delay: 0.3s;
	-moz-transition-delay: 0.3s;
	-o-transition-delay: 0.3s;
	-ms-transition-delay: 0.3s;
	transition-delay: 0.3s
}
</style>