
<?php
// namespace App\Http\Controllers\Company;
namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        $data = Product::whereCompanyId(auth('company')->id())->latest()->get();
        return view('Company.product.index', compact('data'));
    }

    public function create()
    {
        $units = Unit::where('company_id', auth('company')->id())->latest()->get();
        $sub_categories = Category::where('company_id', auth('company')->id())->latest()->get();
        return view('Company.product.create', compact('units', 'sub_categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'image'             => 'required|image',
            // 'short_description' => 'required',
            // 'description'       => 'required'
        ]);

        $product = Product::Create($request->all());
        $product->slug = Str::slug($request->name).uniqid(5);
        $product->company_id = auth('company')->id();

        if($request->hasFile('image'))
        {
            $image    = $request->file('image');
            $name     = 'product-'. uniqid(51) . '.' . $image->getClientOriginalExtension();
            $location = public_path('company/products');
            $image->move($location, $name);
            $product->image = $name;
        }
        $product->save();
        return redirect(route('company.product.index'))->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $units = Unit::where('company_id', auth('company')->id())->latest()->get();
        $sub_categories = Category::where('company_id', auth('company')->id())->latest()->get();
        $product = Product::find($id);
        return view('Company.product.show', compact('product', 'units', 'sub_categories'));
    }

    public function edit($id)
    {
        $units = Unit::where('company_id', auth('company')->id())->latest()->get();
        $sub_categories = Category::where('company_id', auth('company')->id())->latest()->get();
        $product = Product::find($id);
        return view('Company.product.edit', compact('product', 'units', 'sub_categories'));
    }

    public function update(Request $request, $id)
    {

        $product = Product::find($id);
        $product->update($request->all());
        $product->slug = Str::slug($request->name).uniqid(15);
        $product->company_id = auth('company')->id();

        if($request->hasFile('image'))
        {
            $image    = $request->file('image');
            $name     = 'product-'. uniqid(51) . '.' . $image->getClientOriginalExtension();
            $location = public_path('company/products');
            $image->move($location, $name);
            $product->image = $name;
        }
        $product->save();
        return redirect(route('company.product.index'))->with('success', 'Product Update successfully.');
    }

    public function destroy($id)
    {
         $product = Product::find($id);
         if(count($product->orderDetails) != 0)
         {
             $product = Product::find($id)->delete();
             return redirect(route('company.product.index'))->with('success', 'Product Delete successfully.');
         }else{
            return back()->with('error', 'Product can\'t Delete!');
         }
    }

    //price updte index
    public function price_index()
    {
    // return Product::where('company_id', auth('company')->id())->select(['id','name', 'slug', 'price'])->latest()->get();
        return view('Company.product.price.price_update', ['products' =>  Product::where('company_id', auth('company')->id())->latest()->get()]);
    }

    public function price_update(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->price = $request->price;
        $product->save();

        return back()->with('success', 'Price Update Successfull!');
    }
}
?>
