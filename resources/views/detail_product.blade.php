@extends('layouts.base')
@section('title', 'details')
@section('content')

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Voir plus de détails</p>
						<h1>Produit Unique</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="/assets/user/img/products/Bissap.jpg" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>Jus de Bissap</h3>
						<p class="single-product-pricing"><span>Par bouteille</span> $50</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi
							cum voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi
							perferendis eos eum modi! Tempora, earum.</p>
						<div class="single-product-form">
							<form action="index.html">
								<input type="number" placeholder="0">
							</form>
							<a href="/cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Panier</a>
							<p><strong>Categories: </strong>Fruit</p>
						</div>
						<h4>share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Produits </span> connexes</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
							beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/detail_product"><img src="/assets/user/img/products/Clou de Girofle.jpg" alt=""></a>
						</div>
						<h3>Jus Clou de Girofle</h3>
						<p class="product-price"><span>Par personne</span> 85$ </p>
						<a href="/cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Panier</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/detail_product"><img src="/assets/user/img/products/Gingembre.jpg" alt=""></a>
						</div>
						<h3>Jus de Gingembre</h3>
						<p class="product-price"><span>Par bouteille</span> 70$ </p>
						<a href="/cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Panier</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/detail_product"><img src="/assets/user/img/products/Jus d'ananas.jpg" alt=""></a>
						</div>
						<h3>Jus d'ananas</h3>
						<p class="product-price"><span>Par bouteille</span> 35$ </p>
						<a href="/cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Panier</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end more products -->

@endsection