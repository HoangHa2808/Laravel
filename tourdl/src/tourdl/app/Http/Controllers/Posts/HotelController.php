<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Posts\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $hotels = Hotel::all();
        return view('posts.hotel.index',[
            'hotels' => $hotels]
        );
    }
    public function create(Request $request)
    {
        return view('posts.hotel.editing');
    }
    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:191',
                'slug' => 'required|max:191',
                'ratting' => 'required|max:10',
                'discount' => 'required|max:191',
            ]
        );
        if ($validated->fails()) {
            alert()->success([
                'status' => 400,
                'errors' => $validated->messages(),
            ]);
        } else {
            $hotels = new Hotel();
            $hotels->title = $request->input('title');
            $hotels->slug = $request->input('slug');
            $hotels->ratting = $request->input('ratting');
            $hotels->discount = $request->input('discount');
            $hotels->short_description = $request->input('short_description');
            $hotels->description = $request->input('description');
            $hotels->published = $request->input('published') == true ? '1' : '0';
            $hotels->save();
            alert()->success('Thêm bài viết khách sạn thành công.', 'Successfully');
        }
        return redirect()->route('posts.hotel.index');
    }

    public function edit($id)
    {
        $hotels = Hotel::find($id);
        if ($hotels) {
            return response()->json([
                'status' => 200,
                'hotels' => $hotels,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy id của bài viết khách sạn!',
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
            $hotels = Hotel::find($id);
            if ($hotels) {
                $hotels->title = $request->input('title');
                $hotels->slug = $request->input('slug');
                $hotels->description = $request->input('description');
                $hotels->show_on_menu = $request->input('show_on_menu') == true ? '1' : '0';
                $hotels->save();
                return alert()->json([
                    'status' => 200,
                    'message' => 'Cập nhật bài viết khách sạn thành công.'
                ]);
            } else {
                return alert()->success([
                    'status' => 404,
                    'message' => 'Không tìm thấy id của bài viết khách sạn!'
                ]);
            }
        }
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::table('hotels')
            ->where('id', $id)
            ->delete();

        return redirect()->route('posts.hotel.index');
    }
}
