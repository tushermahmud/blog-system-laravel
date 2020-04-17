<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('permissions')->truncate();

   		$crudPost                =new Permission();
        $crudPost->name          ='crud-post';
        $crudPost->save();


        $updateOthersPost        =new Permission();
        $updateOthersPost->name  ='update-others-post';
        $updateOthersPost->save();


        $deleteOthersPost        =new Permission();
        $deleteOthersPost->name  ='delete-others-post';
        $deleteOthersPost->save();


        $crudCategory             =new Permission();
        $crudCategory->name		  ='crud-category';
        $crudCategory->save();


        $crudUser                 =new Permission();
        $crudUser->name           ='crud-user';
        $crudUser->save();


        $admin   =Role::where('name','admin')->first();
        $editor  =Role::where('name','editor')->first();
        $author  =Role::where('name','author')->first();

        $admin->detachPermissions([$crudPost,$updateOthersPost, $deleteOthersPost,$crudCategory ,$crudUser]);
        $admin->attachPermissions([$crudPost,$updateOthersPost, $deleteOthersPost,$crudCategory ,$crudUser]);


        $editor->detachPermissions([$crudPost,$updateOthersPost, $deleteOthersPost,$crudCategory]);
        $editor->attachPermissions([$crudPost,$updateOthersPost, $deleteOthersPost,$crudCategory]);


        $author->detachPermission($crudPost);
        $author->attachPermission($crudPost);
    }
}
