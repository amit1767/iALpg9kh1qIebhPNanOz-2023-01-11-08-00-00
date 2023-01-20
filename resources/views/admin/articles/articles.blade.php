@extends('layouts.layout')
@section('content')

<div class="col-lg-9 col-md-9 col-12 px-0">
    <div class="admin-dashboard users-panel">
        <header>
            <div class="admin-short-info">
                <h2>Articles <span> <a href="{{route('article.create')}}" class="user-new-btn">New</a></span></h2>
            </div>
            <div class="admin-full-info">
                <div class="admin-text">
                    <h5>Bart van Buggenhout</h5>
                    <p>@BartArabians</p>
                    <a href="admin-profile.html">Admin</a>
                </div>
                <div class="admin-media">
                    <a href="admin-profile.html"><img src="assets/images/bart.jpg" class="img-fluid" /></a>
                </div>
                <div class="admin-support">
                    <a href="support.html"><button class="support-btn" name="admin_support">Support <i class="fa-sharp fa-solid fa-arrow-right"></i></button></a>
                </div>
            </div>  
        </header>
        
        <div class="admin-dashboard-panel">
            <div class="user-filter-panel">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-12">
                        <div class="filter-form">
                            <form>
                                <div class="form-group">
                                    <div class="user-types">
                                        <select>
                                            <option>All User Types</option>
                                            <option>Admin</option>
                                            <option>Editor</option>
                                            <option>Advertiser</option>
                                            <option>Expert</option>
                                            <option>Standard user</option>
                                            <option>My articles</option>
                                        </select>
                                        <img src="assets/images/chevron-down.png" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="user-types">
                                        <select>
                                            <option>Active articles</option>
                                            <option>Stored articles</option>
                                        </select>
                                        <img src="assets/images/chevron-down.png" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="user-types">
                                        <select>
                                            <option>Newest First</option>
                                            <option>Most recent activity</option>
                                            <option>Most content (articles/articles/forum)</option>
                                            <option>Newest First</option>
                                        </select>
                                        <img src="assets/images/chevron-down.png" class="img-fluid" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12 ps-0">
                        <div class="search-form">
                            <form>
                                <div class="form-group">
                                    <div class="user-types">
                                        <input type="search" name="search_input" placeholder="" />
                                        <img src="assets/images/icon-search.png" class="img-fluid" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="articles-panel">
                <div class="row">
                    @if ($articles->status)
                        @foreach ($articles->data->data as $article)
                            <div class="col-lg-4 col-md-4 col-12" id="article_box_{{$article->id}}">
                                <div class="articles">
                                    <div class="articles-box" style="background-image:url('{{ $article->image }}');">
                                        <div class="articles-header">
                                            <div class="articles-author">
                                                <div class="profile-picture blue-border">
                                                    <img src="{{ $article->user_details->profile_picture ?? "" }}" onerror="this.onerror=null;this.src='{{ 'assets/images/userplaceholder.png' }}'" class="img-fluid" alt="profile image" />
                                                </div>
                                                <h4>@if(!empty($article->user_details->first_name)){{$article->user_details->first_name}}@endif @if(!empty($article->user_details->last_name)){{$article->user_details->last_name}}@endif  <span>@ @if(!empty($article->user_details->first_name)){{$article->user_details->first_name}}@endif @if(!empty($article->user_details->last_name)){{$article->user_details->last_name}}@endif </span></h4>
                                            </div>                                                    
                                            <a href="#">{{$article->user_details->user_role ?? ""}}</a>
                                        </div>
                                        <div class="articles-footer">
                                            <h5>{{ $article->text ?? ""}}</h5>
                                        </div>
                                    </div>
                                    <div class="articles-content">
                                        <ul class="articles-meta">
                                            <li>
                                                <a href="#" class="meta-cat">{{ ucfirst($article->category->name ?? "") }}</a>
                                            </li>
                                            <li>
                                                <a href="#" class="meta-date">{{ date('F jS Y', strtotime($article->created_at ?? "")) }}</a>
                                            </li>
                                        </ul>
                                        <ul class="articles-social">
                                            <li>
                                                <a href="#"><span>13</span> <img src="assets/images/icon-share.svg" class="img-fluid" /></a>
                                            </li>
                                            <li>
                                                <a href="#"><span>3</span> <img src="assets/images/icon-comments.svg" class="img-fluid" /></a>
                                            </li>
                                            <li>
                                                <a href="#"><span>239</span> <img src="assets/images/icon-likes.svg" class="img-fluid" /></a>
                                            </li>
                                        </ul>
                                        <ul class="articles-action">
                                            <li >
                                                <a href="#" class="deleteArticles" data-id="{{$article->id}}"><img src="assets/images/delete-icon.svg" class="img-fluid" /></a>
                                            </li>
                                            <li>
                                                <a href="#" id="pinArticles" data-id="{{$article->id}}"><img src="assets/images/icon-pin.svg" class="img-fluid" /></a>
                                            </li>
                                            <li>
                                                <a  href="{{ route('article.edit', $article->id) }}" class="user-new-btn">Edit</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <span>don't have any records!</span>
                    @endif

                    <div class="col-lg-12 col-md-12 col-12 mt-4">
                        <div class="pagination">
                            <ul>
                                <li><a href="#">Previous</a></li>
                                <li><a href="#" class="active">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li><a href="#">7</a></li>
                                <li><a href="#">8</a></li>
                                <li><a href="#">9</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>                  
    </div>
</div>
@endsection
