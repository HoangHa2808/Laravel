<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('category.index', [
            'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {
        return view('category.editing');
    }

    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:191',
                'slug' => 'required|max:191|unique:categories,slug',
            ],

            [
                'required'  => 'Bạn phải điền :attribute',
                'unique'  => 'Slug đã tồn tại!',
            ]

        );
        if ($validated->fails()) {
            alert()->success([
                'status' => 400,
                'errors' => $validated->messages(),
            ]);
        } else {
            $category = new Category();
            $category->name = $request->input('name');
            $category->slug = $request->input('slug');
            $category->description = $request->input('description');
            $category->show_on_menu = $request->input('show_on_menu') == true ? '1' : '0';
            $category->save();
            alert()->success('Thêm danh mục thành công.', 'Successfully');
        }
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if ($category) {
            return response()->json([
                'status' => 200,
                'category' => $category,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy id của danh mục!',
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:191',
                'slug' => 'required|max:191|unique:categories,slug',
            ],
            [
                'required'  => 'Bạn phải điền :attribute',
                'unique'  => 'Slug đã tồn tại!',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ]);
        } else {
            $category = Category::find($id);
            if ($category) {
                $category->name = $request->input('name');
                $category->slug = $request->input('slug');
                $category->description = $request->input('description');
                $category->show_on_menu = $request->input('show_on_menu') == true ? '1' : '0';
                $category->save();
                return alert()->json([
                    'status' => 200,
                    'message' => 'Cập nhật danh mục thành công.'
                ]);
            } else {
                return alert()->success([
                    'status' => 404,
                    'message' => 'Không tìm thấy id của danh mục!'
                ]);
            }
        }
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            $path = $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $category->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Đã xóa danh mục.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Không tìm thấy id của danh mục!'
            ]);
        }
        return redirect()->route('category.index');
    }
}
