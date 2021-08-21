<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //add role
        $roles = [
            [
                'name' => 'superadmin',
                'display_name' => 'Master',
                'description' => 'Hak akses untuk semua fitur',
            ],
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Hak akses untuk fitur admin',
            ],
        ];
        foreach ($roles as $key => $value) {
                    Role::create($value);
                }
        //add user
        $users = [
            [
                'name' => 'Master',
                'email' => 'superadmin@local.com',
                'password' => bcrypt('123123'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@local.com',
                'password' => bcrypt('123123'),
            ],
        ];
        $n=1;
        foreach ($users as $key => $value) {
            $user=User::create($value);
            $user->attachRole($n);
            $n++;
        }
    }
}
