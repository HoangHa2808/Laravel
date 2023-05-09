<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        $feedbacks = Feedback::all();
        return view('feedback.index', [
            'feedbacks' => $feedbacks
        ]);
    }

    public function destroy($id)
    {
        $feedback = Feedback::find($id);
        if ($feedback) {
            $path = $feedback->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $feedback->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Đã xóa phản hồi.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy id của phản hồi!'
            ]);
        }
        return redirect()->route('feedback.index');
    }
}
