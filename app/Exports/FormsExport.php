<?php

namespace App\Exports;

use App\Models\Form;
use App\Models\FormResponse;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FormsExport implements FromView, ShouldAutoSize
{
    public $form;

    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function view(): View
    {
        $formWithAttributes = Form::with('questions','formResponses')->findOrFail($this->form->id);
        $formResponses = FormResponse::with('responses')->where('form_id', $this->form->id)->get();
        return view('exports.forms', [
            'form' => $formWithAttributes,
            'formResponses' => $formResponses
        ]);
    }
}
