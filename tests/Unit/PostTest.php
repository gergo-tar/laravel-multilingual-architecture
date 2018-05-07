<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
	use RefreshDatabase;

    /**
     * Test to Update PostTranslation
     *
     * @return void
     */
    public function testUpdatePostTranslation()
    {
    	// create User to test the Authenticated route
    	$user = factory(User::class)->create();

    	// create Post with PostFactory
    	$post = factory(Post::class)->create();

    	// locale to use
    	$locale = 'hu';

		// call Post Service to update the PostTranslation
		$data = [
			'title'   => 'Lorem ipsum dolor sit amet',
			'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
			'seo_title' 	  => 'SEO - Lorem ipsum dolor sit amet',
			'seo_description' => 'SEO - Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
			'locale'  => $locale
		];

		// test route: admin.posts.update
        $response = $this
        	->actingAs($user)
        	->json(
	        	'PUT',
	        	route('admin.posts.update', ['id' => $post->id]),
	        	$data
	        );
        // test response status
	    $response->assertStatus(302);

	    // retrive the modified Post model
	    $post_modified = Post::select('id')
	    	->where('id', $post->id)
	    	->first()
	    	->getTranslation($locale, true);

	    // test if Post's title has been updated
     	$this->assertNotEquals($post->title, $post_modified->title);
     	// test if Post's content has been updated
     	$this->assertNotEquals($post->content, $post_modified->content);
     	// test if Post's SEO data has been updated
     	$this->assertNotNull($post_modified->seoData->meta);
    }
}
