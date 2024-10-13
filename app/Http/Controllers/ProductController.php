<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    const PATH_VIEW = "client.products.";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::latest('id')->paginate(10);

        return view('client.products.index' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('client.products.create');

        return view(self::PATH_VIEW . __FUNCTION__);

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validate([
            'name'          => [
                'required',
                'string',
                'max:255',
                Rule::unique('products')
            ],
            'description'   => [
                'string',
                'nullable'
            ],
            'price'         => [
                'required',
                'numeric',
                'min:0',
                'max:999999.99'
            ],
            'quantity'      => [
                'required',
                'integer',
                'min:0'
            ],
            'is_active'     => [
                'nullable',
                Rule::in(0,1)
            ],
            'image'         => [
                'nullable',
                'image',
                'max:2048'
            ]
        ]);

        try {

            if($request->hasFile('image')){
                $data['image'] = $request->file('image')->store('products', 'public');
            }
        
            Product::query()->create($data);

            return redirect()
            ->route('client.products.index')
            ->with('success', true);
        } catch (\Throwable $th) {
            
            if(!empty($data['image']) && Storage::exists($data['image'])){
                Storage::delete($data['image']);
            }

            return back()
            ->with('success', false)
            ->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
