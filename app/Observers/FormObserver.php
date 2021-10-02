<?php

namespace App\Observers;

use App\Models\Form;

class FormObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;


    public function deleting(Form $form)
    {
        foreach($form->questions as $question){
            foreach($question->responses as $response)
                $response->delete();

            $question->delete;
        }

        foreach($form->formResponses as $formResponse)
            $formResponse->delete();
    }
}
