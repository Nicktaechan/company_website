<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Biz Co Ltd</title>
		<meta charset="utf-8" />
		<link type="text/css" rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="slides.css">
		<link rel="icon" href="images/logo.png" type="image/png" sizes="16x16">		
    </head>
	<body>	
	<div class="page_top">
		<div class="page_toplogo_home">
			<h3>Biz Co Ltd</h3>
			<div class="page_topcontact">
				<ul>
					<li>
						<span class="fa fa-envelope-o"></span>
						<span class="page_toptext_home"><a href="mailto:biz@gmail.com">biz@gmail.com</a></span>
					</li>
					<li>
						<span class="fa fa-phone"></span>
						<span class="page_toptext_home">+254-797-979-797</span>
					</li>					
				</ul>
			</div>
		</div>
		
	</div>
	
	<?php
	include ("includes/navigation.php");
	?>

	<div class="header_home">
		<div class="header_home_background">
		<img class="header_home_backgroundimage" src="images/worldmapwithkenya.jfif" alt="Word Map"/>
		</div>
		<div class="header_wrapp">			
			<div class="header_content">
				<div class="header_text">
					<h1 id="homepage_h1">Professional Trading & Business Services Since 2000</h1>
					<p>Reliable trading and business services with elite honest, trust and integrity in Kenya, Eastern Africa and Africa.</p>
				</div>
				<div class="header_button"><a href="contact_us.php">Contact Us</a></div>
			</div>
			<div class="header_homeimage">
				
				 <!-- Slideshow container -->
				<div class="slideshow-container">

				  <!-- Full-width images with number and caption text -->
				  <div class="mySlides fade">
					<div class="numbertext">1 / 6</div>
					<img src="images/image1.jfif" style="width:100%" alt="Slideshow Photo" />					
				  </div>

				  <div class="mySlides fade">
					<div class="numbertext">2 / 6</div>
					<img src="images/image2.jfif" style="width:100%" alt="Slideshow Photo" />					
				  </div>
				  
				  <div class="mySlides fade">
					<div class="numbertext">3 / 6</div>
					<img src="images/image3.jfif" style="width:100%" alt="Slideshow Photo" />					
				  </div>
				  
				  <div class="mySlides fade">
					<div class="numbertext">4 / 6</div>
					<img src="images/image4.jfif" style="width:100%" alt="Slideshow Photo" />					
				  </div>
	
				  <div class="mySlides fade">
					<div class="numbertext">5 / 6</div>
					<img src="images/image5.jfif" style="width:100%" alt="Slideshow Photo" />					
				  </div>

				  <div class="mySlides fade">
					<div class="numbertext">6 / 6</div>
					<img src="images/image6.jfif" style="width:100%" alt="Slideshow Photo" />					
				  </div>

				  <!-- Next and previous buttons -->
				  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
				  <a class="next" onclick="plusSlides(1)">&#10095;</a>
				</div>
				<br>
				
				<!-- The dots/circles -->
				<div class="dot_group" style="text-align:center">
				  <span class="dot" onclick="currentSlide(1)"></span>
				  <span class="dot" onclick="currentSlide(2)"></span>
				  <span class="dot" onclick="currentSlide(3)"></span>
				  <span class="dot" onclick="currentSlide(4)"></span>
				  <span class="dot" onclick="currentSlide(5)"></span>
				  <span class="dot" onclick="currentSlide(6)"></span>
				</div> 
			</div>
		</div>
	</div>
	<div class="content_home">
		<div class="home_benefitlist">
			<div class="benefitlist">
				<a href=""><img class="benefitlist_image" src="images/partnership.jfif" alt="partnership"/></a>
				<h3>Partnership</h3>
				<p>Our business collaborates trading and investment services with long-term partnerships.</p>
				<p><a href="">Learn More <i class="fa fa-caret-right"></i></a></p>
			</div>
			<div class="benefitlist">
				<a href="trading.php"><img class="benefitlist_image" src="images/consulting.jfif" alt="services"/></a>
				<h3>Trading & Consulting</h3>
				<p>Trading and Consulting</p>
				<p><a href="trading.php">Learn More <i class="fa fa-caret-right"></i></a></p>
			</div>
			<div class="benefitlist">
				<a href="gallery.php"><img class="benefitlist_image" src="images/products.jfif" alt="products"/></a>
				<h3>Gallery</h3>
				<p>Interested in what we trade? Take a look at the gallery we can find for you.</p>
				<p><a href="gallery.php">Learn More <i class="fa fa-caret-right"></i></a></p>
			</div>
		</div>
		
		<hr>
		
		<div class="home_featurehight">
			<div>
				<h2>Welcome to Biz Company Ltd</h2>
				<p>Looking for longstanding cooperation and decent price for your products?</p>
				<p>We provide first-class, efficient, and customized services to fit Your need  and requirements <br />with decent price and longstanding cooperation.</p>
			</div>
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
			
			var slideIndex = 1;
			showSlides(slideIndex);

			// Next/previous controls
			function plusSlides(n) {
			  showSlides(slideIndex += n);
			}

			// Thumbnail image controls
			function currentSlide(n) {
			  showSlides(slideIndex = n);
			}

			function showSlides(n) {
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("dot");
			  if (n > slides.length) {slideIndex = 1}
			  if (n < 1) {slideIndex = slides.length}
			  for (i = 0; i < slides.length; i++) {
				  slides[i].style.display = "none";
			  }
			  for (i = 0; i < dots.length; i++) {
				  dots[i].className = dots[i].className.replace(" active", "");
			  }
			  slides[slideIndex-1].style.display = "block";
			  dots[slideIndex-1].className += " active";
			} 
		
	</script>
	
	</body>
</html>