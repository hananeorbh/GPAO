<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LignesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lignes')->delete();
        
        \DB::table('lignes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'LI-001',
                'name' => 'ligne 1',
                'atelier_id' => 1,
                'created_at' => '2024-04-27 20:13:14',
                'updated_at' => '2024-04-27 20:13:14',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'LI-002',
                'name' => 'ligne 2',
                'atelier_id' => 1,
                'created_at' => '2024-04-27 20:13:39',
                'updated_at' => '2024-04-27 20:13:39',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'LI-003',
                'name' => 'ligne 3',
                'atelier_id' => 1,
                'created_at' => '2024-04-27 20:13:39',
                'updated_at' => '2024-04-27 20:13:39',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'LI-004',
                'name' => 'ligne 1',
                'atelier_id' => 2,
                'created_at' => '2024-04-27 20:13:39',
                'updated_at' => '2024-04-27 20:13:39',
            ),

            4 => 
            array (
                'id' => 5,
                'code' => 'LI-005',
                'name' => 'ligne 2',
                'atelier_id' => 2,
                'created_at' => '2024-04-27 20:13:39',
                'updated_at' => '2024-04-27 20:13:39',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 'LI-006',
                'name' => 'ligne 3',
                'atelier_id' => 2,
                'created_at' => '2024-04-27 20:13:39',
                'updated_at' => '2024-04-27 20:13:39',
            ),
        ));
        
        
    }
}