<?php

# Dev Atik
use App\Models\Agent;
use App\Models\AgentInfo;
use App\Models\AgentLocation;
use App\Models\AgentNomineeInfo;
use App\Models\AgentParmanentInfo;
use App\Models\AgentPresentInfo;
use App\Models\AgentShopInfo;
use App\Models\BannerSetting;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use App\Models\Expert as ModelsExpert;
use App\Models\Order;
use App\Models\PortfolioApproval;
use App\Models\Product;
use App\Models\ComapnyApproval;
use App\Models\CompanyCategory;
use App\Models\District;
use App\Models\ExpertCategory;
use App\Models\GeneralSetting;
use App\Models\Headline;
use App\Models\NewsCategory;
use App\Models\OrderDetail;
use App\Models\OrderTimeSetting;
use App\Models\OurNews;
use App\Models\ProductCategory;
use App\Models\WebsiteSetting;
use Carbon\Carbon;

if(! function_exists('upload_file') ){
    function upload_file($destination, $file)
    {
        $file_name = str_replace(' ', '_', $file->getClientOriginalName());
        $file_rename = time() . '_' . $file_name;
        $file->move(public_path($destination), $file_rename);
        return $file_rename;
    }
}

if(! function_exists('remove_file') ){
    function remove_file($destination, $file_name)
    {
        unlink(public_path($destination) . '/' . $file_name);
        return true;
    }
}

if(! function_exists('API') ){
    function API($data = [], $status = 200){
        return response()->json([
            'data'    => $data
        ], $status);
    }
}

if(! function_exists('API_VALIDATION_ERROR') ){
    function API_VALIDATION_ERROR($errors = []){
        return response()->json([
            'errors' => $errors
        ], 422);
    }
}

if(! function_exists('website_setting') ){
    function website_setting($name)
    {
        $data = WebsiteSetting::whereName($name)->first();
        return $data ? $data->value : null;
    }
}

if(! function_exists('get_product') ){
    function get_product($product_id)
    {
        return Product::find($product_id);
    }
}

function agent_cart_count($id)
{
   return  Cart::where('agent_id', $id)->count();
}
function agent_cart_items($id)
{
   return  Cart::where('agent_id', $id)->get();
}

function user_cart_count($id)
{
   return  Cart::where('user_id', $id)->count();
}
function user_cart_items($id)
{
   return  Cart::where('user_id', $id)->get();
}

function agent_cart_product_total($id)
{
    $item = Cart::find($id);
    return $subtotal = $item->product->price * $item->quentity;
}

function cart_subtotal($id)
{
    $items = Cart::where('agent_id', $id)->get();
    $sub_total = 0;
    foreach($items as $item)
    {
        $sub_total  += $item->product->price * $item->quentity;
    }
    return $sub_total;
}

function companies()
{
    return $companies  = Company::count();
}

function agents()
{
    return $agents  = Agent::count();
}

function experts()
{
    return $experts  = ModelsExpert::count();
}

function users()
{
    return $users  = User::count();
}

function products($id)
{
    return $products  = Product::where('sub_category', $id)->count();
}

function orders($id)
{
    return $orders  = Order::where('company_id', $id)->count();
}

//expet PortfolioApproval
function expert_approval($id)
{
    return $expertApproval = PortfolioApproval::where('expert_id', $id)->first();
}

//Company Approval
function company_approval($id)
{
    return  ComapnyApproval::where('company_id', $id)->first();
}

function agent_info($id)
{
    return AgentInfo::Where('agent_id', $id)->first();
}

function parmanent_info($id)
{
    return AgentParmanentInfo::Where('agent_id', $id)->first();
}

function present_info($id)
{
    return AgentPresentInfo::Where('agent_id', $id)->first();
}

function shop_info($id)
{
    return AgentShopInfo::Where('agent_id', $id)->first();
}

function nominee_info($id)
{
    return AgentNomineeInfo::Where('agent_id', $id)->first();
}

function banner_setting()
{
    return BannerSetting::first();
}

function UserNearAgent($location)
{
    $division  = $location->division_id;
    $district  = $location->district_id;
    $upalize   = $location->upazila_id;
    $union     = $location->union_id;
    $locations = AgentLocation::where('division_id',$division)->where('district_id',$district)->where('upazila_id',$upalize)->where('union_id',$union)->exists();
    if($locations)
    {
        $locations = AgentLocation::where('division_id',$division)->where('district_id',$district)->where('upazila_id',$upalize)->where('union_id',$union)->get();
        $agent_id = [];
        foreach($locations as $location)
        {
            $agent_id[] = $location->agent_id;
        }
            return $agents = Agent::whereIn('id',$agent_id)->get();
    }else{
        // Agent Search Based on division,district,upazila
        $locations = AgentLocation::where('division_id',$division)->where('district_id',$district)->where('upazila_id',$upalize)->exists();
        if($locations)
        {
            $locations = AgentLocation::where('division_id',$division)->where('district_id',$district)->where('upazila_id',$upalize)->get();
            $agent_id = [];
            foreach($locations as $location)
            {
                $agent_id[] = $location->agent_id;
            }
             return $agents = Agent::whereIn('id',$agent_id)->get();
        }
        // else{
        //     // Agent Search Based on division,district
        //     $locations = AgentLocation::where('division_id',$division)->where('district_id',$district)->exists();
        //     if($locations)
        //     {
        //         $locations = AgentLocation::where('division_id',$division)->where('district_id',$district)->get();
        //         $agent_id = [];
        //         foreach($locations as $location)
        //         {
        //             $agent_id[] = $location->agent_id;
        //         }
        //            return $agents = Agent::whereIn('id',$agent_id)->get();
        //     }else{
        //         $locations = AgentLocation::where('division_id',$division)->exists();
        //         if($locations)
        //         {
        //             $locations = AgentLocation::where('division_id',$division)->get();
        //             $agent_id = [];
        //             foreach($locations as $location)
        //             {
        //                 $agent_id[] = $location->agent_id;
        //             }
        //                 return $agents = Agent::whereIn('id',$agent_id)->get();
        //         }
        //     }
        // }

    }
}

//product Categories
function product_categories()
{
    return ProductCategory::latest()->get();
}

//comapny  products
function company_products($slug)
{
    $company = Company::whereSlug($slug)->first();
    return $company->products;
}

//comapny total products
function company_products_count($slug)
{
    $company = Company::whereSlug($slug)->first();
    return count($company->products);
}

//Company subcategory product
function category_products($id)
{
    $subcategory = Category::whereSlug($id)->first();
    return count($subcategory->products);
}

//Category total product
function category_product($id)
{
    $category = ProductCategory::find($id);
    $sum = 0;
    foreach($category->sub_category as $sub_category)
    {
        $sum =$sum + count($sub_category->products);
    }
    return $sum;
}

//all active company product
function all_product()
{
     $products = Product::inRandomOrder()->get();
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

function new_products()
{
    $products = Product::latest()->get();
    $new_product = [];
    foreach($products as $product)
    {
       if($product->company->status == 1)
       {
            if(count($new_product) == 3){
                break;
            }else{
                $new_product[] = $product;
            }
       }
    }

    return $new_product;
}

//Popular subcategory Category
function popular_sub_category()
{
    return Category::inRandomOrder()->limit(10)->get();
}

function order_total_price($id)
{
    $details = OrderDetail::where('order_id', $id)->get();
    $total_price = 0;
    foreach($details as $detail)
    {
        $total_price += $detail->price;
    }
    return $total_price;
}

function agent_total_price($id)
{
    $details = OrderDetail::where('order_id', $id)->get();
    $total_price = 0;
    foreach($details as $detail)
    {
        $total_price += $detail->agent_price;
    }
    return $total_price;
}

function agent_order_item_total_price($item_id)
{
    $item = OrderDetail::find($item_id);
    return $item->agent_price;
}

function is_user_order($order_id)
{
   return  Order::where('id', $order_id)->first();
}

// Order user check
function order_user($id)
{
    return Order::where('id',$id)->where('user_id', '!=', null)->exists();

}

//General Setting
function general_setting()
{
    return GeneralSetting::first();
}

//Expert Categories
function expert_categories()
{
    return ExpertCategory::get();
}

//Company Categories
function company_categories()
{
    return CompanyCategory::get();
}

//Guard healper
function current_guard()
{
    foreach(array_keys(config('auth.guards')) as $guard)
    {
        if(auth()->guard($guard)->check())
        {
            return $guard;
        }
    }
}
//all comapnies
function all_companies()
{
    return Company::latest()->where('status',1)->get();
}

// Order time banner_setting
function order_time_setting()
{
    return OrderTimeSetting::first();
}

function order_time()
{
    $now   = Carbon::now();
    $start = Carbon::parse(order_time_setting()->start)->format('h:i A');
    $end   = Carbon::parse(order_time_setting()->end);

    if($now->gte($start) && $now->lte($end)){
        return true;
    }else{
        return false;
    }
}

function price_update_time()
{
    $now   = Carbon::now();
    $start = Carbon::parse(order_time_setting()->start)->format('h:i A');
    $end   = Carbon::parse(order_time_setting()->end);

    if($now->lte($start) && $now->gte($end)){
        return true;
    }else{
        return false;
    }
}

//category news count
function category_news_count($id)
{
    return OurNews::where('news_category_id', $id)->count();
}

function news_categories()
{
    return NewsCategory::latest()->get();
}

//all news
function all_news()
{
    return OurNews::get();
}
//all news
function latest_three()
{
    return OurNews::latest()->take(2)->get();
}

//headlines
function headline()
{
    return Headline::first();
}

function all_district()
{
    return District::all();
}

