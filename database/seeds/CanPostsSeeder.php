<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Can_post;
class CanPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("can_posts")->insert([
        	"can_post"=>1
        ]);
    }
}
