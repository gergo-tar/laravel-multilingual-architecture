<?php

use App\Models\Post;
use App\Models\PostTranslation;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create Post with PostFactory
        $posts = factory(Post::class, 10)->create();

        // default translations
        $translation_hu = 'hu';
        $translation_en = 'en';

        // Faker to generate random data
        $faker = Faker\Factory::create();

        foreach ($posts as $key => $post) {
            // Translation: hu
            $this->updateTranslationSeoMeta($post->getTranslation($translation_hu), $post->post_thumbnail, $faker);

            // Translation: en
            $this->updateTranslationSeoMeta($post->getTranslation($translation_en), $post->post_thumbnail, $faker);
        }
    }

    /**
     * Update SEO data of a PostTranslation instance
     *
     * @param  PostTranslation $translation
     * @param  string $thumbnail
     * @param  Faker  $faker
     */
    public function updateTranslationSeoMeta($translation, $thumbnail, $faker)
    {
      $seo_title       = $faker->sentence(3, true);
      $seo_description = $faker->text(120);
      $keywords        = $faker->words(3, false);

      $this->updateSeoData($translation, $seo_title, $seo_description, $keywords, $thumbnail);
    }

    /**
     * Update SEO data
     *
     * @param  PostTranslation $translation
     * @param  string $title
     * @param  string $seo_description
     * @param  array  $keywords
     * @param  string $image
     */
    public function updateSeoData($translation, $seo_title, $seo_description, $keywords, $image)
    {
        // update seo data
        $translation->seoData->update(['meta' =>
            [
                'title'        => $seo_title,
                'description'  => $seo_description,
                'keywords'     => $keywords,
                'twitter_card' => [
                    'title'       => $seo_title,
                    'description' => $seo_description,
                    'images'      => url('/uploads/posts/' . $image),
                ],
                'open_graph'   => [
                    'title'       => $seo_title,
                    'description' => $seo_description,
                    'images'      => url('/uploads/posts/' . $image),
                ],
            ],
        ]);
    }
}
