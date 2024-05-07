<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function getQuestions()
    {
        return Question::all();
    }

    public function getQuestion(Question $question)
    {
        return $question;
    }

    public function addQuestion(Request $request)
    {

        $question = new Question;
        $question->question = $request->question;
        $question->points = $request->points;

        if ($request->file('question_file')) {
            $path_question = $request->file('question_file')->store('/public/file');
            $question->question_file = '/storage/' . $path_question;
        }

        if ($request->file('answer_file')) {
            $path_answer = $request->file('answer_file')->store('/public/file');
            $question->answer_file = '/storage/' . $path_answer;
        }

        $question->desc = $request->desc;
        $question->question_type = $request->question_type;
        $question->answer = $request->answer;
        $question->answer_type = $request->answer_type;
        $question->category_id = $request->category_id;

        $question->save();

        return redirect()->back();
    }

    public function updateQuestion(Request $request, Question $question)
    {
        $question->update($request->all());

        return redirect()->back();
    }

    public function deleteQuestion(Question $question)
    {
        $question->delete();

        return redirect()->back();
    }
}
