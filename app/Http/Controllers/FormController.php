<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForm;
use App\Http\Resources\FormDetailResource;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Forms/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForm $request)
    {
        // dd($request);
        $form = Auth::user()->forms()->create([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);

        foreach($request->input('questions') as $nuQuestion)
        {
            $question = $form->questions()->create([
                'text' => $nuQuestion['text'],
                'type' => $nuQuestion['type'],
                'description' => $nuQuestion['description']
            ]);

            if($nuQuestion['type'] === 'multiple' || $nuQuestion['type'] === 'checkbox'){
                foreach($nuQuestion['answers'] as $potentialAnswer){
                    $question->answers()->create([
                        'text' => $potentialAnswer['text']
                    ]);
                }
            }

            foreach($nuQuestion['conditions'] as $condition){
                $question->conditions()->create([
                    'operation' => $condition['operation'],
                    'value' => $condition['value'],
                    'independent_question_id' => $condition['question']
                ]);
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        return Inertia::render('Forms/Show', [
            'form' => new FormDetailResource($form)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }
}
