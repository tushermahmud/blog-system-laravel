<?php

use Illuminate\Database\Seeder;

class CatagoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catagories')->truncate();
        //generate 3 users
        DB::table('catagories')->insert([
        	[

        	"title"		=>"Web Development",
        	"slug"		=>"web-development"

        	],
    		[

        	"title"		=>"Web Design",
        	"slug"		=>"web-design"

       	 	],
    		[

        	"title"		=>"Codeignter Development",
        	"slug"		=>"codeignter-development"

        	],
        	[

        	"title"		=>"Laravel Development",
        	"slug"		=>"laravel-development"

        	],
        	[

        	"title"		=>"Symphony Development",
        	"slug"		=>"Symphony-development"

        	],
            [

            "title"     =>"Uncategorized",
            "slug"      =>"Uncategorized"

            ]
    	]);
    }
}
