<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreatePostRequest;
use App\Services\Post\Tasks\PostCreateTask;
use App\Services\Post\Tasks\PostListTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function listPosts()
    {
        try {
            $posts = resolve(PostListTask::class)->handle();

            return response()->success($posts);
        } catch (Exception $exception) {

            return response()->exception($exception);
        }
    }

    public function createPost(CreatePostRequest $request)
    {
        $data = $request->only([
            'content',
            'user_id',
        ]);

        try {
            DB::beginTransaction();

            $post = resolve(PostCreateTask::class)->handle($data);

            DB::commit();
            return response()->success($post);
        } catch (Exception $exception) {
            DB::rollBack();

            return response()->exception($exception);
        }
    }
}
