<?php

namespace App\Http\Controllers\PublicPage;

use App\Http\Controllers\Controller;
use App\Services\Seo\Contracts\SeoContract;

class LandingPageController extends Controller
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
     * Show the 'Landing' page
     *
     * @return Response
     */
    public function index()
    {
        // set SEO meta
        $this->seoService->generateSeo(
            __('seo.landing.title'),
            __('seo.landing.description'),
            __('seo.landing.keywords'),
            __('seo.landing.title'),
            __('seo.landing.description'),
            __('seo.landing.title'),
            __('seo.landing.description')
        );

        return view('public.landing');
    }
}
