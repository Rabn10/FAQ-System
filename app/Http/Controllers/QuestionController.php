<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Vote;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function getQuestion(Request $request)
    {
        try {
            $questions = Question::get(['id','questions','created_by']);
            return response()->json([
                'status' => 1,
                'data' => $questions
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }


    public function store(Request $request)
    {
        try {
            $question = new Question();
            $question->questions = $request->get('questions');
            // $question->up_vote = $request->get('up_vote');
            // $question->down_vote = $request->get('down_vote');
            $question->created_by = $request->get('created_by');
            $question->save();
            return response()->json([
                'status' => 1,
                'message' => 'Question created successfully.'
            ]);
        }
        catch (\Exception $e) {
            throw $e;
        }
    }
    public function vote(Request $request , $id)
    {
        try {
            $question = Question::find($id);
            $question->up_vote = $request->get('up_vote');
            $question->down_vote = $request->get('down_vote');
            $question->save();
            // $vote = new vote();
            // $vote->up_vote = $request->get('up_vote');
            // $vote->down_vote = $request->get('down_vote');
            // $vote->question_id = $question;
            // $vote->save();
            // $question->up_vote = $request->get('up_vote');
            // $question->down_vote = $request->get('down_vote');
            // $question->save();
            return response()->json([
                'status' => 1,
                'message' => 'Question voted  successfully.'
            ]);
        }
        catch (\Exception $e) {
            throw $e;
        }
    }
}
