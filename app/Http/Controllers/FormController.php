<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForm;
use App\Http\Resources\FormDetailResource;
use App\Http\Resources\FormResource;
use App\Models\Answer;
use App\Models\Form;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Condition;

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

        foreach ($request->input('questions') as $nuQuestion) {
            $question = $form->questions()->create([
                'text' => $nuQuestion['text'],
                'type' => $nuQuestion['type'],
                'description' => $nuQuestion['description'],
                'required' => $nuQuestion['required']
            ]);

            if ($nuQuestion['type'] === 'multiple' || $nuQuestion['type'] === 'checkbox') {
                foreach ($nuQuestion['answers'] as $potentialAnswer) {
                    $question->answers()->create([
                        'text' => $potentialAnswer['text']
                    ]);
                }
            }

            foreach ($nuQuestion['conditions'] as $condition) {
                // dd(Question::where('text', $condition['foreignQuestion'])->first()->id);
                Condition::create([
                    'operation' => $condition['operation'],
                    'value' => $condition['value'],
                    'foreign_question' => Question::where('text', $condition['foreignQuestion'])->first()->id,
                    'operator' => $condition['operator'],
                    'question_id' => $question->id
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
            'userForm' => new FormDetailResource($form)
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
        return Inertia::render('Forms/Edit', [
            'userForm' => new FormDetailResource($form)
        ]);
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
        if ($request->has('published'))
            $form->update($request->all());
        else {
            $form->update([
                'title' => $request->input('title'),
                'description' => $request->input('description')
            ]);

            foreach ($request->input('questions') as $oldQuestion) {
                try {
                    $question = Question::find($oldQuestion['id']);
                    $question->update([
                        'text' => $oldQuestion['text'],
                        'type' => $oldQuestion['type'],
                        'description' => $oldQuestion['description'],
                        'required' => $oldQuestion['required']
                    ]);
                } catch (\Exception $e) {
                    $question = $form->questions()->create([
                        'text' => $oldQuestion['text'],
                        'type' => $oldQuestion['type'],
                        'description' => $oldQuestion['description'],
                        'required' => $oldQuestion['required']
                    ]);
                }

                if ($oldQuestion['type'] === 'multiple' || $oldQuestion['type'] === 'checkbox') {
                    foreach ($oldQuestion['answers'] as $potentialAnswer) {
                        try {
                            $answer = Answer::find($potentialAnswer['id']);
                            $answer->update([
                                'text' => $potentialAnswer['text']
                            ]);
                        } catch (\Exception $e) {
                            $question->answers()->create([
                                'text' => $potentialAnswer['text']
                            ]);
                        }
                    }
                }

                foreach ($oldQuestion['conditions'] as $condition) {
                    Condition::updateOrCreate(['operation',
                    'value',
                    'foreign_question',
                    'operator',
                    'question_id'],[
                        'operation' => $condition['operation'],
                        'value' => $condition['value'],
                        'foreign_question' => Question::where('text', $condition['foreignQuestion'])->first()->id,
                        'operator' => $condition['operator'],
                        'question_id' => $question->id
                    ]);
                }
            }
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        $form->delete();

        return redirect()->route('dashboard');
    }
}
