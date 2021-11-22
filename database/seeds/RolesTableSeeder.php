<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'         => 1,
                'title'      => 'Admin',
                'created_at' => '2019-09-15 06:09:29',
                'updated_at' => '2019-09-15 06:09:29',
            ],
            [
                'id'         => 2,
                'title'      => 'Надзорное ведомство',
                'created_at' => '2019-09-15 06:09:29',
                'updated_at' => '2019-09-15 06:09:29',
            ],
            [
                'id'         => 3,
                'title'      => 'Республика',
                'created_at' => '2019-09-15 06:09:29',
                'updated_at' => '2019-09-15 06:09:29',
            ],
            [
                'id'         => 4,
                'title'      => 'Область',
                'created_at' => '2019-09-15 06:09:29',
                'updated_at' => '2019-09-15 06:09:29',
            ],
            [
                'id'         => 5,
                'title'      => 'Район',
                'created_at' => '2019-09-15 06:09:29',
                'updated_at' => '2019-09-15 06:09:29',
            ],
        ];

        Role::insert($roles);
    }
}
