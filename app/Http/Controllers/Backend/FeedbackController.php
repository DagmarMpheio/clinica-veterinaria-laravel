<?php

namespace App\Http\Controllers\Backend;

use App\Models\feedback;
use Illuminate\Http\Request;

class FeedbackController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::latest()->simplePaginate(5);
        $feedbacksCount = Feedback::count();

        return view('backend.feedbacks.index', compact('feedbacks','feedbacksCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

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
        return redirect()->back()->with("success", "Mensagem enviada!");
    }

    /**
     * Display the specified resource.
     */
    public function show(feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(feedback $feedback)
    {
        //
    }
}
