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
                <a href="admin-profile.html"><img src="{{ asset('assets/images/bart.jpg') }}" class="img-fluid" /></a>
             </div>
             <div class="admin-support">
                <a href="support.html"><button class="support-btn" name="admin_support">Support <i class="fa-sharp fa-solid fa-arrow-right"></i></button></a>
             </div>
          </div>
          <div class="article-action-panel">
             <div class="row">
                <div class="col-lg-7 col-md-7 col-12">
                   <div class="action-box pe-0">
                      <div class="back-to-user">
                         <a href="{{ route('articles') }}">
                         <img src="{{ asset('assets/images/Refund_back.svg') }}" class="img-fluid" />
                         </a>
                      </div>
                      <div class="social-info">
                         <ul class="d-flex align-items-center">
                            <li>
                               <a href="#"><img src="{{ asset('assets/images/icon-share.svg') }}" class="img-fluid" /> <span>13</span> </a>
                            </li>
                            <li>
                               <a href="#"><img src="{{ asset('assets/images/icon-comments.svg') }}" class="img-fluid" /> <span>3</span> </a>
                            </li>
                            <li>
                               <a href="#"><img src="{{ asset('assets/images/icon-likes.svg') }}" class="img-fluid" /> <span>239</span> </a>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
                <div class="col-lg-5 col-md-5 col-12">
                   <div class="action-box ps-3">
                      <div class="delete-user">
                         <a href="#">
                         <img src="{{ asset('assets/images/delete-icon.svg') }}" class="img-fluid" />
                         </a>
                      </div>
                      <div class="article-featured">
                         <div class="form-switch {{ ( $article->featured == true ) ? "active" : "" }}">     
                            <label class="form-check-label" for="articleFeatured">Featured</label>
                            <input class="form-check-input" type="checkbox" name="featured" role="switch" id="articleFeatured"/>                                        
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </header>
       <div class="admin-dashboard-panel">
          <div class="edit-article-section">
             <input type="hidden" id="totalContent" name="totalContent" value="{{ count($article->content )}}" />
             <form class="article-edit article-from" action="{{route('article.update', $article->id)}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PATCH')
               <input type="hidden" id="featured" name="featured" value="true">
                <div class="row">
                   <div class="col-md-7 col-lg-7 col-12">
                      <div class="chat-board">
                         <div class="inner-chat">
                            <div class="form-group article-bio-group">
                               <textarea name="title" class="action-control article-title-input" placeholder="Type your title here. Keep it short & sweet. Max 60 characters." readonly="readonly">{{old('title', ucfirst($article->title) ?? "" )}}</textarea>
                               <a href="#"> <img src="{{ asset('assets/images/icon-pencil.svg') }}" class="img-fluid article-title-edit"></a>
                               @if ($errors->has('title'))
                                <span class="text-danger custom-errors">{{ $errors->first('title') }}</span>
                               @endif
                            </div>
                            @if(count($article->content) > 0)
                                @foreach ($article->content as $content)
                                    @php($countIndex= $loop->index + 1)
                                    @if($content->media_type == "text" && !empty($content->media_type))
                                       <div class="form-group draggable" draggable="true" id="content_item_{{ $countIndex }}">
                                          <input type="hidden" name="content[{{$countIndex}}][id]" id="content_id" value="{{$content->id ?? ""}}"/>
                                          <input type="hidden" name="content[{{$countIndex}}][media_type]" id="media_type" value="{{$content->media_type}}"/>
                                          <input type="hidden" name="content[{{$countIndex}}][content]" id="content" value="{{$content->content}}"/>
                                          <input type="hidden" name="content[{{$countIndex}}][delete]" id="isDelete_{{ $countIndex }}" value=""/>
                                          <input type="hidden" name="content[{{$countIndex}}][content_index]" class="idIndex" value="{{$content->content_index ?? ""}}"/>
                                          <input type="hidden" name="content[{{$countIndex}}][tag]" class="tag" value="{{$content->tag ?? ""}}"/>
                                          <div class="articles-box">
                                             <p>{{$content->content}} as</p>
                                             <a href="#" class="icon-rectangle"><img src="{{ asset('assets/images/icon-rectangle.svg') }}" class="img-fluid"></a>          
                                             <a href="#" class="icon-delete content-delete" data-id="{{$countIndex}}"><img src="{{ asset('assets/images/delete-icon.svg') }}" class="img-fluid"></a>
                                          </div>
                                       </div>
                                    @endif

                                    @if($content->media_type == "image" && !empty($content->media_type))
                                       <div class="form-group draggable" draggable="true" id="content_item_{{ $countIndex }}">
                                          <input type="hidden" name="content[{{$countIndex}}][id]" value="{{$content->id ?? ""}}"/>
                                          <input type="hidden" name="content[{{$countIndex}}][media_type]" id="media_type" value="{{$content->media_type}}"/>
                                          <input type="hidden" name="content[{{$countIndex}}][delete]" id="isDelete_{{ $countIndex }}" value=""/>
                                          <input type="hidden" name="content[{{$countIndex}}][content_index]" class="idIndex" value="{{$content->content_index ?? ""}}"/>
                                          <input type="hidden" name="content[{{$countIndex}}][tag]" class="tag" value="{{$content->tag ?? ""}}"/>
                                          <input type="hidden" name="content[{{$countIndex}}][new_media]" class="new_media_image_{{$countIndex}}" value="false" /> 
                                          <div class="articles-box">
                                             <a href="#" class="icon-rectangle"><img src="{{ asset('assets/images/icon-rectangle.svg') }}" class="img-fluid"></a>
                                             <img src="{{ $content->content }}" class="w-100 img-fluid view_image_{{$countIndex}}">
                                             <input type="file" class="action-control content-img-vid" name="content[{{$countIndex}}][content]" data-index="{{$countIndex}}" accept="image/*" >
                                             <input type="hidden" name="content[{{$countIndex}}][content]" id="content" value="{{$content->content}}"/>
                                             <span><img src="{{ asset('assets/images/icon-edit.svg') }}" class="img-fluid"></span>
                                             <a href="#" class="icon-delete content-delete" data-id="{{$countIndex}}"><img src="{{ asset('assets/images/delete-icon.svg') }}" class="img-fluid"></a>
                                          </div>
                                       </div>
                                     @endif

                                    @if($content->media_type == "video" && !empty($content->media_type))
                                       <div class="form-group draggable" draggable="true" id="content_item_{{ $countIndex }}">
                                          <input type="hidden" name="content[{{$countIndex}}][id]" id="content_id" value="{{$content->id ?? ""}}"/>
                                          <input type="hidden" name="content[{{$countIndex}}][media_type]" id="media_type" value="{{$content->media_type}}"/>
                                          <input type="hidden" name="content[{{$countIndex}}][delete]" id="isDelete_{{ $countIndex }}" value=""/>
                                          <input type="hidden" name="content[{{$countIndex}}][content_index]" class="idIndex" value="{{$content->content_index ?? ""}}"/>
                                          <input type="hidden" name="content[{{$countIndex}}][tag]" class="tag" value="{{$content->tag ?? ""}}"/>
                                          <input type="hidden" name="content[{{$countIndex}}][new_media]"  class="new_media_video_{{$countIndex}}" value="false" /> 
                                          <div class="articles-box">
                                                <a href="#" class="icon-rectangle"><img src="{{ asset('assets/images/icon-rectangle.svg') }}" class="img-fluid"></a>
                                                <video class="w-100 view_video_{{$countIndex}}" controls>
                                                   <source src="{{$content->content}}"  type="video/mp4">
                                                 </video>
                                                <input type="file" class="action-control content-img-vid" name="content[{{$countIndex}}][content]" data-index="{{$countIndex}}" accept="video/*" >
                                                <input type="hidden" name="content[{{$countIndex}}][content]" id="content" value="{{$content->content}}"/>
                                                <span><img src="{{ asset('assets/images/icon-edit.svg') }}" class="img-fluid"></span>
                                                <a href="#" class="icon-delete content-delete" data-id="{{$countIndex}}"><img src="{{ asset('assets/images/delete-icon.svg') }}" class="img-fluid"></a>
                                          </div>
                                       </div>
                                    @endif
                                 @endforeach
                             @endif
                         </div>
                         <div class="form-group article-dynamic-fields"></div>
                         <div class="format-box">
                            <div class="format-box-panel">
                               <a href="#" class="add-article-text"><img src="{{ asset('assets/images/plus-icon.png') }}" class="img-fluid"></a>
                               <a href="#" class="add-article-font" data-type="italic"><img src="{{ asset('assets/images/Aa-italic.png') }}" class="img-fluid"></a>
                               <a href="#" class="add-article-font" data-type="normal"><img src="{{ asset('assets/images/Aa-normal.png') }}" class="img-fluid"></a>
                               <a href="#" class="add-article-image" data-type="image"><img src="{{ asset('assets/images/cam-icon.png') }}" class="img-fluid"></a>
                               <a href="#" class="add-article-video" data-type="video"><img src="{{ asset('assets/images/video-icon.png') }}" class="img-fluid"></a>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="col-md-5 col-lg-5 col-12 ms-auto">
                      <div class="right-section">
                         <div class="profile-box">
                              <img src="{{ $article->image ? $article->image : asset('assets/images/article-placeholder.jpg') }}" class="img-fluid" id="articleImagePreview">
                              <input type="file" name="image" class="action-control" id="articleImageUpload" accept="image/*">
                              <input type="hidden" name="image_featured" id="image_featured" value="{{ $article->image ?? "" }}">
                              <span><img src="{{ asset('assets/images/icon-edit.svg') }}" class="img-fluid"></span>
                              @if($errors->has('image'))
                                 <span class="text-danger custom-errors">{{ $errors->first('image') }}</span>
                              @endif
                         </div>
                         <div class="form-group user-article-group">
                            <div class="user-media user-profile_picture">
                               <img src="{{ !empty($article->profile_picture) ? $article->profile_picture : asset('assets/images/userplaceholder.png') }}" class="user-thumb img-fluid">
                            </div>
                            <div class="user-text">
                               <h5>{{ $article->user_details->first_name ?? "" }} {{ $article->user_details->last_name ?? ""}}</h5>
                               <p>@ {{ $article->user_details->first_name ?? ""}} {{$article->user_details->last_name ?? ""}}</p>
                               <a href="#">{{ $article->user_details->user_role ?? ""}}</a>
                            </div>
                         </div>
                         <div class="form-group">
                            <div class="user-categories">
                               <select name="category_id" id="category_id" class="action-control">
                                  <option>All Categories</option>
                                  @if ($categories->status)
                                    @foreach($categories->data as $categorie)
                                        <option value="{{ $categorie->id }}" {{ (  $categorie->id == $article->category_id) ? 'selected' : '' }}>{{ ucfirst($categorie->name) }}</option>
                                    @endforeach
                                 @endif
                               </select>
                               <img src="{{ asset('assets/images/chevron-down.png') }}" class="img-fluid">
                            </div>
                           @if($errors->has('category_id'))
                              <span class="text-danger custom-errors">{{ $errors->first('category_id') }}</span>
                           @endif
                         </div>
                         <div class="form-group article-date">
                            <h5>{{ date('F jS Y', strtotime($article->created_at)) }}</h5>
                         </div>
                         <div class="col-12 text-end">
                            <button type="submit" class="save-btn w-100" name="save_message_data" value="save changes">Save changes <i class="fa-sharp fa-solid fa-arrow-right"></i></button>
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