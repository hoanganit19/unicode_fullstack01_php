<?php

namespace App\Controllers\Admin;

use Core\Request;
use Core\Session;
use App\Core\Auth;
use Carbon\Carbon;
use Core\Validator;
use App\Models\Page;
use Core\Controller;
use App\Core\Message;

class PageController extends Controller
{
    private $page = null;


    public function __construct()
    {
        $this->page = new Page();
    }

    public function index()
    {
        $pageTitle = Message::$pageTitle['pages']['lists'];
        $msg = Session::getFlash('msg');

        $pages = $this->page->getPages();

        $links = $this->page->links($pages, true);

        $pages = $pages['data'];

        $action = route('admin.pages.deletes');

        $this->view('admin/pages/lists', compact('pageTitle', 'msg', 'pages', 'action', 'links'));
    }

    public function add()
    {
        $pageTitle = Message::$pageTitle['pages']['add'];
        $msg = Session::getFlash('msg');

        $this->view('admin/pages/add', compact('pageTitle', 'msg'));
    }

    public function handleAdd(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:pages,slug',
            'content' => 'required',
        ], [
            'required' => Message::$messages['pages']['validate']['required'],
            'unique' => Message::$messages['pages']['validate']['unique'],
        ], Message::$messages['pages']['attributes']);

        $this->page->create(attributes: [
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
        ]);

        Session::put('msg', 'Thêm trang thành công');

        redirect(route('admin.pages.index'));
    }

    public function edit($id)
    {
        $pageTitle = Message::$pageTitle['pages']['edit'];
        $msg = Session::getFlash('msg');

        $page = $this->page->getPage('id', $id);

        $this->view('admin/pages/edit', compact('pageTitle', 'msg', 'page'));
    }

    public function handleEdit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:pages,slug,'.$id,
            'content' => 'required',
        ], [
            'required' => Message::$messages['pages']['validate']['required'],
            'unique' => Message::$messages['pages']['validate']['unique'],
        ], Message::$messages['pages']['attributes']);


        $this->page->updatePage([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
        ], $id);

        Session::put('msg', 'Cập nhật trang thành công');

        redirect(route('admin.pages.edit', ['id' => $id]));
    }

    public function delete($id)
    {
        $this->page->delete(condition: "id = ?", data: [$id]);
        Session::put('msg', 'Xóa trang thành công');

        redirect(route('admin.pages.index'));
    }

    public function deletes(Request $request)
    {
        if ($request->ids) {
            $ids = $request->ids;

            $condition = "id IN($ids)";
            $this->page->delete(condition: $condition);
            Session::put('msg', 'Xóa trang thành công');

        }

        redirect(route('admin.pages.index'));
    }



}