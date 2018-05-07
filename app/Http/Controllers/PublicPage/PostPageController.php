<?php

namespace App\Http\Controllers\PublicPage;

use App;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\Post\Contracts\PostContract;
use App\Services\Seo\Contracts\SeoContract;

class PostPageController extends Controller
{

    /**
     * Constructor
     *
     * @param PostContract $postService
     * @param SeoContract    $seoService
     */
    public function __construct(PostContract $postService, SeoContract $seoService)
    {
        $this->postService = $postService;
        $this->seoService  = $seoService;
    }

    /**
     * Show the 'Posts' page
     *
     * @return Response
     */
    public function index()
    {
        // set SEO meta
        $this->seoService->generateSeo(
            __('seo.posts.title'),
            __('seo.posts.description'),
            __('seo.posts.keywords'),
            __('seo.posts.title'),
            __('seo.posts.description'),
            __('seo.posts.title'),
            __('seo.posts.description')
        );

        // get all Post instance
        $posts = $this->postService->getPosts();

        return view('public.posts.index', [
            'posts'  => $posts,
            'locale' => App::getLocale(),
        ]);
    }

    /**
     * Show one post
     *
     * @param  string  $slug
     * @return Response
     */
    public function show($slug)
    {
        // call Post Service to get the PostTranslation by 'slug'
        $post        = $this->postService->getPostTranslationBySlug($slug, App::getLocale());
        $translation = $post['translation'];

        if($translation->SeoData->meta){
            $translation->seoable();
        }

        return view('public.posts.show', [
            'image'       => $post['post']->post_thumbnail,
            'translation' => $translation,
        ]);
    }
}
