<?php

namespace App\Services\Post\Tasks;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostListTask

{
    protected $model;

    public function __construct(Post $postModel)
    {
        $this->model = $postModel;
    }

    public function handle()
    {
        $posts = $this->model->with(['user'])->orderBy('id', 'Asc')->paginate(100);

        $data = [
            'status' => true,
            'message' => 'Get List Posts Successfully.',
            'data' => $posts,
        ];

        return $data;
    }
}
