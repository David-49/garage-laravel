<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Comment;
use App\Models\Announcement;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory()
            ->count(6)
            ->for(Announcement::all()->random())
            ->for(User::all()->random())
            ->create();
    }
}
