@extends('layouts.base')
@section('title','boutique')
@section('content')
<section>
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>FRESH AND ORGANIC</p>
                        <h1>Shop</h1>
                    </div>
                </div>
            </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".jus">Jus</li>
                            <li data-filter=".foods">Foods</li>
                            <li data-filter=".bread">Bread</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                <!-- Produit 1 -->
                <div class="col-lg-4 col-md-6 text-center jus">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="/detail_product"><img src="/assets/user/img/products/Bissap.jpg" alt=""></a>
                        </div>
                        <h3>Jus de Bissap</h3>
                        <p class="product-price"><span>Per bottle</span> 85$ </p>
                        <a href="/cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add Cart</a>
                    </div>
                </div>
                <!-- Produit 2 -->
                <div class="col-lg-4 col-md-6 text-center jus">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="/detail_product"><img src="/assets/user/img/products/Clou de Girofle.jpg" alt=""></a>
                        </div>
                        <h3>Jus de Clou de Girofle</h3>
                        <p class="product-price"><span>Per bottle</span> 70$ </p>
                        <a href="/cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add Cart</a>
                    </div>
                </div>
                <!-- Produit 3 -->
                <div class="col-lg-4 col-md-6 text-center jus">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="/detail_product"><img src="/assets/user/img/products/Gingembre.jpg" alt=""></a>
                        </div>
                        <h3>Jus de Gingembre</h3>
                        <p class="product-price"><span>per bottle</span> 35$ </p>
                        <a href="/cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add Cart</a>
                    </div>
                </div>
                <!-- Produit 4 -->
                <div class="col-lg-4 col-md-6 text-center jus">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="/detail_product"><img src="/assets/user/img/products/Jus d'ananas.jpg" alt=""></a>
                        </div>
                        <h3>Jus Ananas</h3>
                        <p class="product-price"><span>Per bottle</span> 50$ </p>
                        <a href="/cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add Cart</a>
                    </div>
                </div>
                <!-- Produit 5 -->
                <div class="col-lg-4 col-md-6 text-center jus">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="/detail_product"><img src="/assets/user/img/products/Mangue.jpg" alt=""></a>
                        </div>
                        <h3>Jus de Mangue</h3>
                        <p class="product-price"><span>Per bottle</span> 45$ </p>
                        <a href="/cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add Cart</a>
                    </div>
                </div>
                <!-- Produit 6 -->
                <div class="col-lg-4 col-md-6 text-center jus">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="/detail_product"><img src="/assets/user/img/products/Menthe.jpg" alt=""></a>
                        </div>
                        <h3>Jus de Menthe</h3>
                        <p class="product-price"><span>Per bottle</span> 80$ </p>
                        <a href="/cart" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add Cart</a>
                    </div>
                </div>
                <!-- Produit breads   -->
                <div class="col-lg-4 col-md-6 text-center bread">
                    <!-- Ajouter la classe bread a chaque produit de cette catégorie pour le filtrage -->
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="/detail_product"><img src="/assets/user/img/products/bread1.jpg" alt=""></a>
                        </div>
                        <h3></h3>
                        <p class="product-price"><span>Per bottle</span> 80$ </p>
                        <a class="cart-btn" id="cours"><i class="fas fa-shopping-cart"></i> Indisponible</a>
                    </div>
                </div>
                <!-- Produit Foods  -->
                <div class="col-lg-4 col-md-6 text-center foods">
                    <!-- Ajouter la classe foods a chaque produit de cette catégorie pour le filtrage -->
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="/detail_product"><img src="/assets/user/img/products/foods1.jpg" alt=""></a>
                        </div>
                        <h3>Jus de Menthe</h3>
                        <p class="product-price"><span>Per bottle</span> 80$ </p>
                        <a class="cart-btn" id="cours"><i class="fas fa-shopping-cart"></i> Indisponible</a>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end products -->
</section>
@endsection