<?php

namespace App\Controllers\Admin;

use Core\Request;
use Core\Session;
use App\Core\Auth;
use Carbon\Carbon;
use Core\Validator;
use App\Models\Post;
use Core\Controller;
use App\Core\Message;
use App\Models\Category;

class PostController extends Controller
{
    private $post = null;
    private $category = null;


    public function __construct()
    {
        $this->post = new Post();
        $this->category = new Category();
    }

    public function index()
    {
        $pageTitle = Message::$pageTitle['posts']['lists'];
        $msg = Session::getFlash('msg');

        $posts = $this->post->getposts();

        $links = $this->post->links($posts, true);

        $posts = $posts['data'];

        $action = route('admin.posts.deletes');

        $this->view('admin/posts/lists', compact('pageTitle', 'msg', 'posts', 'action', 'links'));
    }

    public function add()
    {
        $pageTitle = Message::$pageTitle['posts']['add'];
        $msg = Session::getFlash('msg');
        $categories = $this->category->getAllCategories();

        $this->view('admin/posts/add', compact('pageTitle', 'msg', 'categories'));
    }

    public function handleAdd(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'content' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'required'
        ], [
            'required' => Message::$messages['posts']['validate']['required'],
            'unique' => Message::$messages['posts']['validate']['unique'],
        ], Message::$messages['posts']['attributes']);

        $this->post->create(attributes: [
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'thumbnail' => $request->thumbnail,
            'excerpt' => $request->excerpt,
            'user_id' => Auth::user()->id,
            'tags' => $request->tags
        ]);

        Session::put('msg', 'Thêm bài viết thành công');

        redirect(route('admin.posts.index'));
    }

    public function edit($id)
    {
        $pageTitle = Message::$pageTitle['posts']['edit'];
        $msg = Session::getFlash('msg');

        $post = $this->post->getPost('id', $id);

        $categories = $this->category->getAllCategories();

        $this->view('admin/posts/edit', compact('pageTitle', 'msg', 'post', 'categories'));
    }

    public function handleEdit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'content' => 'required',
            'category_id' => 'required',
            'thumbnail' => 'required'
        ], [
            'required' => Message::$messages['posts']['validate']['required'],
            'unique' => Message::$messages['posts']['validate']['unique'],
        ], Message::$messages['posts']['attributes']);

        $this->post->updatePost([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'thumbnail' => $request->thumbnail,
            'excerpt' => $request->excerpt,
            'tags' => $request->tags
        ], $id);

        Session::put('msg', 'Cập nhật bài viết thành công');

        redirect(route('admin.posts.edit', ['id' => $id]));
    }

    public function delete($id)
    {
        $this->post->delete(condition: "id = ?", data: [$id]);
        Session::put('msg', 'Xóa bài viết thành công');

        redirect(route('admin.posts.index'));
    }

    public function deletes(Request $request)
    {
        if ($request->ids) {
            $ids = $request->ids;

            $condition = "id IN($ids)";
            $this->post->delete(condition: $condition);
            Session::put('msg', 'Xóa bài viết thành công');

        }

        redirect(route('admin.posts.index'));
    }



}
