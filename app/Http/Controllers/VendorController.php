<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function vendorStoreProducts(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            // 'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure it's an image
            'banner_image' => 'required', // Ensure it's an image
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'stock' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
        ], [
            'required' => 'The :attribute field is required.',
            'exists' => 'The selected :attribute is invalid.'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->messages()
            ], 403);
        }
    
        // Retrieve validated data
        $validated = $validator->validated();
    
        
        $validated['vendor_id'] = auth()->user()->vendor->id;// Assuming the authenticated user is a vendor
    
        // Create the product
        $product = Product::create($validated);
    
        return response()->json([
            'message' => 'Product created successfully!',
            'product' => $product
        ], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function vendorProducts(){
        $user = Auth::user();
        $products = Product::where('vendor_id', $user->id)->get(); // Call get() to fetch data
        return response()->json([
            "message" => "success",
            "data" => $products,
        ], 200);
    }
}
