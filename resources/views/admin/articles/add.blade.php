@extends('layouts.layout')
@section('content')

<div class="col-lg-9 col-md-9 col-12 px-0">
    <div class="admin-dashboard users-panel">
        <header>
            <div class="admin-short-info">
                <h2>Articles</h2>
            </div>
            <div class="admin-full-info">
                <div class="admin-text">
                    <h5>Bart van Buggenhout</h5>
                    <p>@BartArabians</p>
                    <a href="admin-profile.html">Admin</a>
                </div>
                <div class="admin-media">
                    <a href="admin-profile.html"><img src="../assets/images/bart.jpg" class="img-fluid" /></a>
                </div>
                <div class="admin-support">
                    <a href="support.html"><button class="support-btn" name="admin_support">Support <i class="fa-sharp fa-solid fa-arrow-right"></i></button></a>
                </div>
            </div> 
        </header>
        
        <div class="admin-dashboard-panel">
            <div class="article-action-panel">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="action-box pe-0">
                            <div class="back-to-user">
                                <a href="{{route('articles')}}">
                                    <img src="../assets/images/Refund_back.svg" class="img-fluid" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="action-box ps-3">
                            <div class="publish-article">
                                <a href="#" class="user-new-btn">Publish</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="articles-panel">
                @if(session('success'))
                <div class="alert alert-success">
                   {{session('success')}}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger">
                   {{session('error')}}
                </div>
                @endif
                <form class="edit-article-form" action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-12">
                            <div class="form-group article-bio-group">
                                <textarea name="title" class="action-control article-title-input @error('title') is-invalid @enderror" placeholder="Type your title here. Keep it short & sweet. Max 60 characters." readonly="readonly">{{ old('title') }}</textarea>
                                <img src="{{ asset('assets/images/icon-pencil.svg') }}"  class="img-fluid article-title-edit" alt="article title edit image"/>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div> 
                            <div class="form-group article-dynamic-fields">

                            </div>
                            <div class="form-group format-box">
                                <div class="format-box-panel">
                                    <a href="#" class="add-article-text"><img src="../assets/images/plus-icon.png" class="img-fluid" alt="article text icon" /></a>
                                    <a href="#" class="add-article-font"  data-type="italic"><img src="../assets/images/Aa-italic.png" class="img-fluid" alt="article italic icon"/></a>
                                    <a href="#" class="add-article-font"  data-type="normal"><img src="../assets/images/Aa-normal.png" class="img-fluid" alt="article normal icon"/></a>
                                    <a href="#" class="add-article-image" data-type="image"><img src="../assets/images/cam-icon.png" class="img-fluid" alt="article image icon"/></a>
                                    <a href="#" class="add-article-video" data-type="video"><img src="../assets/images/video-icon.png" class="img-fluid" alt="article video icon"/></a>
                                </div>
                            </div>                                           
                        </div>
                        <div class="col-lg-5 col-md-5 col-12">
                            <div class="article-sidebar">
                                <div class="form-group article-media-group">
                                    <img src="../assets/images/article-placeholder.jpg" id="articleImagePreview" class="w-100 img-fluid" />
                                    <input type="file" name="image" class="action-control @error('image') is-invalid @enderror" id="articleImageUpload" accept="image/*">
                                    <span><img src="../assets/images/icon-edit.svg" class="img-fluid"></span>
                                    @error('image')
                                    <label class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </label>
                                    @enderror
                                </div>                                           
                                <div class="form-group">
                                    <div class="user-categories">
                                        <select class="action-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id" >
                                            <option value="">All Categories</option>
                                            @if ($categories->status)
                                                @foreach($categories->data as $categorie)
                                                    <option value="{{ $categorie->id }}">{{ ucfirst($categorie->name) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <img src="../assets/images/chevron-down.png" class="img-fluid" />
                                    </div>
                                    @if($errors->has('category_id'))
                                        <span class="text-danger custom-errors" role="alert">
                                            <strong>{{ $errors->first('category_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group mb-2">
                                    <button type="submit" class="save-btn" name="user_save_data" value="Save Article">Save Article <i class="fa-sharp fa-solid fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>                  
    </div>
</div>
@endsection


