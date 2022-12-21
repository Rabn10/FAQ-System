<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        try {
            $question = new Question();
            $question->questions = $request->get('questions');
            $question->up_vote = $request->get('up_vote');
            $question->down_vote = $request->get('down_vote');
            $question->created_by = $request->get('created_by');
            $question->save();
            return response()->json([
                'status' => 1,
                'message' => $question
            ]);
        }
        catch (\Exception $e) {
            throw $e;
        }
    }
}
