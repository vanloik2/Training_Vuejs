<?php

namespace App\Services\Post\Tasks;

use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostCreateTask

{
    protected $model;

    public function __construct(Post $postModel)
    {
        $this->model = $postModel;
    }

    public function handle($request)
    {
        $post = $this->model->create($request);

        $data = [
            'status' => true,
            'message' => 'Create Post Successfully.',
            'data' => $post,
        ];

        return $data;
    }
}
