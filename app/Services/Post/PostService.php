<?php

namespace App\Services\Post;

use App;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Services\Post\Contracts\PostContract;

class PostService implements PostContract
{
    /**
     * Get all Post instance
     *
     * @param  bool|false  $isWithTranslation
     * @return Post Collection
     */
    public function getPosts(bool $isWithTranslation = false)
    {
        $posts = Post::select(
            'id',
            'post_thumbnail');

        // eager load Translations relations
        if($isWithTranslation) {
            $posts->with('translations');
        }

        return $posts->get();
    }

    /**
     * Get PostTranslation by 'id'
     *
     * @param  int         $id
     * @return PostTranslation
     */
    public function getPostTranslation(int $id)
    {
        // find PostTranslation by 'id'
        $translation = PostTranslation::select(
            'id',
            'post_id',
            'locale',
            'title',
            'content')
            ->where('id', $id)
            ->firstOrFail();

        return $translation;
    }

    /**
     * Get PostTranslation by 'slug'
     * If the 'isTranslationOnly' argument is set to true only return back with Translation instance
     *
     * @param  string      $slug
     * @param  string|null $locale
     * @param  bool|false  $isTranslationOnly
     * @return array(Post,PostTranslation)|PostTranslation
     */
    public function getPostTranslationBySlug(string $slug, string $locale = null, bool $isTranslationOnly = false)
    {
        // use current locale if it's not set
        $locale = $locale ? $locale : App::getLocale();
        // find Post by 'slug'
        $post = Post::select(
            'id',
            'post_thumbnail')
            ->whereTranslation('slug', $slug)
            ->firstOrFail();

        // get Post translation by 'locale'
        $translation = $post->getTranslation($locale, true);

        return $isTranslationOnly ? $translation : [
            'post'        => $post,
            'translation' => $translation,
        ];
    }

    /**
     * Update a PostTranslation by 'id'
     *
     * @param  int         $id
     * @param  string      $title
     * @param  string      $content
     * @param  string      $seo_title
     * @param  string      $seo_description
     * @param  string|null $keywords
     * @param  string|null $twitter_card_title
     * @param  string|null $twitter_card_description
     * @param  string|null $open_graph_title
     * @param  string|null $open_graph_description
     * @param  string|null $locale
     */
    public function updatePostTranslation(
        int $id,
        string $title,
        string $content,
        string $seo_title,
        string $seo_description,
        string $keywords = null,
        string $twitter_card_title = null,
        string $twitter_card_description = null,
        string $open_graph_title = null,
        string $open_graph_description = null,
        string $locale = null) {
        // use current locale if it's not set
        $locale = $locale ? $locale : App::getLocale();
        // find Post by 'id'
        $post = Post::select('id')->where('id', $id)->firstOrFail();
        // load translation by 'locale'
        $translation = $post->getTranslation($locale);

        if ($translation) {
            // update PostTranslation
            $translation->update([
                'title'   => $title,
                'content' => $content,
            ]);
            // update PostTranslation's SEO data
            $translation->seoData->update(['meta' =>
                [
                    'title'        => $seo_title,
                    'description'  => $seo_description,
                    'keywords'     => $keywords ? explode(', ', $keywords) : null,
                    'twitter_card' => [
                        'title'       => $twitter_card_title ? $twitter_card_title : $seo_title,
                        'description' => $twitter_card_description ? $twitter_card_description : $seo_description,
                    ],
                    'open_graph'   => [
                        'title'       => $open_graph_title ? $open_graph_title : $seo_title,
                        'description' => $open_graph_description ? $open_graph_description : $seo_description,
                    ],
                ],
            ]);
        }
    }
}
