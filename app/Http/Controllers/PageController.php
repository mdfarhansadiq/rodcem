<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Agent;
use App\Models\AgentService;
use App\Models\Benefit;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Company;
use App\Models\District;
use App\Models\Division;
use App\Models\Expert;
use App\Models\Order;
use App\Models\CompanyBanner;
use App\Models\CompanyCategory;
use App\Models\ExpertCategory;
use App\Models\JoinUsImage;
use App\Models\OrderDetail;
use App\Models\OrderLocation;
use App\Models\OurNews;
use App\Models\Privacy;
use App\Models\Product;
use App\Models\ServiceImage;
use App\Models\TermsCondation;
use App\Models\Union;
use App\Models\Upazila;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function front()
    {
        visitorLog('home');
        $companies = DB::table('companies') ->select('logo') ->get();
        $sliders = DB::table('sliders')->get();
        $experts = Expert::where('status', 1)->latest()->get();
        $service_image = ServiceImage::first();
        $join_us_image = JoinUsImage::first();
        $news = OurNews::latest()->take(3)->get();
        return view('Pages.frontend.page.home', compact('companies', 'experts', 'sliders', 'service_image', 'join_us_image', 'news'));
    }


    public function category()
    {
        $categories = Category::all();
        return view('Pages.category', compact('categories'));
    }


        public function service()
    {
        return view('Pages.service');
    }


    public function expert_list()
    {
        $experts    = Expert::where('status', 1)->latest()->get();
        $divissions = Division::orderBy('name', 'asc')->get();
        $districts  = District::orderBy('name', 'asc')->get();
        $upazilas   = Upazila::orderBy('name', 'asc')->get();
        $unions     = Union::orderBy('name', 'asc')->get();
        return view('Pages.frontend.page.expert', compact('experts','divissions', 'districts', 'upazilas', 'unions'));
    }

    public function agents()
    {
        $agents     = Agent::latest()->where('status', 1)->get();
        $divissions = Division::orderBy('name', 'asc')->get();
        $districts  = District::orderBy('name', 'asc')->get();
        $upazilas   = Upazila::orderBy('name', 'asc')->get();
        $unions     = Union::orderBy('name', 'asc')->get();
        return view('Pages.frontend.page.agents', compact('agents','divissions', 'districts', 'upazilas', 'unions'));
    }

    public function agent_details($slug)
    {
        $agent         = Agent::where('slug', $slug)->where('status', 1)->first();
        $services      = AgentService::latest()->get();
        $pending_agent = Agent::where('slug', $slug)->where('status', 0)->first();
        if($agent)
        {
            return view('Pages.agentPortfolio', compact('agent', 'services'));
        }else if(auth('super')->check() || auth('agent')->check() && auth('agent')->user()->status == 0){
            $agent = Agent::where('slug', $slug)->where('status', 0)->first();
            return view('Pages.agentPortfolio', compact('agent', 'services'));
        }else{
            return back();
        }
    }

    public function about()
    {
        $data     = AboutUs::all();
        $aboutus  = AboutUs::first();
        $benefits = Benefit::latest()->get();
        return view('Pages.frontend.page.aboutus', compact('data','aboutus','benefits'));
    }

        public function contact()
    {
        return view('Pages.frontend.page.contact');
    }
    public function company()
    {
        $companies = DB::table('companies')->where('status', 1)->get();
        // return view('Pages.company', compact('companies'));
        return view('Pages.frontend.page.company', compact('companies'));
    }
    // public function product(Company $company)
    public function product($comapny_name)
    {
        $company         = Company::where('slug', $comapny_name)->where('status', 1)->first();
        $pending_company = Company::where('slug', $comapny_name)->where('status', 0)->first();

        if($company || auth('super')->check() || auth('company')->check() && auth('company')->user()->id == $pending_company->id)
        {
            $company = Company::where('slug', $comapny_name)->first();
            $banner  = CompanyBanner::where('company_id', $company->id)->first();
            return view('Pages.frontend.page.companyShop', compact('company','banner'));
        }else{
            return back();
        }
    }

    public function product_details($slug)
    {
        return view('Pages.frontend.page.product_details', ['product' => Product::whereSlug($slug)->first()]);
    }

    public function category_product($slug)
    {
         $category = Category::where('slug', $slug)->first();
         $company  = Company::find($category->company_id);
        return view('Pages.frontend.page.companyCategoryShop',['products' => $category->products,'company' => $company]);
    }

    //Company By Category
    public function categoryByCompany($slug)
    {
        $companyCategory =  CompanyCategory::where('slug',$slug)->first();
        $companies = Company::where('category', $companyCategory->id)->where('status', 1)->latest()->get();
        if(count($companies) != 0)
        {
            return view('Pages.frontend.page.company', compact('companies'));
        }else{
            return back()->with('error', 'No Company Found!');
        }

    }

    //Company By Category
    public function categoryByexpert($slug)
    {
        $expertCategory =  ExpertCategory::where('slug',$slug)->first();
        $experts        =  Expert::where('designation', $expertCategory->id)->where('status', 1)->latest()->get();
        if(count($experts) != 0)
        {
            return view('Pages.frontend.page.expert', compact('experts'));
        }else{
            return back()->with('error', 'No Expert Found!');
        }

    }

    public function profile()
    {
        return view('Pages.profile');
    }

    public function addToCart($product_id)
    {

        if(Auth()->user())
        {
            if(!Cart::where('user_id', Auth::id())->where('product_id', $product_id)->exists())
            {
                $product = Product::find($product_id);
                $cart = new Cart();
                $cart->user_id    = Auth::id();
                $cart->product_id = $product_id;
                $cart->comapny_id = $product->company->id;
                $cart->save();
                return redirect()->back()->with('success', 'Product added on cart successfully.');
            }else{
                return redirect()->back()->with('warning', 'Product Already In Cart.');
            }
        }else{
            if(!Cart::where('agent_id', Auth::guard('agent')->user()->id)->where('product_id', $product_id)->exists())
            {
                $product = Product::find($product_id);
                $cart = new Cart();
                $cart->agent_id   = Auth::guard('agent')->user()->id;
                $cart->product_id = $product_id;
                $cart->comapny_id = $product->company->id;
                $cart->save();
                return redirect()->back()->with('success', 'Product added on cart successfully.');
            }else{
                return redirect()->back()->with('warning', 'Product Already In Cart.');
            }
        }
    }

    public function addToCart_details(Request $request)
    {

        if(Auth()->user())
        {
            if(!Cart::where('user_id', Auth::id())->where('product_id', $request->product_id)->exists())
            {
                $product = Product::find($request->product_id);
                $cart = new Cart();
                $cart->user_id   = Auth::id();
                $cart->product_id = $request->product_id;
                $cart->comapny_id = $product->company->id;
                $cart->quentity   = $request->quentity;
                $cart->save();
                return redirect()->back()->with('success', 'Product added on cart successfully.');
            }else{
                return redirect()->back()->with('warning', 'Product Already In Cart.');
            }
        }else{
            if(!Cart::where('agent_id', Auth::guard('agent')->user()->id)->where('product_id', $request->product_id)->exists())
            {
                $product = Product::find($request->product_id);
                $cart = new Cart();
                $cart->agent_id   = Auth::guard('agent')->user()->id;
                $cart->product_id = $request->product_id;
                $cart->comapny_id = $product->company->id;
                $cart->quentity   = $request->quentity;
                $cart->save();
                return redirect()->back()->with('success', 'Product added on cart successfully.');
            }else{
                return redirect()->back()->with('warning', 'Product Already In Cart.');
            }
        }
    }



    public function view_cart()
    {

        if(Auth::check())
        {
            // return view('Pages.cart', compact('products', 'location','user'));
            if(!user_location(auth()->id()))
            {
                return redirect()->route('user.location')->with('warning', 'Please Set Your Location');
            }
            return view('Premium.frontend.cart.userCart');
        }else{
            return view('Premium.frontend.cart.cart');
        }
    }

    public function remove_cart_iteam($cart_id)
    {
        Cart::find($cart_id)->delete();
        return redirect()->back()->with('success', 'Product Remove form cart successfully.');
    }

    public function update_cart($id, Request $request)
    {
        // return $request->items;
        foreach($request->items as $item)
        {
            // return  Cart::find($item);
            Cart::find($item)->update([
                'quentity' => $request->quentity[$item][0],
            ]);
        }
        return back()->with('success', 'Cart Update Successfull!');
    }

    public function shop_now($product_id)
    {

        if(Auth()->user())
        {
            if(!Cart::where('user_id', Auth::id())->where('product_id', $product_id)->exists())
            {
                $product = Product::find($product_id);
                $cart = new Cart();
                $cart->user_id   = Auth::id();
                $cart->product_id = $product_id;
                $cart->comapny_id = $product->company->id;
                $cart->save();
                return redirect()->route('cart',Auth::id());
            }else{
                return redirect()->route('cart',Auth::id());
            }
        }else{
            if(!Cart::where('agent_id', Auth::guard('agent')->user()->id)->where('product_id', $product_id)->exists())
            {
                $product = Product::find($product_id);
                $cart = new Cart();
                $cart->agent_id   = Auth::guard('agent')->user()->id;
                $cart->product_id = $product_id;
                $cart->comapny_id = $product->company->id;
                $cart->save();
                return redirect()->route('checkout',auth('agent')->id());
            }else{
                return redirect()->route('checkout',auth('agent')->id());
            }
        }
    }

    public function place_order(Request $request)
    {

        $request->validate([
            "division" => 'required|numeric',
            "district" => 'required|numeric',
            "upazila"  => 'required|numeric',
            "union"    => 'required|numeric',
        ],
        [
            'division.numeric' => 'Please Select Division!',
            'district.numeric' => 'Please Select District!',
            'upazila.numeric'  => 'Please Select Upazila!',
            'union.numeric'    => 'Please Select Union!',
        ]);

        $data['agent_id'] = auth('agent')->id();
        $data['status'] = 'Ordered';
        $data['same_order_uid'] = time(); // It should be removed from here, model, migration and db
        $date['delivery_date'] = $request->delivery_date;

        $carts = Cart::select('comapny_id')->where('agent_id', Auth::guard('agent')->user()->id)->get();
            $comapnys = [];
            foreach($carts as $cart)
            {
                array_push($comapnys, $cart->comapny_id);
            }

            $uniq_comapny = array_unique($comapnys);

            foreach($uniq_comapny as $comapny_id )
            {
                //order create
                $order = Order::Create([
                    'agent_id'        => auth('agent')->id(),
                    'same_order_uid'  => rand(0, 9999999999),
                    'delivery_date'   => $request->delivery_date,
                    'company_id'      => $comapny_id,
                    'note'            => $request->note,
                ]);

                $carts = Cart::where('agent_id', Auth::guard('agent')->user()->id)->where('comapny_id', $comapny_id)->get();
                //order details
                foreach ($carts as $cart) {
                    OrderDetail::create([
                        'order_id'   => $order->id,
                        'product_id' => $cart->product_id,
                        'company_id' => get_product($cart->product_id)->company_id,
                        'quantity'   => $cart->quentity,
                        'price'      => agent_cart_product_total($cart->id),
                    ]);
                }

                //delivery locatrion
              $order_location =  OrderLocation::create([
                    'order_id'      => $order->id,
                    'division_id'   => $request->division,
                    'district_id'   => $request->district,
                    'upazila_id'    => $request->upazila,
                    'union_id'      => $request->union,
                ]);

               $carts->each->delete();
            }


      return redirect(route('agent.orders'))->with('success', 'Ordered successfully.');
    }


    //rodcem policy
    public function policy()
    {
        return view('Pages.policy',['privacy' => Privacy::first()]);
    }
    public function terms_condation()
    {
        return view('Pages.terms_condation',['terms_condation' => TermsCondation::first()]);
    }

    // Cart Product Quentity Increment
    public function qty_increment(Request $request)
    {
        $item = Cart::find($request->id);
        $item->quentity =  $item->quentity+1;
        $item->save();

        return response()->json(['success' => 'Quentity Update Successfull!', 'id' => $request->id]);
    }

    // Cart Product Quentity Decrement
    public function qty_decrement(Request $request)
    {
        $item = Cart::find($request->id);
        if($item->quentity > 1){
            $item->quentity =  $item->quentity-1;
            $item->save();
            return response()->json(['success' => 'Quentity Update Successfull!', 'id' => $request->id]);
        }else{
            return response()->json(['message' => 'You Can\'t Order Less of This Quentitny!', 'id' => $request->id]);
        }
    }

    // Cart Product Quentity Update
    public function qty_update(Request $request)
    {
        $item = Cart::find($request->id);
        if($request->quentity >= 1){
            $item->quentity =  $request->quentity;
            $item->save();
            return response()->json(['success' => 'Quentity Update Successfull!', 'id' => $request->id]);
        }else{
            return response()->json(['message' => 'You Can\'t Order Less of This Quentitny!', 'id' => $request->id]);
        }
    }
}
