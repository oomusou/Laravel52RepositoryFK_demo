<?php

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function 測試連線()
    {
        /** arrange */
        $expected = 0;

        /** act */
        $actual = Post::all();

        /** assert */
        $this->assertCount($expected, $actual);
    }
}
