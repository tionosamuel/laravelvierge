<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Role::create([
        'libele'=>'Adminstrateur'
       ]);

       Role::create([
        'libele'=>'Manager'
       ]);

       Role::create([
        'libele'=>'Client'
       ]);
}

}
