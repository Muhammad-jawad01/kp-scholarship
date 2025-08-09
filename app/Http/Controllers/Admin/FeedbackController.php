<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FeedbackController extends Controller
{
    public function index()
    {
        $messages = Feedback::join('feedback_users', 'feedback_users.id', '=', 'feedback.feedback_user_id')
                    ->orderBy('feedback.id', 'desc')
                    ->select('feedback.*', 'feedback_users.name')
                    ->paginate(10);
        
        return view('content.apps.feedback.index', compact('messages'));
    }

    public function add_comment($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('content.apps.feedback.post-comment', compact('feedback'));
    }

    public function add(Request $request)
    {
        $data = $request->except('_token');
        $validations = Validator::make($data, [
            'comment' => 'required'
        ]);

        if($validations->fails())
        {
            $errors = $validations->errors();
            $errorDisplay = "";
            foreach ($errors->messages() as $key => $error) {
                $errorDisplay = $errorDisplay . '<br>' . $error[0];
            }
            Alert::toast($errorDisplay, 'error')->timerProgressBar();
            return redirect()->back();
        }
        else
        {
            $comment = Comment::create($data);
            if($comment)
            {
                Alert::toast("Comment successfully added", 'success')->timerProgressBar();
                return redirect()->route('feedback.index');
            }
            else
            {
                Alert::toast("Failed to add comment", 'error')->timerProgressBar();
                return redirect()->back();
            }
        }
    }

    public function comments($id)
    {
        $feedback = Feedback::where('id', $id)->first();
        $comments = Comment::where('feedback_id', $id)->get();
        return view('content.apps.feedback.comments', compact('feedback', 'comments'));
    }
}
