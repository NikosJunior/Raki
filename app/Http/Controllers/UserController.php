<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        if ($request->password != $request->password_confirm) {
            session()->flash('error', 'Mot de passe non identique veuillez confirmer votre mot de passe');
            return redirect()->back();
        }
        // Validation des données
        $validator = Validator::make($request->all(), [
            "name" => "required|unique:users|regex:/^[\w\s-]+$/|max:100",
            "email" => "required|email|unique:users|regex:/^.+@.+\..+$/i",
            "password" => "required|min:8"
        ]);
        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());
            return redirect()->back();
        }
        try {
            User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password)
            ]);
        } catch (\Exception $e) {
            session()->flash('error', 'Une erreur est survenu lors de votre enregistrement veuillez réésssayer plus tard');
            return redirect()->back();
        }
        return redirect('/login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
}
