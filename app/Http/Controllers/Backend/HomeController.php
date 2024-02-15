<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.home.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        $user = $request->user();

        return view('backend.home.profile', compact('user'));
    }

    /**
     * mostrar dados relativos ao perfil
     */
    public function edit(Request $request)
    {

        $user = $request->user();

        return view('backend.home.edit-profile', compact('user'));
    }
}
