<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'TestPost1',
            'body' => 'テスト投稿1です',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1
        ]);
        DB::table('posts')->insert([
            'title' => 'Test_image',
            'body' => '画像投稿のテストです',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1,
            'image_path' => 'https://res.cloudinary.com/dsrf740el/image/upload/v1670912678/uoumythhrizxcgghlfmv.jpg'
        ]);
        DB::table('posts')->insert([
            'title' => 'Test_LongString',
            'body' => '長文投稿のテストです。テストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'user_id' => 1
        ]);
        //
    }
}
