<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Posts;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('posts')->truncate();
        Schema::enableForeignKeyConstraints();

        Posts::create([
            'title' => 'Prueba de titulo',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque est nibh, rhoncus at posuere rutrum, dapibus sed sapien. Vestibulum aliquam porttitor nisi, eu blandit nisl rutrum quis. Duis vitae egestas lorem. Morbi molestie luctus tellus et dictum. Nam velit libero, porttitor ut gravida consequat, dignissim quis quam. Aliquam erat volutpat. Morbi sed rutrum metus, sed interdum purus. Aliquam cursus est non metus efficitur venenatis. Nunc pharetra ac nibh vel porttitor. Aliquam sed nibh at purus lobortis vehicula. Nam imperdiet nibh non neque ultricies, et consectetur nulla ultrices.',
            'status' => 1,
            'user_id' => 1
        ]);
    }
}
