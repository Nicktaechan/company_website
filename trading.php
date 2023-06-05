<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Biz Co Ltd</title>
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
		<h1>Trading Services</h1>
	</div>
	
	<div class="content">

	<div class="trading_row">
		<h1>Looking for products?<br />
		We customize your need and requirements <br />in the most efficient timing</h1>
		
		<br />
		
		<p>We can help you find all types of products you need with decent price and quality, <br />and deliver them in time for your business.</p>
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