<?php

namespace App\Http\Controllers;

use App\Exports\FormsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Form;

class ResultsExportController extends Controller
{
    public function __invoke(Request $request, Form $form)
    {
        return Excel::download(new FormsExport($form), 'forms.xlsx');
    }
}
