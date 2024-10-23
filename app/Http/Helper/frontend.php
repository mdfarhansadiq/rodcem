<?php

    //register and login show

use App\Models\AboutUs;
use App\Models\Agent;
use App\Models\AgentClient;
use App\Models\AgentSubscription;
use App\Models\AgentSubscriptionSetting;
use App\Models\BusinessInfo;
use App\Models\Company;
use App\Models\Expert;
use App\Models\Headline;
use App\Models\JoinWithUs;
use App\Models\Order;
use App\Models\OurNews;
use App\Models\Policy;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Video;
use App\Models\WhySell;

    // all authentication check
    function is_auth()
    {
      if(auth()->check() || auth('agent')->check() || auth('expert')->check() || auth('company')->check() || auth('super')->check())
      {
        return 'auth';
      }else{
        return 'guest';
      }
    }

    //count total product in category
    function total_category_product($id)
    {
        return Product::where('category', $id)->count();
    }

    // price view action
    function view_action()
    {
        if(auth('agent')->check() && auth('agent')->user()->status == 1  || auth('company')->check() && auth('company')->user()->status == 1 || auth('super')->check())
        {
            return 'view_right';
        }
        elseif(auth()->check() || auth('expert')->check() && auth('expert')->user()->status == 1)
        {
            return 'not_view_right';
        }
        else
        {
            return 'guest';
        }
    }

    // cart view action
    function cart_action()
    {
        if(auth('company')->check() && auth('company')->user()->status == 1 || auth('super')->check()|| auth('expert')->check() && auth('expert')->user()->status == 1)
        {
            return 'not_cart_right';
        }
        elseif(auth('agent')->check() && auth('agent')->user()->status == 1  || auth()->check())
        {
            return 'cart_right';
        }
        else
        {
            return 'guest';
        }
    }

    // popular products
    function popular_products()
    {
        $products = Product::inRandomOrder()->take(6)->get();
        $active_product = [];
        foreach($products as $product)
        {
            if($product->company->status == 1)
            {
                $active_product[] = $product;
            }
        }

        return $active_product;
    }

    //best seller product
    function best_seller_products()
    {
        $products = Product::inRandomOrder()->take(12)->get();
        $active_product = [];
        foreach($products as $product)
        {
            if($product->company->status == 1)
            {
                $active_product[] = $product;
            }
        }

        return $active_product;
    }

    // Trending product
    function trending_products()
    {
        $products = Product::inRandomOrder()->take(4)->get();
        $active_product = [];
        foreach($products as $product)
        {
            if($product->company->status == 1)
            {
                $active_product[] = $product;
            }
        }

        return $active_product;
    }

    // Releted Products
    function releted_products($id)
    {
        $products = Product::inRandomOrder()->where('id',"!=", $id)->take(6)->get();
        $active_product = [];
        foreach ($products as $product) {
            if ($product->company->status == 1) {
                $active_product[] = $product;
            }
        }

        return $active_product;
    }

    // random 10 experts
    function expert()
    {
        return Expert::inrandomOrder()->whereStatus(1)->get();
    }

    //Footer category
    function footer_category()
    {
        return ProductCategory::latest()->take(6)->get();
    }

    //join with us
    function joinWithUs()
    {
        return JoinWithUs::first();
    }

    //order Client
    function order_client($id)
    {
        return AgentClient::where('order_id', $id)->first();
    }

    // why sell on rodcem
    function why_sell()
    {
        return WhySell::first();
    }

    // why business info
    function business_info()
    {
        return BusinessInfo::first();
    }

    // about
    function about_us()
    {
        return AboutUs::first();
    }

    // latest blog
    function latest_tow_blog()
    {
        return OurNews::latest()->take(2)->get();
    }

    function videos(){
        return Video::latest()->get();
    }

    function agent_subscription()
    {
        return AgentSubscriptionSetting::get();
    }

    //policy
    function policys()
    {
        return Policy::first();
    }

?>
