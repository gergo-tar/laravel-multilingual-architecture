<?php

namespace App\Services\Post\Contracts;

interface PostContract
{

    public function getPosts();

    public function getPostTranslation(int $id);

    public function getPostTranslationBySlug(string $slug, string $locale, bool $isTranslationOnly);

    public function updatePostTranslation(
        int $id,
        string $title,
        string $content,
        string $seo_title,
        string $seo_description,
        string $keywords,
        string $twitter_card_title,
        string $twitter_card_description,
        string $open_graph_title,
        string $open_graph_description,
        string $locale);

}
