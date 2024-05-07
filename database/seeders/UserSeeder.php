<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $admin  = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->password = Hash::make('adminadmin');
        $admin->save();
        $admin->assignRole('admin');

        $operateur  = new User();
        $operateur->name = 'operateur';
        $operateur->email = 'operateur@operateur.com';
        $operateur->password = Hash::make('operateur');
        $operateur->save();
        $operateur->assignRole('operateur');

        $responsable  = new User();
        $responsable->name = 'responsable';
        $responsable->email = 'responsable@responsable.com';
        $responsable->password = Hash::make('responsable');
        $responsable->save();
        $responsable->assignRole('responsable');
    }
}