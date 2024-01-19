@extends('layouts.admin')
@section('title', 'orders')
@section('content')
<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Mes produits</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                <form class="docs-search-form row gx-1 align-items-center">
                                    <div class="col-auto">
                                        <input type="text" id="search-docs" name="searchdocs" class="form-control search-docs" placeholder="Search">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn app-btn-secondary">Search</button>
                                    </div>
                                </form>

                            </div><!--//col-->
                            <div class="col-auto">

                                <select class="form-select w-auto">
                                    <option selected="" value="option-1">All</option>
                                    <option value="option-2">Text file</option>
                                    <option value="option-3">Image</option>
                                    <option value="option-4">Spreadsheet</option>
                                    <option value="option-5">Presentation</option>
                                    <option value="option-6">Zip file</option>

                                </select>
                            </div>
                            <div class="col-auto">
                                <a class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" href="">Ajouter un produit</a>
                            </div>
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->
            @if(session('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
                <a class="flex-sm-fill text-sm-center nav-link text-uppercase active" id="all-produit-button" data-bs-toggle="tab" role="tab" aria-selected="true">All</a>
                @foreach($categories as $categorie)
                <a class="flex-sm-fill text-sm-center nav-link text-uppercase onglet" data-category-id="{{$categorie->id}}" data-bs-toggle="tab" role="tab" aria-selected="false">{{$categorie->name}}</a>
                @endforeach
            </nav>
            <div class="tab-content" id="produit-table-tab-content">

                <div class="category" id="produit-all">
                    <div class="row g-4">
                        @foreach($produits as $produit)
                        <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
                            <div class="app-card app-card-doc shadow-sm  h-100">
                                <div class="app-card-thumb-holder p-3">
                                    <div class="app-card-thumb">
                                        <img class="thumb-image w-100 h-100" src="/storage/{{$produit->img}}" alt="">
                                    </div>
                                    <a class="app-card-link-mask" href="#file-link"></a>
                                </div>
                                <div class="app-card-body p-3 has-card-actions">

                                    <h4 class="app-doc-title truncate mb-0"><a href="#file-link">{{$produit->name}}</a></h4>
                                    <div class="app-doc-meta">
                                        <ul class="list-unstyled mb-0">
                                            <li><span class="text-muted">Prix:</span>{{$produit->prix}}</li>
                                            <li><span class="text-muted">Quantité:</span> {{$produit->quantity}}</li>
                                        </ul>
                                    </div><!--//app-doc-meta-->

                                    <div class="app-card-actions">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                </svg>
                                            </div><!--//dropdown-toggle-->
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                                            <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                        </svg>View</a></li>
                                                <li><a class="dropdown-item edit" data-bs-toggle="modal" data-bs-target="#modificationProduit" data-produit-name="{{$produit->name}}" data-produit-quantity="{{$produit->quantity}}" data-produit-prix="{{$produit->prix}}" data-produit-description="{{ $produit->description }}" data-produit-id="{{$produit->id}}" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                        </svg>Edit</a></li>
                                                <li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                        </svg>Download</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item delete" data-bs-toggle="modal" data-bs-target="#delete-produit" data-produit-name="{{$produit->name}}" data-produit-quantity="{{$produit->quantity}}" data-produit-id="{{$produit->id}}" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>Delete</a>
                                                </li>
                                            </ul>
                                        </div><!--//dropdown-->
                                    </div><!--//app-card-actions-->

                                </div><!--//app-card-body-->

                            </div><!--//app-card-->
                        </div><!--//col-->
                        @endforeach
                    </div><!--//row-->
                </div>

                @foreach($categories as $categorie)
                <div class="category" id="category-{{$categorie->id}}">
                    <div class="row g-4">
                        @foreach($produits as $produit)
                        @if($categorie->id == $produit->category_id)
                        <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
                            <div class="app-card app-card-doc shadow-sm  h-100">
                                <div class="app-card-thumb-holder p-3">
                                    <div class="app-card-thumb">
                                        <img class="thumb-image w-100 h-100" src="/storage/{{$produit->img}}" alt="">
                                    </div>
                                    <a class="app-card-link-mask" href="#file-link"></a>
                                </div>
                                <div class="app-card-body p-3 has-card-actions">

                                    <h4 class="app-doc-title truncate mb-0"><a href="#file-link">{{$produit->name}}</a></h4>
                                    <div class="app-doc-meta">
                                        <ul class="list-unstyled mb-0">
                                            <li><span class="text-muted">Prix:</span>{{$produit->prix}}</li>
                                            <li><span class="text-muted">Quantité:</span> {{$produit->quantity}}</li>
                                        </ul>
                                    </div><!--//app-doc-meta-->

                                    <div class="app-card-actions">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                                </svg>
                                            </div><!--//dropdown-toggle-->
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
                                                            <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                        </svg>View</a></li>
                                                <li><a class="dropdown-item edit" data-bs-toggle="modal" data-bs-target="#modificationProduit" data-produit-name="{{$produit->name}}" data-produit-quantity="{{$produit->quantity}}" data-produit-prix="{{$produit->prix}}" data-produit-description="{{ $produit->description }}" data-produit-id="{{$produit->id}}" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                        </svg>Edit</a></li>
                                                <li><a class="dropdown-item" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                        </svg>Download</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item delete" data-bs-toggle="modal" data-bs-target="#delete-produit" data-produit-name="{{$produit->name}}" data-produit-quantity="{{$produit->quantity}}" data-produit-id="{{$produit->id}}" href="#"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>Delete</a>
                                                </li>
                                            </ul>
                                        </div><!--//dropdown-->
                                    </div><!--//app-card-actions-->

                                </div><!--//app-card-body-->

                            </div><!--//app-card-->
                        </div><!--//col-->
                        @endif
                        @endforeach
                    </div><!--//row-->
                </div>
                @endforeach
                <nav class="app-pagination mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav><!--//app-pagination-->
            </div><!--//container-fluid-->
        </div><!--//app-content-->


        <footer class="app-footer">
            <div class="container text-center py-3">
                <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>

            </div>
        </footer><!--//app-footer-->

    </div><!--//app-wrapper-->

    <!-- Start Modal Ajout de produits -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="" method="post" action="/addProducts" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout de produit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="d-flex">
                            <div class="mb-3 px-1">
                                <label for="recipient-name" class="col-form-label">Nom:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3 px-1">
                                <label for="message-text" class="col-form-label">Prix:</label>
                                <input type="text" class="form-control" id="prix" name="prix">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Quantité:</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" style="height: 100px"></textarea>
                        </div>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option selected>Catégorie</option>
                            @foreach($categories as $categorie)
                            <option value="{{$categorie->id}}" class="text-uppercase">{{$categorie->name}}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Image:</label>
                            <input class="form-control" type="file" id="formFile" accept="image/*" name="img">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
    <!-- End Modal Ajout de produits -->

    <!-- Start Modal modification de produits -->
    <div class="modal fade" id="modificationProduit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="modifForm" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modification de produit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="d-flex">
                            <div class="mb-3 px-1">
                                <label for="recipient-name" class="col-form-label">Nom:</label>
                                <input type="text" class="form-control" id="update-name" name="name">
                            </div>
                            <div class="mb-3 px-1">
                                <label for="message-text" class="col-form-label">Prix:</label>
                                <input type="text" class="form-control" id="update-prix" name="prix">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Quantité:</label>
                            <input type="text" class="form-control" id="update-quantity" name="quantity">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                            <textarea class=" form-control w-100" name="description" id="update-description" style="height: 100px"></textarea>
                        </div>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option value="">Catégorie</option>
                            @foreach($categories as $categorie)
                            <option value="{{$categorie->id}}" class="text-uppercase">{{$categorie->name}}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Image:</label>
                            <input class="form-control" type="file" id="formFile" accept="image/*" name="img">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
    <!-- End Modal Ajout de produits -->

    <!-- Start modal delete -->
    <div class="modal fade" id="delete-produit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete-produit-Label">Suppression</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Voulez vous vraiment supprimer <span class="produit_name"></span> ayant une quantité de <span class="produit_quantity"></span> produits.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form id="delete" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal delete -->

    <script>
        $(document).ready(function() {
            $('#produit-all').show();
            $('.category').on('click', function() {
                var categoryName = $(this).data('category-name');
                $(this).attr('id', 'category' + categoryName, 'href', '');
                $(this).attr('href', '#produit-' + categoryName);
                $(this).attr('id', 'produit-' + categoryName + '-tab');
                $(this).attr('aria-controls', 'produit-' + categoryName);


            })
            $('.edit').on('click', function() {
                var produitName = $(this).data('produit-name');
                var produitDescription = $(this).data('produit-description');
                var produitQuantity = $(this).data('produit-quantity');
                var produitPrix = $(this).data('produit-prix');
                var produitId = $(this).data('produit-id');
                // console.log(produitDescription);
                $('#update-name').attr('value', produitName);
                $('#update-description').val(produitDescription);
                $('#update-prix').attr('value', produitPrix);
                $('#update-quantity').attr('value', produitQuantity);
                $('#modifForm').attr('action', '/updateProduit/' + produitId);
            })
            $('.delete').on('click', function() {
                $(".produit_name").text($(this).data('produit-name'));
                $('.produit_quantity').text($(this).data('produit-quantity'));
                var produitId = $(this).data('produit-id');
                $('#delete').attr("action", "/deleteProduit/" + produitId);
            })
            $('#all-produit-button').on('click', function() {
                $('.category').hide();
                $('#produit-all').show();
            })
            $('.onglet').on('click', function() {
                categoryId = $(this).data('category-id')
                $('.category').hide();
                $('#category-' + categoryId).show();
            })
        })
    </script>

    @endsection