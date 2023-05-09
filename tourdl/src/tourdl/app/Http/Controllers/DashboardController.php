<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Posts\Hotel;
use App\Models\Posts\News;
use App\Models\Posts\Tours;
use App\Models\Role;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $hotel = Hotel::where('status', '0')->count();
        $tour = Tours::where('status', '0')->count();
        $news = News::where('status', '0')->count();
        $category = Category::where('status', '0')->count();
        $role = Role::count();
        $feedback = Feedback::count();
        return response()->json([
            'status' => 200,
            'hotel' => $hotel,
            'tour' => $tour,
            'news' => $news,
            'category' => $category,
            'role' => $role,
            'feedback' => $feedback,
        ]);
    }
}
