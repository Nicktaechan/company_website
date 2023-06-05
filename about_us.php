<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Biz Co Ltd - About Us</title>
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
		<h1>About Us</h1>
	</div>
	
	<div class="content aboutus_top">
	<div class="aboutus_wrap1">
		<div class="aboutus_intro1">
			<img src="images/logo.png" alt="World Map with Location Marks" />
		</div>
		<div class="aboutus_intro2">
			<h2>Biz Co Ltd</h2>
		
			<p>Founded in Nairobi, Kenya in 2000, Biz Co. Ltd. has been providing excellent, international trading and business consultation services for customers around the world.</p>

			<p>With more than 30 year professional business practice, we have served our clients, suppliers, and established business partnerships in the following countries:</p>
		</div>
	</div>
	
	<div class="aboutus_wrap2">
		<img src="images/worldmapwithkenya.jfif" alt="World Map with Location Marks" />
	</div>
			
	<div class="aboutus_wrap3">
		<div class="aboutus_wrap3_row">
			<ul>
				<li>Tanzania</li>
				<li>Uganda</li>
				<li>South Sudan</li>
				<li>South africa</li>
				<li>Nigeria</li>
				<li>Germany</li>
			</ul>	
		</div>
		<div class="aboutus_wrap3_row">
			<ul>
				<li>Italy</li>
				<li>North Korea</li>
				<li>UK</li>
				<li>USA</li>
			</ul>
		</div>
	</div>	
	</div>
	
	<div class="aboutus_middle">
	<div class="aboutus_wrap4">
		<p>Serving with efficiency, honest and integrity, Biz Co. Ltd is reliable and can be your top-rated business partnership to your success.</p>
	</div>
	</div>

	
	<div class="content aboutus_bottom">
		<div class="aboutus_wrap5_image">
			<img src="images/ceo.jfif" alt="CEO Photo" />
		</div>
		
		<div class="aboutus_wrap5_text">
			<h2>CEO & Founder</h2>
			<p>Principal and founder of trading companies in Kenya, trading diverse products between Africa, America, and Europe.</p>

			<p>Executive managing director of logistic companies in Nairobi, Kenya.</p>

			<p>35-year international trading experience in directorship capacity with solid accomplishments in various designs and marketing, development, strategic planning, business development, sales and logistics, and customer services.</p>
		
		</div>
		
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