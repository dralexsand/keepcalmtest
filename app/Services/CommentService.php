<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class CommentService
{

    /**
     * @param int $postId
     * @return array
     * @throws \Exception
     */
    public function getRandomComments(int $postId): array
    {
        $comments = Comment::select('body')
            ->where('post_id', '=', $postId)
            ->get();

        $comments = json_decode(json_encode($comments), true);
        $commentsRandom = $this->getArrayRandomNumbers($comments);
        $commentsRandom[5] = $commentsRandom[random_int(0, 4)];

        return $commentsRandom;
    }

    /**
     * @param array $data
     * @param int $ones
     * @return array
     * @throws \Exception
     */
    public function getArrayRandomNumbers(array $data, int $ones = 5): array
    {
        $randomArray = [];

        $i = 0;
        while ($i < $ones) {
            $len = sizeof($data);
            $index = random_int(0, $len - 1);
            $randomArray[] = $data[$index]['body'];
            array_splice($data, 1, 1);
            $i++;
        }

        return $randomArray;
    }

    /**
     * @param string $searchText
     * @param int $postId
     * @return Collection
     */
    public function getCommentsSearch(string $searchText, int $postId): Collection
    {
        return Comment::with(['user'])
            ->whereHas('user', function ($q) use ($searchText) {
                $q->where('email', 'LIKE', '%' . $searchText . '%');
            })
            ->where('post_id', '=', $postId)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @param int $postId
     * @param int $offset
     * @return Collection
     */
    public function getCommentsWithLimit(int $postId, int $offset): Collection
    {
        $limit = getenv('SHOW_MORE_LIMIT');

        return Comment::with('user')
            ->where('post_id', '=', $postId)
            ->limit($limit)
            ->offset($offset)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @param $comment
     * @return string
     */
    public function getDecorationComment($comment): string
    {
        return "<div class='display-comment'>
        <strong>{$comment->user->email}</strong><br>
        <span>{$comment->body}</span><br>
        <i class='small'>{$comment->created_at}</i><hr>
        </div>";
    }


    /**
     * @param $comments
     * @return JsonResponse
     */
    public function buildCommentsList($comments): JsonResponse
    {
        if ($comments) {
            $commentsBlock = "";

            foreach ($comments as $comment) {
                $commentsBlock .= $this->getDecorationComment($comment);
            }

            if ($commentsBlock) {
                return response()->json([
                    'status' => true,
                    'data' => $commentsBlock,
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => 'Ошибка ajax'
                ], 200);
            }
        } else {
            return response()->json([
                'status' => false,
                'errors' => 'Ошибка ajax'
            ], 200);
        }
    }

    public function buildSingleComment($comment): JsonResponse
    {
        $commentsBlock = $this->getDecorationComment($comment);

        if ($commentsBlock) {
            return response()->json([
                'status' => true,
                'data' => $commentsBlock
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'errors' => 'Ошибка ajax'
            ], 200);
        }
    }

}
