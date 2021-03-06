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
            'content' => 'Lorem ipsum dolor sit amet.',
            'status' => 1,
            'user_id' => 1
        ]);
    }
}
