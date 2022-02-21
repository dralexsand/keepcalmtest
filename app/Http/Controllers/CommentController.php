<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ajax\CommentSearchRequest;
use App\Http\Requests\Ajax\CommentSelectRequest;
use App\Http\Requests\Ajax\CommentStoreRequest;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    protected CommentService $commentService;

    public function __construct()
    {
        $this->commentService = new CommentService();
    }

    /**
     * @param CommentStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CommentStoreRequest $request): RedirectResponse
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        //$input['user_id'] = random_int(1, 10);
        Comment::create($input);

        return back();
    }

    /**
     * @param CommentStoreRequest $request
     * @return JsonResponse
     */
    public function ajaxStore(CommentStoreRequest $request): JsonResponse
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        //$input['user_id'] = random_int(1, 10);
        $comment = Comment::create($input);

        return $this->commentService->buildSingleComment($comment);
    }

    /**
     * @param CommentSearchRequest $request
     * @return JsonResponse
     */
    public function searchComment(CommentSearchRequest $request): JsonResponse
    {
        $all = $request->all();
        $postId = $all['post_id'];
        $searchText = $all['search'];
        $comments = $this->commentService->getCommentsSearch($searchText, $postId);

        return $this->commentService->buildCommentsList($comments);
    }

    /**
     * @param CommentSelectRequest $request
     * @return JsonResponse
     */
    public function showMore(CommentSelectRequest $request): JsonResponse
    {
        //$comments = Comment::paginate(3);
        $limit = getenv('SHOW_MORE_LIMIT');

        $all = $request->all();
        $postId = $all['post_id'];
        $offset = $all['offset'];
        //$comments = Comment::limit($limit)->offset($offset)->get();
        $comments = $this->commentService->getCommentsWithLimit($postId, $offset);

        return $this->commentService->buildCommentsList($comments);
    }


    /**
     * @param CommentSelectRequest $request
     * @return JsonResponse
     */
    public function ajaxSelect(CommentSelectRequest $request): JsonResponse
    {
        $all = $request->all();
        $postId = $all['post_id'];
        $offset = $all['offset'];
        //$offset = (int)$offset;
        $comments = $this->commentService->getCommentsWithLimit($postId, $offset);

        return $this->commentService->buildCommentsList($comments);
    }

}
