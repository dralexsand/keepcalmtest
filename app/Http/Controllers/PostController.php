<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Services\CommentService;


class PostController extends Controller
{

    protected CommentService $commentService;

    public function __construct()
    {
        $this->commentService = new CommentService();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Exception
     */
    public function index()
    {
        $postId = 1;

        return view('pages.post', [
            'post' => Post::find($postId),
            'phrases' => $this->commentService->getRandomComments($postId)
        ]);
    }


}
