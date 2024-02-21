<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'topic' => 'required|string',
            'message' => 'required',
        ]);

        $feedback = Feedback::create($request->all());

        //return dd($request->role);
        return redirect('/')->with("success", "Mensagem enviada!");
    }
}
