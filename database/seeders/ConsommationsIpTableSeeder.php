<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConsommationsIpTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('consommations_ip')->delete();
        
        \DB::table('consommations_ip')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'Co-001',
                'type' => 'papier film',
                'quantité' => 60,
                'unité' => 'rouleau',
                'production_id' => 1,
                'created_at' => '2024-04-28 13:18:19',
                'updated_at' => '2024-04-28 13:18:19',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'Co-002',
                'type' => 'film plastique imprimer ',
                'quantité' => 80,
                'unité' => 'bobines',
                'production_id' => 1,
                'created_at' => '2024-04-28 13:18:19',
                'updated_at' => '2024-04-28 13:18:19',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'Co-003',
                'type' => 'plastique en PET',
                'quantité' => '800',
                'unité' => 'kg ',
                'production_id' => 2,
                'created_at' => '2024-04-28 13:18:19',
                'updated_at' => '2024-04-28 13:18:19',
            ),
        ));
        
        
    }
}