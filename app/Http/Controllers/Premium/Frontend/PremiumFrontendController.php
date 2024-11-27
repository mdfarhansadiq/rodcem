<?php

namespace App\Http\Controllers\Premium\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Expert;
use App\Models\ExpertCategory;
use App\Models\OurNews;
use App\Models\Privacy;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SliderBanner;
use App\Models\TermsCondation;
use Illuminate\Http\Request;


class PremiumFrontendController extends Controller
{
    //home
    public function front()
    {
        $products     = Product::latest()->get();
        $six_products = Product::latest()->take(8)->get();

        $bestseller = Product::inRandomOrder()->take(12)->get();
        $best_seller_product = [];
        foreach ($bestseller as $product) {
            if ($product->company->status == 1) {
                $best_seller_product[] = $product;
            }
        }
        // return home_page_image();
        return view('Premium.frontend.home', compact('products', 'six_products', 'best_seller_product'));
    }



    public function search(Request $request)
    {
        $query = $request->input('search');

        // Perform a search on the 'product' table (or your relevant model)
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        $expertcategories = ExpertCategory::where('name', 'LIKE', "%{$query}%")->get();
        $productcategories = ProductCategory::where('name', 'LIKE', "%{$query}%")->get();

        $allResults = [
            'products' => $products,
            'expertcategories' => $expertcategories,
            'productcategories' => $productcategories,
        ];
        // Return JSON response
        return response()->json($allResults);
    }

    public function expert_by_category($slug)
    {
        $expertcategory = ExpertCategory::where('slug', '=', $slug)->first();
        $id = $expertcategory->id;
        $category_name = $expertcategory->name;
        $experts = Expert::where('designation', '=', $id)->get();
        return view('Premium.frontend.expert.expertByCategory', compact('experts', 'category_name'));
    }


    public function search_expert_name_specific_category(Request $request)
    {
        $query = $request->input('search');
        $experts = Expert::where('name', 'LIKE', "%{$query}%")->get();

        // Return JSON response
        return response()->json($experts);
    }


    public function search_expert_name_all_category(Request $request)
    {
        $query = $request->input('search');
        $experts = Expert::with('expert_designation')->where('name', 'LIKE', "%{$query}%")->get();

        // Return JSON response
        return response()->json($experts);
    }


    public function search_product_category(Request $request)
    {
        $query = $request->input('query');

        // First, look for exact matches
        $exactMatches = ProductCategory::where('name', $query)->get();

        if ($exactMatches->isNotEmpty()) {
            // If exact matches are found, return only them
            return response()->json($exactMatches);
        }

        // If no exact matches, look for partial matches
        $partialMatches = ProductCategory::where('name', 'LIKE', "%{$query}%")->get();

        // Return JSON response with partial matches
        return response()->json($partialMatches);
    }


    // public function search_product_category(Request $request)
    // {
    //     $query = $request->input('query');

    //     // First, look for exact matches
    //     $exactMatches = ProductCategory::where('name', $query)->get();

    //     if ($exactMatches->isNotEmpty()) {
    //         return response()->json($exactMatches);
    //     }

    //     // If no exact matches, look for partial matches
    //     $partialMatches = ProductCategory::where('name', 'LIKE', "%{$query}%")->get();

    //     return response()->json($partialMatches);
    // }


    //shop
    public function shop()
    {
        $products = Product::inRandomOrder()->paginate(10);
        return view('Premium.frontend.shop.shop', compact('products'));
    }

    //Product Details
    public function product_details($slug)
    {
        return view('Premium.frontend.shop.productDetails', ['item' => Product::where('slug', $slug)->first()]);
    }

    //companies
    public function companies()
    {
        $companis = Company::where('status', 1)->latest()->get();
        return view('Premium.frontend.company.companies', compact('companis'));
    }

    //companies
    public function company_shop($slug)
    {
        return view('Premium.frontend.company.company_shop', ['company' => Company::where('slug', $slug)->first()]);
    }

    //Agent Regisration
    public function agent_register()
    {
        return view('Premium.frontend.registration.agent_register');
    }

    //Expert Regisration
    public function expert_register()
    {
        return view('Premium.frontend.registration.expert_register');
    }

    //Expert Regisration
    public function company_register()
    {
        return view('Premium.frontend.registration.company_register');
    }

    //About us
    public function about_us()
    {
        return view('Premium.frontend.pages.aboutUs');
    }

    // contact us
    public function contact_us()
    {
        return view('Premium.frontend.pages.contactUs');
    }

    // Faq
    public function faq()
    {
        return view('Premium.frontend.pages.faq');
    }

    // Our Blog
    public function our_blog()
    {
        return view('Premium.frontend.blog.blogs', ['blogs' => OurNews::latest()->get()]);
    }

    //Blog Details
    public function blog_details($slug)
    {
        return view(
            'Premium.frontend.blog.blogDetails',
            [
                'blog'  => OurNews::where('slug', $slug)->first(),
                'blogs' => OurNews::where('slug', '!=',  $slug)->take(4)->get(),
            ]
        );
    }

    // Experts
    public function experts()
    {
        return view('Premium.frontend.expert.experts');
    }

    // Experts details
    public function expert_details($slug)
    {
        return view('Premium.frontend.expert.expertDetails', ['expert' => Expert::where('slug', $slug)->first()]);
    }

    // policy
    public function policy()
    {
        return view('Premium.frontend.policy', ['policy' => Privacy::first()]);
    }

    // terms condation
    public function terms_condation()
    {
        return view('Premium.frontend.termsCondation', ['terms_condation' => TermsCondation::first()]);
    }

    // Cancellation Policy
    public function cancellation_policy()
    {
        return view('Premium.frontend.cancellationPolicy');
    }

    // Refund Policy
    public function refund_policy()
    {
        return view('Premium.frontend.refundPolicy');
    }

    // Return Policy
    public function return_policy()
    {
        return view('Premium.frontend.returnPolicy');
    }
}
