<?php

namespace App\Http\Controllers;

use App\Http\Requests\RespondToForm;
use App\Http\Resources\FormDetailResource;
use App\Models\Form;
use App\Models\FormResponse;
use App\Models\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use DB;

class FormResponseController extends Controller
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
    public function create(Form $form)
    {
        if(!$form->published)
            return abort(403);

        return Inertia::render('FormResponses/Create', [
            'form' => new FormDetailResource($form)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RespondToForm $request, Form $form)
    {
        DB::transaction(function() use($request, $form){
        $formResponse = FormResponse::create([
            'form_id' => $form->id
        ]);
        foreach ($request->input('responses') as $index => $response) {
            if ($response['question']['type'] === 'file') {
                if ($request->hasFile('responses.' . $index .'.value')) {
                    $file = $request->file('responses')[$index]['value'][0];
                    $uploadName = "file_responses/";
                    $path = Storage::put($uploadName, $file);
                    $upload = $formResponse->uploads()->create([
                        'link' => $path,
                        'name' => $file->getClientOriginalName(),
                        'type' => $file->getClientMimeType()
                    ]);
                    Response::create([
                        'question_id' => $response['question']['id'],
                        'form_response_id' => $formResponse->id,
                        'value' => $upload->name
                    ]);
                }
            }else if($response['question']['type'] !== 'file'){
                Response::create([
                    'question_id' => $response['question']['id'],
                    'form_response_id' => $formResponse->id,
                    'value' => $response['question']['type'] === 'checkbox' ? implode(",", $response['value'])
                        : $response['value']
                ]);
            }
        }
        });

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormResponse  $formResponse
     * @return \Illuminate\Http\Response
     */
    public function show(FormResponse $formResponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormResponse  $formResponse
     * @return \Illuminate\Http\Response
     */
    public function edit(FormResponse $formResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormResponse  $formResponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormResponse $formResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormResponse  $formResponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormResponse $formResponse)
    {
        //
    }
}
