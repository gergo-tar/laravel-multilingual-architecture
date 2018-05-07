<?php

namespace App\Services\Seo;

use App\Services\Seo\Contracts\SeoContract;
use SEO;
use SEOMeta;

class SeoService implements SeoContract
{

    /**
     * Generate SEO meta data for a single page
     *
     * @param  string $title
     * @param  string $description
     * @param  array  $keywords
     * @param  string $twitter_card_title
     * @param  string $twitter_card_description
     * @param  string $open_graph_title
     * @param  string $open_graph_description
     */
    public function generateSeo(
        string $title,
        string $description,
        array $keywords,
        string $twitter_card_title,
        string $twitter_card_description,
        string $open_graph_title,
        string $open_graph_description) {
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::setKeywords($keywords);
        SEO::opengraph()
            ->setTitle($twitter_card_title)
            ->setDescription($twitter_card_description);
        SEO::twitter()
            ->setTitle($open_graph_title)
            ->setDescription($open_graph_description);
    }

}
