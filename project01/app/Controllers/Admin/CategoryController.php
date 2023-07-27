<?php

namespace App\Controllers\Admin;

use Core\Request;
use Core\Session;
use App\Core\Auth;
use Carbon\Carbon;
use Core\Validator;
use App\Models\Category;
use Core\Controller;
use App\Core\Message;

class CategoryController extends Controller
{
    private $category = null;


    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $pageTitle = Message::$pageTitle['categories']['lists'];
        $msg = Session::getFlash('msg');

        $categories = $this->category->getcategories();

        $links = $this->category->links($categories, true);

        $categories = $categories['data'];

        $action = route('admin.categories.deletes');

        $this->view('admin/categories/lists', compact('pageTitle', 'msg', 'categories', 'action', 'links'));
    }

    public function add()
    {
        $pageTitle = Message::$pageTitle['categories']['add'];
        $msg = Session::getFlash('msg');

        $this->view('admin/categories/add', compact('pageTitle', 'msg'));
    }

    public function handleAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug'
        ], [
            'required' => Message::$messages['categories']['validate']['required'],
            'unique' => Message::$messages['categories']['validate']['unique'],
        ], Message::$messages['categories']['attributes']);

        $this->category->create(attributes: [
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);

        Session::put('msg', 'Thêm chuyên mục thành công');

        redirect(route('admin.categories.index'));
    }

    public function edit($id)
    {
        $pageTitle = Message::$pageTitle['categories']['edit'];
        $msg = Session::getFlash('msg');

        $category = $this->category->getcategory('id', $id);

        $this->view('admin/categories/edit', compact('pageTitle', 'msg', 'category'));
    }

    public function handleEdit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$id,

        ], [
            'required' => Message::$messages['categories']['validate']['required'],
            'unique' => Message::$messages['categories']['validate']['unique'],
        ], Message::$messages['categories']['attributes']);


        $this->category->updatecategory([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ], $id);

        Session::put('msg', 'Cập nhật chuyên mục thành công');

        redirect(route('admin.categories.edit', ['id' => $id]));
    }

    public function delete($id)
    {
        $this->category->delete(condition: "id = ?", data: [$id]);
        Session::put('msg', 'Xóa chuyên mục thành công');

        redirect(route('admin.categories.index'));
    }

    public function deletes(Request $request)
    {
        if ($request->ids) {
            $ids = $request->ids;

            $condition = "id IN($ids)";
            $this->category->delete(condition: $condition);
            Session::put('msg', 'Xóa chuyên mục thành công');

        }

        redirect(route('admin.categories.index'));
    }



}