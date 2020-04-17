<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reseting the posts table by truncate method
        DB::table('posts')->truncate();
        //inserting data
        $posts=[];

        $faker=Faker\factory::create();
        for($i=0;$i<10;$i++){
        	$image='Post_image_'.rand(1,5).'.jpg';
        	$date=date('Y-m-d H:m:s',strtotime("2018-12-17 06:00:00 + {$i} days"));
        	$posts[]=[

        		"author_id"		=>rand(1,3),
        		"title"			=>$faker->sentence(rand(8,12)),
        		"excerpt"		=>$faker->text(rand(250,300)),
        		"body"			=>$faker->paragraph(rand(10,15)),
        		"slug"			=>$faker->slug(),
        		"image"			=>$image,
        		"created_at"	=>$date,
        		"updated_at"	=>$date,
                "catagory_id"   =>rand(1,5),
                "view_count"    =>rand(1,10)*10,
                "published_at"  =>rand(0,1)
        	];
        }
        DB::table('posts')->insert($posts);

    }
}
