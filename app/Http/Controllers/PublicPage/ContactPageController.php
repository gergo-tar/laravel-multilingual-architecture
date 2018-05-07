<?php

namespace App\Http\Controllers\PublicPage;

use App\Http\Controllers\Controller;
use App\Services\Seo\Contracts\SeoContract;

class ContactPageController extends Controller
{

    /**
     * Constructor
     *
     * @param SeoContract $seoService
     */
    public function __construct(SeoContract $seoService)
    {
        $this->seoService = $seoService;
    }

    /**
     * Show the 'Contact' page
     *
     * @return Response
     */
    public function index()
    {
        // set SEO meta
        $this->seoService->generateSeo(
            __('seo.contact.title'),
            __('seo.contact.description'),
            __('seo.contact.keywords'),
            __('seo.contact.title'),
            __('seo.contact.description'),
            __('seo.contact.title'),
            __('seo.contact.description')
        );

        return view('public.contact.index');
    }
}
