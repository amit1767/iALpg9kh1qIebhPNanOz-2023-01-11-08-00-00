<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ArabianService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Validator;


class ArticlesController extends Controller
{
    
    protected ArabianService $arabianService;
    public function __construct(ArabianService $arabianService)
    {
        $this->arabianService = $arabianService;
    }

    /**
     * Show the all articles.
     *
     * @return View
     */
    public function getArticles()
    {
        $articles =  $this->arabianService->getArticles($page = 1, $per_page = 10, null);
        return view('admin/articles/articles', compact('articles'));
    }

    /**
     * Create article here
     *
     * @return View
     */
    public function createArticle()
    {
        $categories =  $this->arabianService->getCategories($page = 1, $per_page = 10, null);
        return view('admin/articles/add', compact('categories'));
    }

    /**
     * Article store in database
     * 
     * @return Response
     */
    public function storeArticle(Request $request)
    {
        $this->validate($request, [
            'title' => "required",
            'image' => 'required',
            'category_id' => 'required',
            'content' => 'array',
			'content.*.content' => 'required',
        ]);

        if($request->has("title")){
            $saveArticleData['title'] = $request->title;
        }	
        if($request->has("status")){
            $saveArticleData['status'] = 'Pending';
        }
        if($request->has("category_id")){
            $saveArticleData['category_id'] = (int)$request->category_id;
        }
        if($request->hasfile('image')){
            $uploadedFileUrl = Cloudinary::uploadFile($request->file('image')->getRealPath())->getSecurePath();
            $saveArticleData['image']= $uploadedFileUrl;
        }

        if($request->has('content')){
            $i = 0;
            foreach($request->content as $file)
            {
                if(isset($file['media_type'])){
                    $saveArticleData['content'][$i]['media_type'] = $file['media_type'];
                }
                if(isset($file['media_type']) && $file['media_type'] == 'image' || $file['media_type'] == 'video')
                {
                    $contentFileUrl = Cloudinary::uploadFile($file['content']->getRealPath())->getSecurePath();
                    $saveArticleData['content'][$i]['content'] = $contentFileUrl;
                }
                else
                {
                    $saveArticleData['content'][$i]['content'] =  $file['content'];
                }
                if(isset($file['tag']))
                {
                    $saveArticleData['content'][$i]['tag'] =  $file['tag'];
                }                            
                $i++;
            }
        }
       
        $articles = $this->arabianService->storeArticle($id = null, $queryParams = null, $saveArticleData);
        if ($articles->status ==  true){
            return redirect()->back()->withSuccess($articles->message);
        }else{
            return redirect()->back()->withError($articles->message);
        }
    }

    /**
     * @int $id The id of the article
     * Article edit details show method
     * @return View
     */
    public function editArticle($id)
    {
        $categories =  $this->arabianService->getCategories($page = 1, $per_page = 10, null);
        $getArticle = $this->arabianService->editArticle($id);
        $article = $getArticle->data;
        return view('admin/articles/edit', compact('article','categories'));
    } 


    /**
     * Updates article entity
     * 
     */
    public function updateArticle(Request $request){
        
        $updateArticle = [
            "title" => $request->title,
            "status" => "Pending",
            "featured" => !empty($request->featured) ? true : false,
            "category_id" => (int)$request->category_id,
        ];

        if($request->has("image_featured") && !empty($request->image_featured)) {
            $updateArticle['image']= $request->image_featured;
        }else{
            if($request->hasfile('image') && empty($request->image_featured)){
                $uploadedFeaturedImage = Cloudinary::uploadFile($request->file('image')->getRealPath())->getSecurePath();
                $updateArticle['image']= $uploadedFeaturedImage;
            }
        }

        if($request->has('content')){
            $i = 0;
            foreach($request->content as $contentItem)
            {
                if(isset($contentItem['id'])){
                    $updateArticle['content'][$i]['id'] = (int)$contentItem['id'];
                }
               
                if(isset($contentItem['media_type'])){
                    $updateArticle['content'][$i]['media_type'] = $contentItem['media_type'];
                }

                if(isset($contentItem['content'])){
                    if(isset($contentItem['new_media']) && $contentItem['new_media'] == 'true'){
                        $contentFileUrl = Cloudinary::uploadFile($contentItem['content']->getRealPath())->getSecurePath();
                        $updateArticle['content'][$i]['content'] = $contentFileUrl;
                    }
                    else
                    {
                        $updateArticle['content'][$i]['content'] = $contentItem['content'];
                    }
                }

                if(isset($contentItem['font_style'])){
                    $updateArticle['content'][$i]['font_style'] = $contentItem['font_style'];
                }
                if(isset($contentItem['content_index'])){
                    $updateArticle['content'][$i]['content_index'] = (int)$contentItem['content_index'];
                }
                if(isset($contentItem['tag'])){
                    $updateArticle['content'][$i]['tag'] = $contentItem['tag'];
                }
                if(isset($contentItem['delete'])){
                    $updateArticle['content'][$i]['delete'] = $contentItem['delete'];
                } 
                $i++;                      
            }
        }

        $articles = $this->arabianService->updateArticle($request->id, $queryParams = null, $updateArticle);
        if ($articles->status ==  true){
            return redirect()->back()->withSuccess($articles->message);
        }else{
            return redirect()->back()->withError($articles->message);
        }
    }

    /**
     * Delete article data from
     *
     * @return Response
     */
    public function delete(Request $request)
    {
        $articles = $this->arabianService->deleteArticle($request->id);
        return $articles;
    }
}
