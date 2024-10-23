<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function index()
    {
        visitorLog('shop'); 
        $products = Product::inRandomOrder()->get();
        $active_product = [];
        foreach ($products as $product) {
            if ($product->company->status == 1) {
                $active_product[] = $product;
            }
        }
        return view('Pages.frontend.ecommerce.ecommerce', compact('active_product'));
    }

    public function details()
    {
        return view('Pages.frontend.ecommerce.details');
    }
    
    public function category_product($slug)
    {
        
        $category = ProductCategory::where('slug', $slug)->first(); 
        $products = [];
        foreach($category->sub_category as $sub_category)
        {
            foreach($sub_category->products as $product)
            {
                $products[] = $product;
            }
        }      
        return view('Pages.frontend.ecommerce.categoryProduct', compact('products', 'category'));
    }
}
