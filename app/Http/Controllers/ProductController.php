<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
  
use App\Models\category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = category::all();
        return view('products.create',compact('categories'));
    }
  
    
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'prix' => 'required',
            'detail' => 'required',
            
        ]);
        if ($request->file('image')) {
            $picture = $request->file('image')->store('public/picture');
            $name = explode('/', $picture)[2];
            $input['image'] = $name;
        };
        Product::create(
            [
            'name' => $request->name,
            'image' => $name,
            'prix' => $request->prix,
            'category_id' => $request->category_id,
            'detail' => $request->detail,
            ]
        );
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show',compact('product'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.edit',compact('product'));
        
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prix' => 'required',
            'category' => 'required',
            'detail' => 'required',
        ]);
        
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
         
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}