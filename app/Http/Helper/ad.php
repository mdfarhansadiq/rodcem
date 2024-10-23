<?php

use App\Models\CustomerComment;
use App\Models\FirstLeftAdBanner;
use App\Models\FirstMiddleBanner;
use App\Models\FourthMiddlebanner;
use App\Models\JoinUsImage;
use App\Models\JoinWithUs;
use App\Models\SecoendMiddleAd;
use App\Models\SecondLeftAdBanner;
use App\Models\SliderBanner;
use App\Models\ThirdMiddleAd;
use Google\Service\YouTube\ImageSettings;

    //Slider Banner Ad
    function slider_banner_ad()
    {
        return SliderBanner::latest()->get();
    }

    //total slider banner count
    function total_slider_banner_ad()
    {
        return SliderBanner::count();
    }

    //Fist Middle Ad
    function first_middle_ad()
    {
        return FirstMiddleBanner::first();
    }

    //Second Middle Ad
    function second_middle_ad()
    {
        return SecoendMiddleAd::first();
    }

    //Third Middle Ad
    function third_middle_ad()
    {
        return ThirdMiddleAd::first();
    }

    //Fourth Middle Ad
    function fourth_middle_ad()
    {
        return FourthMiddlebanner::first();
    }

    //First left Ad
    function first_left_ad()
    {
        return FirstLeftAdBanner::first();
    }

    //Second left Ad
    function second_left_ad()
    {
        return SecondLeftAdBanner::first();
    }

    //Customer Comment
    function customer_comment()
    {
        return CustomerComment::first();
    }

    function home_page_image()
    {
        return JoinUsImage::first();
    }


?>
