<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Posts\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ToursController extends Controller
{
    public function index(Request $request)
    {
        $tours = Tours::all();
        return view('posts.tours.index', [
            'tours' => $tours
        ]);
    }

    public function create(Request $request)
    {
        return view('posts.tours.editing');
    }
    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:191',
                'slug' => 'required|max:191',
            ]
        );
        if ($validated->fails()) {
            alert()->success([
                'status' => 400,
                'errors' => $validated->messages(),
            ]);
        } else {
            $tours = new Tours();
            $tours->title = $request->input('title');
            $tours->slug = $request->input('slug');
            $tours->times = $request->input('times');
            $tours->schedule = $request->input('schedule');
            $tours->time_down = $request->input('time_down');
            $tours->price = $request->input('price');
            $tours->discount = $request->input('discount');
            $tours->place = $request->input('place');
            $tours->short_description = $request->input('short_description');
            $tours->description = $request->input('description');
            $tours->published = $request->input('published') == true ? '1' : '0';
            $tours->save();
            alert()->success('Thêm bài viết du lịch thành công.', 'Successfully');
        }
        return redirect()->route('posts.tours.index');
    }

    public function edit($id)
    {
        $tours = Tours::find($id);
        if ($tours) {
            return response()->json([
                'status' => 200,
                'tours' => $tours,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy id của bài viết du lịch!',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:191',
                'slug' => 'required|max:191',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ]);
        } else {
            $tours = Tours::find($id);
            if ($tours) {
                $tours->title = $request->input('title');
                $tours->slug = $request->input('slug');
                $tours->times = $request->input('times');
                $tours->schedule = $request->input('schedule');
                $tours->time_down = $request->input('time_down');
                $tours->price = $request->input('price');
                $tours->discount = $request->input('discount');
                $tours->place = $request->input('place');
                $tours->description = $request->input('description');
                $tours->show_on_menu = $request->input('show_on_menu') == true ? '1' : '0';
                $tours->save();
                return alert()->json([
                    'status' => 200,
                    'message' => 'Cập nhật bài viết du lịch thành công.'
                ]);
            } else {
                return alert()->success([
                    'status' => 404,
                    'message' => 'Không tìm thấy id của bài viết du lịch!'
                ]);
            }
        return redirect()->route('posts.tours.index');

        }
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::table('tours')
            ->where('id', $id)
            ->delete();

        return redirect()->route('posts.tours.index');
    }
}
