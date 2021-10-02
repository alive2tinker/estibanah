<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Form;
use App\Models\Question;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $form = Form::create([
            'title' => "استبيان التطوع",
            'description' => "هذا الاستبيان لقياس مدى جاهزية طلاب الجامعة للتطوع",
            'user_id' => 1,
            'published' => 1
        ]);

        Question::create([
            'text' => "الاسم الكريم",
            'type' => "short",
            'form_id' => $form->id
        ]);

        Question::create([
            'text' => "تاريخ التخرج المتوقع",
            'type' => "date",
            'form_id' => $form->id
        ]);

        $question = Question::create([
            'text' => "اي من افرع الجامعة ترغب في التطوع به؟",
            'type' => "multiple",
            'form_id' => $form->id
        ]);

        Answer::create([
            'text' => "الرياض",
            'question_id' => $question->id,
        ]);

        Answer::create([
            'text' => "جدة",
            'question_id' => $question->id
        ]);

        Answer::create([
            'text' => "الدمام",
            'question_id' => $question->id
        ]);

        $fieldQuestion = Question::create([
            'text' => "في اي من المجالات التالية ترغب بالتطوع",
            'type' => "checkbox",
            'form_id' => $form->id
        ]);

        Answer::create([
            'text' => "البرمجة",
            'question_id' => $fieldQuestion->id
        ]);

        Answer::Create([
            'text' => "كتابة المحتوى",
            'question_id' => $fieldQuestion->id
        ]);

        Answer::create([
            'text' => "العمل الميداني",
            'question_id' => $fieldQuestion->id
        ]);

        Question::create([
            'text' => "تكلم عن نفسك",
            'type' => "long",
            'form_id' => $form->id
        ]);

        Question::create([
            'text' => "ارفق السيرة الذاتية",
            'type' => "file",
            'form_id' => $form->id
        ]);
    }
}
