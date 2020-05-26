<?php

use App\Profile;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class AdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name'=> 'customer',
            'description'=>'customer role'
        ]);
        $role = Role::create([
            'name'=> 'admin',
            'description'=>'admin role'
        ]);
        $user = User::create([
            'email'=> 'user@email.com',
            'password'=> bcrypt('secret'),
            'role_id'=>$role->id,
        ]);
        $role = Profile::create([
            'user_id'=> $user->id,
        ]);
    }
}
