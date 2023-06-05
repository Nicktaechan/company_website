<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Biz Co Ltd - Business Consulting</title>
		<meta charset="utf-8" />
		<link type="text/css" rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="icon" href="images/logo.png" type="image/png" sizes="16x16">	
	</head>
	<body>
	
	<?php
	include ("includes/page_top.php");
	?>
	
	<?php
	include ("includes/navigation.php");
	?>
	
	<div class="header">
		<div>
		<img class="header_backgroundimage" src="images/worldmapwithkenya.jfif" alt="Company Office">
		</div>
		<h1>Business Consulting</h1>
	</div>
		
	<div class="content businessconsulting_top">
		<hr>
		<h2><a href="contact_us.php">Contact Us</a> for more details and customized services for more opportunities</h2>
	</div>
	
	<?php
	include ("includes/sitemap_footer.php");
	?>
	
	<script>
			window.onscroll = function() {myFunction()};

			var navigation_bar = document.getElementById("navigation");
			var sticky = navigation_bar.offsetTop;

			function myFunction() {
				if (window.pageYOffset > sticky) {
					navigation_bar.classList.add("sticky");
				} else {
					navigation_bar.classList.remove("sticky");
				}
			}
	</script>
		
	</body>
</html>