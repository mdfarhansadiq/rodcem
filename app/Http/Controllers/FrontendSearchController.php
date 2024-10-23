<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Company;
use App\Models\Expert;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendSearchController extends Controller
{
    public function search_items(Request $request)
    {
        // products
        $products = Product::get();
        $active_product = [];
        foreach ($products as $product) {
            if ($product->company->status == 1) {
                $active_product[] = $product->name;
            }
        }

        // Agens
        $agents = Agent::where('status', 1)->get();
        $agent = [];
        foreach ($agents as $item) {
            $agent[] = $item->name;
        }

        // Experts
        $experts = Expert::where('status', 1)->get();
        $expert = [];
        foreach ($experts as $item) {
            $expert[] = $item->name;
        }

        // Companies
        $companies = Company::where('status', 1)->get();
        $company = [];
        foreach ($companies as $item) {
            $company[] = $item->name;
        }
        return  array_merge($active_product, $agent, $company, $expert);
    }

    //search
    public function search(Request $request)
    {
        $service = $request->service;
        if($service)
        {
            if($service == 'agent')
            {
                return redirect()->route('agents');
            }else{
                if($service == 'company')
                {
                    return redirect()->route('company');
                }else{ 
                    if($service == 'expert')
                    {
                        return redirect()->route('experts');
                    }else{
                        if($service == 'shop')
                        {
                            return redirect()->route('ecommerce.index');
                        }
                    }                   
                }
            }       
        }else{
            $search = $request->search;
            $agent = Agent::whereName( $search)->first();
    
            if($agent)
            {
                return redirect()->route('agent.details',$agent->slug);
            }else{
                $expert = Expert::whereName($search)->first();
                if ($expert) {
                    return redirect()->route('expert.portfolio', $expert->slug);
                }else{
                    $company = Company::whereName($search)->first();
                    if ($company) {
                        return redirect()->route('product', $company->slug);
                    }else{
                        $product = Product::whereName($search)->first();
                        if($product){
                            $status = $product->company->status;
                            if ($status == 1) {
                                return redirect()->route('product.details', $product->slug);
                            }else{
                                return back()->with('error', 'No Data Found!');
                            }
                        }else{
                            return back()->with('error', 'No Data Found!');
                        }
                    }
                }
    
            }
        }

    }

    //product items
    public function product_search(Request $request)
    {
        // products
        $products = Product::where('name', 'like', '%'.$request->search.'%')->latest()->get();
        $active_product = [];
        foreach ($products as $product) {
            if ($product->company->status == 1) {
                $active_product[] = $product;
            }
        }

        if($active_product)
        {
            return view('Pages.frontend.ecommerce.ecommerce', compact('active_product'));
        }else{
            return back()->with('error', "No Data Found!");
        }
    }

    //Company Search
    public function company_search(Request $request)
    {
         $companies = Company::where('name', 'like', '%'.$request->search.'%')->where('status', 1)->get();
         if(count($companies) != 0)
         {
             return view('Pages.frontend.page.company', compact('companies'));
         }else{
            return back()->with('error', 'No Company Found!');
         }
    }
}
