<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.products', [
            'products' => Produit::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|unique:produits|regex:/^[\w\s-]+$/|max:100",
            "prix" => "required",
            "quantity" => "required",
            "description" => "required",
            "img" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
            "category_id" => "required"

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $imagePath = $request->file('img')->store('images', 'public');
        // dd($request->category_id);

        try {
            Produit::create([
                "name" => $request->name,
                "prix" => $request->prix,
                "quantity" => $request->quantity,
                "category_id" => $request->category_id,
                "img" => $imagePath,
                "description" => $request->description,
            ]);
            return redirect()->back()->with('success', 'Produits ajoutés avec succès!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', "Une erreur s'est produit durant l'ajout");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        //
    }
}
