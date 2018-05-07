<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Services\Post\Contracts\PostContract;

class PostAdminPageController extends Controller
{

    /**
     * Constructor
     *
     * @param PostContract $postService
     */
    public function __construct(PostContract $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Show Post list
     *
     * @return Response
     */
    public function index()
    {
        // get all Post instance
        $posts = $this->postService->getPosts(true);

        return view('admin.posts.index', [
            'posts'  => $posts,
            'locale' => App::getLocale(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // call Post Service to get the PostTranslation by 'id'
        $translation = $this->postService->getPostTranslation($id);

        // get SEO data of the selected translation
        $seo_data = $translation && $translation->seoData ? $translation->seoData->meta : null;

        return view('admin.posts.edit', [
            'translation' => $translation,
            'postId'      => isset($translation) ? $translation->post_id : null,
            'locale'      => isset($translation) ? $translation->locale : App::getLocale(),
            'seoData'     => $seo_data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(StorePost $request, $id)
    {
        // call Post Service to update the PostTranslation
        $this->postService->updatePostTranslation(
            $id,
            $request->title,
            $request->content,
            $request->seo_title,
            $request->seo_description,
            $request->keywords,
            $request->twitter_card_title,
            $request->twitter_card_description,
            $request->open_graph_title,
            $request->open_graph_description,
            $request->locale);

        return redirect()->route('admin.posts.edit', [$id]);
    }
}
