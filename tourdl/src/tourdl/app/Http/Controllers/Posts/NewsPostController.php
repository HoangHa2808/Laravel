<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Posts\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class NewsPostController extends Controller
{
    public function index(Request $request)
    {
        $news = News::all();
        return view('posts.news.index', [
            'news' => $news
        ]);
    }

    public function create(Request $request)
    {
        return view('posts.news.editing');
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
            $news = new News();
            $news->title = $request->input('title');
            $news->slug = $request->input('slug');
            $news->view_count = $request->input('view_count');
            $news->short_description = $request->input('short_description');
            $news->description = $request->input('description');
            $news->published = $request->input('published') == true ? '1' : '0';
            $news->save();
            alert()->success('Thêm bài viết tin tức thành công.', 'Successfully');
        }
        return redirect()->route('posts.news.index');
    }

    public function edit($id)
    {
        $news = News::find($id);
        if ($news) {
            return response()->json([
                'status' => 200,
                'news' => $news,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy id của bài viết tin tức!',
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
            $news = News::find($id);
            if ($news) {
                $news->title = $request->input('title');
                $news->slug = $request->input('slug');
                $news->view_count = $request->input('view_count');
                $news->description = $request->input('description');
                $news->show_on_menu = $request->input('show_on_menu') == true ? '1' : '0';
                $news->save();
                return alert()->json([
                    'status' => 200,
                    'message' => 'Cập nhật bài viết tin tức thành công.'
                ]);
            } else {
                return alert()->success([
                    'status' => 404,
                    'message' => 'Không tìm thấy id của bài viết tin tức!'
                ]);
            }
        }
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::table('news')
            ->where('id', $id)
            ->delete();

        return redirect()->route('posts.news.index');
    }
}
