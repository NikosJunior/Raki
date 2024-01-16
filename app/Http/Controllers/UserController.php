<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\TryCatch;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            User::all();
        } catch (\Exception $e) {
            session()->flash("error", "Erreur lors de la récupération des utilisateurs");
            return redirect()->back();
        }
        return view('dashboard.users', [
            'users' => User::orderBy('created_at', 'desc')->paginate(6)
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
        // Validation des données
        $validator = Validator::make($request->all(), [
            "name" => "required:users|regex:/^[\w\s-]+$/|max:100",
            "email" => "required|email:users|regex:/^.+@.+\..+$/i",
        ]);
        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());
            return redirect()->back();
        }
        // dd($request->email);
        
        try {
            User::where("id", $id)->update([
                "name" => $request->name,
                "email" => $request->email
            ]);
            return redirect()->back()->with('success', 'Modification réussie');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur durant la modification');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            User::where("id", $id)->delete();
        } catch (\Exception $e) {
            return session()->flash('error', 'Erreur lors de la suppresion');
        }
        return redirect()->back()->with('success', 'suppression réussie');
    }

    /**
     * Login.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "users|regex:/^[\w\s-]+$/|max:100",
            "email" => "email:users|regex:/^.+@.+\..+$/i",
            "password" => "min:8"
        ]);
        if ($validator->fails()) {
            session()->flash('error', $validator->errors()->first());
            return redirect()->back();
        }
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                session()->flash('error', "Cet email d'utilisateur n'existe pas");
                return redirect()->back();
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Erreur lors de la connexion');
            return redirect()->back();
        }
        if (!Hash::check($request->password, $user->password)) {
            session()->flash('error', 'Mot de passe incorrect');
            return redirect()->back();
        }
        return redirect('/');
    }
    /**
     * Make admin or User
     */
    public function update_role(string $id)
    {

        try {
            $user = User::where("id", $id)->first();
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Erreur lors de larécupération d'utilisateur");
        }
        try {
            if ($user->is_admin == true) {
                $user->update([
                    "is_admin" => false
                ]);
            } else {
                $user->update([
                    "is_admin" => true
                ]);
            }
            return redirect()->back()->with('success', 'Modification réussie');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la modification');
        }
    }
}
