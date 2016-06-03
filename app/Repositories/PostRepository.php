<?php

namespace App\Repositories;

use App\Post;

class PostRepository extends AbstractRepository
{
    /** @var Post $model Model物件 */
    protected $model;

    /**
     * PostRepository constructor.
     * @param $model
     */
    public function __construct(Post $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}