<?php

use Illuminate\Database\Seeder;
use App\posts;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        for ($i=0; $i < 100; $i++) { 
            # code...
        $post = new posts();
        $post->post_id = $i;
        $post->user_id = $i;
        $post->title = 'title'.$i;
        $post->content = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem perferendis, optio dolores expedita voluptas pariatur eligendi. Nobis facere ducimus iste vero ut natus, vitae, commodi unde consequuntur maiores ab veniam.';
        $post->type = 'type';
        $post->age = 20;
        $post->experience = 'abc';
        $post->salary = 100;
        $post->gender = 'nam';
        $post->address = 'HN';
        $post->views = 10;
        $post->save();
        }
    }
}
