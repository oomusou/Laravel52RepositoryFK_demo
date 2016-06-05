<?php

use App\Repositories\PostRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function 先新增Post再新增一筆Comment()
    {
        /** arrange */
        //<editor-fold desc="Expected">
        $expectedPost = [
            'title'       => 'Post1 title',
            'description' => 'Post1 description',
            'content'     => 'Post1 content'
        ];

        $expectedComment = [
            'name'    => 'Sam',
            'email'   => 'oomusou@gmail.com',
            'comment' => "Sam's comment",
        ];
        //</editor-fold>

        $target = app(PostRepository::class);

        /** act */
        $target->create($expectedPost)
            ->comments()
            ->create($expectedComment);

        /** assert */
        $this->seeInDatabase('posts', $expectedPost);
        $this->seeInDatabase('comments', $expectedComment);
    }

    /** @test */
    public function 先新增Post再新增多筆Comment()
    {
        /** arrange */
        //<editor-fold desc="Expected">
        $expectedPost = [
            'title'       => 'Post1 title',
            'description' => 'Post1 description',
            'content'     => 'Post1 content'
        ];

        $expectedComment = [
            [
                'name'    => 'Sam',
                'email'   => 'oomusou@gmail.com',
                'comment' => "Sam's comment"
            ],
            [
                'name'    => 'Sunny',
                'email'   => 'sunny@gmail.com',
                'comment' => "Sunny's comment"
            ],
        ];
        //</editor-fold>

        $target = app(PostRepository::class);

        /** act */
        $post = $target->create($expectedPost);

        collect($expectedComment)
            ->each(function ($value) use ($post) {
                $post->comments()->create($value);
            });

        /** assert */
        $this->seeInDatabase('posts', $expectedPost);
        $this->seeInDatabase('comments', $expectedComment[0]);
        $this->seeInDatabase('comments', $expectedComment[1]);
    }
}
