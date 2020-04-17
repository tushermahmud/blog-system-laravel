<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //reset the table by truncate method
        DB::table('users')->truncate();
        //generate 3 users
        $faker=Factory::create();
        DB::table('users')->insert([
        	[

        	"name"		=>"sazzad mahmud",
            "slug"      =>"sazzad-mahmud",
        	"email"		=>"sazzadmahmud@gmail.com",
        	"password"	=>bcrypt('secret'),
            "bio"       =>$faker->text(rand(250,300))
        	],
    		[

        	"name"		=>"sazid mahmud",
            "slug"      =>"sazid-mahmud",
        	"email"		=>"sazidmahmud@gmail.com",
        	"password"	=>bcrypt('secret123'),
            "bio"       =>$faker->text(rand(250,300))
       	 	],
    		[

        	"name"		=>"azaj mahmud",
            "slug"      =>"azaj-mahmud",
        	"email"		=>"azajmahmud@gmail.com",
        	"password"	=>bcrypt('secret2fdf'),
            "bio"       =>$faker->text(rand(250,300))
        	]
    	]);
    }
}
