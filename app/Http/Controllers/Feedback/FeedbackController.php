<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function add_feedback(Request $request)
    {
        $validations = Validator::make($request->all(), [
            'message' => 'required'
        ]);

        if($validations->fails())
        {
            return redirect()->back()->withInput()->withErrors($validations->errors());
        }
        else
        {
            $feedbackUserId = Auth::user()->id;
            $subject = $request->subject;
            $message = $request->message;

            $feedback = Feedback::create([
                'feedback_user_id' => $feedbackUserId,
                'subject' => $subject,
                'message' => $message
            ]);

            if($feedback)
            {
                //return redirect()->back()->with('success', 'Your message was sent successfully, thank you.');
                return redirect()->route('user.feedbacks');
            }
            else
            {
                return redirect()->back()->with('error', 'Something went wrong!, try again.');
            }
        }
    }

    public function feedbacks()
    {
        $feedbackUserId = Auth::user()->id;
        // $feedbacks = Feedback::leftJoin('comments', 'comments.feedback_id', '=', 'feedback.id')
        //              ->where('feedback.feedback_user_id', $feedbackUserId)
        //              ->orderBy('feedback.id', 'desc')
        //              ->get();
        // return $feedbacks;
        $feedbacks = Feedback::with('comments')
                    ->where('feedback.feedback_user_id', $feedbackUserId)
                    ->orderBy('feedback.id', 'desc')
                    ->get();
        return view('feedback.user_feedback', compact('feedbacks'));
    }
}
