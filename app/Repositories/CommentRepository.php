<?php

namespace App\Repositories;

use App\Comment;

class CommentRepository extends AbstractRepository
{
    /** @var Comment $model Model物件  */
    protected $model;

    /**
     * PostRepository constructor.
     * @param $model
     */
    public function __construct(Comment $model)
    {
        $this->model = $model;
        parent::__construct();
    }
}