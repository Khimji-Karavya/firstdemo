<?php
    include "header.php";	
?>
	<!--start slider-->
	<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner slider">
			<!--first slide image-->
			<div class="carousel-item active" data-bs-interval="1000">
				<img src="Images/sliderImage/slider1.jpg" class="d-block w-100" alt="..." />
			</div>

			<!--second slide image-->
			<div class="carousel-item" data-bs-interval="2000">
				<img src="Images/sliderImage/slider2.jpeg" class="d-block w-100" alt="..." />
			</div>

			<!--thard slide image-->
			<div class="carousel-item">
				<img src="Images/sliderImage/slider3.jpeg" class="d-block w-100" alt="..." />
			</div>
		</div>
		<!--previous buttom slider-->
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
			data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<!--next buttom slider-->
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
			data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
	<!--end slider-->

	<!--start srvices-->
	<div class="container">
		<div class="rowpt-4 mt-3">
			<h5><b>Services</b></h5>
		</div>
		<hr />
		<div class="row justify-content-around ornflowerblue">
			<div class="col-md-2 service">
				<strong>First service</strong>
			</div>
			<div class="col-md-2 service">
				<strong>Secont service</strong>
			</div>
			<div class="col-md-2 service">
				<strong>Thard service</strong>
			</div>
			<div class="col-md-2 service">
				<strong>Four service</strong>
			</div>
			<div class="col-md-2 service">
				<strong>Five service</strong>
			</div>
		</div>
	</div>

	<!--end services-->
	<!--start features product-->
	<div class="container">
		<div class="row pt-4 pb-2">
			<h5><b>Fatures product</b></h5>
		</div>
		<hr />
		<div class="row justify-content-around">
			<!--first product-->
			<div class="col-md-6 col-lg-3 justify-content-center">
				<div>
					<img src="Images/productImage/product1.jpeg" class="p-image" />
				</div>
				<div class="pimage">
					<div class="product-title">Title product</div>
					<div class="product-code">iteam#: ff3452</div>
					<div class="product-price">$ 222</div>
				</div>
			</div>

			<!--second product-->
			<div class="col-md-6 col-lg-3">
				<div>
					<img src="Images/productImage/product2.jpeg" class="p-image" />
				</div>
				<div class="pimage">
					<div class="product-title">Title product</div>
					<div class="product-code">iteam#: ff3452</div>
					<div class="product-price">$ 222</div>
				</div>
			</div>

			<!--thard product-->
			<div class="col-md-6 col-lg-3">
				<div>
					<img src="Images/productImage/product3.jpeg" class="p-image" />
				</div>
				<div class="pimage">
					<div class="product-title">Title product</div>
					<div class="product-code">iteam#: ff3452</div>
					<div class="product-price">$ 222</div>
				</div>
			</div>

			<!--four product-->
			<div class="col-md-6 col-lg-3">
				<div>
					<img src="Images/productImage/product4.jpeg" class="p-image" />
				</div>
				<div class="pimage">
					<div class="product-title">Title product</div>
					<div class="product-code">iteam#: ff3452</div>
					<div class="product-price">$ 222</div>
				</div>
			</div>
		</div>
	</div>
	<!--end features product-->
	<?php
    	include "footer.php";
    ?>