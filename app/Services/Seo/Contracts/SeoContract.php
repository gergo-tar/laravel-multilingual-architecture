<?php

namespace App\Services\Seo\Contracts;

interface SeoContract
{

    public function generateSeo(
        string $title,
        string $description,
        array $keywords,
        string $twitter_card_title,
        string $twitter_card_description,
        string $open_graph_title,
        string $open_graph_description);

}
