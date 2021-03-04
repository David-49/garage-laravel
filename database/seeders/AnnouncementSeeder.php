<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Comment;
use App\Models\Announcement;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Announcement::factory()
            ->count(40)
            ->has(Comment::factory()->count(5))
            ->for(User::all()->random())
            ->create();
    }
}
