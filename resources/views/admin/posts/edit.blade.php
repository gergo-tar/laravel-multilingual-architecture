@extends('layouts.app-admin')

@section('content')
<div class="container">
	{{ bs()->openForm('put', route('admin.posts.update', [$postId])) }}
        {{-- Post title --}}
        {{ bs()->formGroup(bs()
            ->text('title', isset($translation->title) ? $translation->title : null))
            ->label(__('admin.post.edit.title'))
            ->helpText(__('admin.post.edit.title_help'))
        }}

        {{-- Post content --}}
        {{ bs()->formGroup(bs()
            ->textarea('content', isset($translation->content) ? $translation->content : null))
            ->label(__('admin.post.edit.description'))
            ->helpText(__('admin.post.edit.description_help'))
        }}

        {{-- Post SEO title --}}
		{{ bs()->formGroup(bs()
			->text('seo_title', isset($seoData) ? $seoData['title'] : null))
            ->label(__('admin.post.edit.seo_title'))
            ->helpText(__('admin.post.edit.seo_title_help'))
        }}

        {{-- Post SEO description --}}
        {{ bs()->formGroup(bs()
        	->textarea('seo_description', isset($seoData) ? $seoData['description'] : null))
            ->label(__('admin.post.edit.seo_description'))
            ->helpText(__('admin.post.edit.seo_description_help'))
        }}

        {{-- Post SEO keywords --}}
        {{ bs()->formGroup(bs()
			->text('keywords', isset($seoData) ? implode(", ", $seoData['keywords']) : null))
            ->label(__('admin.post.edit.seo_keywords'))
            ->helpText(__('admin.post.edit.seo_keywords_help'))
        }}

        {{-- Post SEO opengraph title --}}
        {{ bs()->formGroup(bs()
			->text('open_graph_title', isset($seoData) ? $seoData['open_graph']['title'] : null))
            ->label(__('admin.post.edit.seo_open_graph_title'))
            ->helpText(__('admin.post.edit.seo_open_graph_title_help'))
        }}

        {{-- Post SEO opengraph description --}}
        {{ bs()->formGroup(bs()
			->text('open_graph_description', isset($seoData) ? $seoData['open_graph']['description'] : null))
            ->label(__('admin.post.edit.seo_open_graph_description'))
            ->helpText(__('admin.post.edit.seo_open_graph_description_help'))
        }}

        {{-- Post SEO twitter card title --}}
        {{ bs()->formGroup(bs()
			->text('twitter_card_title', isset($seoData) ? $seoData['twitter_card']['title'] : null))
            ->label(__('admin.post.edit.seo_twitter_card_title'))
            ->helpText(__('admin.post.edit.seo_twitter_card_title_help'))
        }}

        {{-- Post SEO twitter card description --}}
        {{ bs()->formGroup(bs()
			->text('twitter_card_description', isset($seoData) ? $seoData['twitter_card']['description'] : null))
            ->label(__('admin.post.edit.seo_twitter_card_description'))
            ->helpText(__('admin.post.edit.seo_twitter_card_description_help'))
        }}

        {{-- Post locale --}}
        <input type="hidden" value="{{$locale}}">

        {{-- Submit button --}}
        {{ bs()->submit(__('admin.post.edit.submit_button')) }}

	{{ bs()->closeForm() }}
</div>
@endsection