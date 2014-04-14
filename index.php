<?php
define('DOMAIN','http://nitish.nsitonline.in/nteam');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>NTeam - A Joomla! Module</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="nteam, joomla, module, nitish, extension, team, member, css3" />
		<meta name="description" content="NTeam is a Joomla! module that displays the list of team members in a fancy way." />
		<meta content="<?php echo DOMAIN;?>/images/nteam.jpg" property="og:image"/>
		
		<link href="<?php echo DOMAIN;?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo DOMAIN;?>/css/style.css" rel="stylesheet">
		
		<link rel="shortcut icon" href="<?php echo DOMAIN;?>/images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo DOMAIN;?>/images/favicon.ico" type="image/x-icon">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<?php include('pages/ana.php'); ?>
<body>
	<div class="main-container">
		<div class="navbar navbar-inverse navbar-custom" role="navigation">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="<?php echo DOMAIN;?>">NTeam</a>
			</div>
			<div class="collapse navbar-collapse">
				  <ul class="nav navbar-nav navbar-right">
					<li><a style="color:#D8401E" href="front" rel="menu"><small class="glyphicon glyphicon-home"></small> Home</a></li>
					<li><a style="color:#69C" href="features" rel="menu"><small class="glyphicon glyphicon-cog"></small> Features</a></li>
					<li><a style="color:#E05151" href="downloads" rel="menu"><small class="glyphicon glyphicon-download-alt"></small> Downloads</a></li>
					<li><a style="color:#FFD146" href="contact" rel="menu"><small class="glyphicon glyphicon-comment"></small> Contact me</a></li>
				  </ul>
			</div>
		  </div>
		</div>
		<div class="container" id="main_content">
			<?php include_once('pages/front.php'); ?>
			
		</div>
		<div class="clear"></div>
	</div>
	<div id="footer">
      <div class="container">
        <p class="text-muted text-center">Copyright &copy; <a href="http://nitish.nsitonline.in" target="_blank">Nitish Gundherva</a></p>
      </div>
    </div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="<?php echo DOMAIN;?>/js/bootstrap.min.js"></script>
	<script src="<?php echo DOMAIN;?>/js/form.js"></script>
	<script>
	$(document).ready(function() {
		$(document).on("click","#contact", function (e) {
			submitForm(e);
		});
	});
	</script>
	<script>
		$( document ).ready(function() {
			$('a[rel*=menu]').on("click", function() {
				var filename = $(this).attr('href');
				$("#main_content").hide().html('<img style="position: absolute; left:48%; top: 48%;" src="images/ajax_load.gif" />').fadeIn(0);
				$.ajax({
					type: "POST",
					url: "pages/"+filename+".php",  
					success: function(result){
						$("#main_content").hide().html(result).fadeIn(1000);
					}
				});
				return false;
			});
		})
	</script>
</body>
</html>