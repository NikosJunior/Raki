<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.products', [
            'produits' => Produit::all(),
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
            // dd($request->prix);
            // dd($request->name);
            // dd($request->quantity);
            // dd($request->category_id);
            // dd($request->description);
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
    public function update(Request $request, string $id)
    {
        $produit = Produit::where("id", $id)->first();

        $validator = Validator::make($request->all(), [
            "name" => "regex:/^[\w\s-]+$/|max:100",
            "img" => "image|mimes:jpeg,png,jpg,gif|max:2048"
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $allValue = [
            "name" => $request->name,
            "prix" => $request->prix,
            "quantity" => $request->quantity,
            "description" => $request->description,
            "img" => $request->img,
            "category_id" => $request->category_id
        ];
        if ($request->img != null) {
            File::delete(public_path("storage/" . $produit->img));
            $imagePath = $request->file('img')->store('images', 'public');
        }
        $updateProduitValue = array_filter($allValue, function ($value) {
            return $value != null;
        });
        $updateProduitValue["img"] = $imagePath;
        try {
            Produit::where("id", $id)->update($updateProduitValue);
            return redirect()->back()->with('success', 'Modification éffectué avec succès');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'Erreur durant la modification');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produit=Produit::where("id", $id)->first();
        try {
            File::delete(public_path("storage/" . $produit->img));
            $produit->delete();
            return redirect()->back()->with('success', 'produit supprimé avec succès');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with('error', 'produit non supprimé erreur durant la suppression');
        }
    }
}
