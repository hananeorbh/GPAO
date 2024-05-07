<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArretsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('arrets')->delete();
        
        \DB::table('arrets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'Arr-001',
                'masqué' => 0,
                'duration' => 5,
                'famille' => 'organisationnel',
                'sfamille' => 'gréve du personnelle',
                'class' => 'ressource humaine',
                'impact' => '100%',
                'production_id' => 1,
                'catalog_id' => 1,
                'created_at' => '2024-04-28 13:16:38',
                'updated_at' => '2024-04-28 13:16:38',
            ),

            1 => 
            array (
                'id' => 2,
                'code' => 'Arr-002',
                'masqué' => 0,
                'duration' => 25,
                'famille' => 'Qualité',
                'sfamille' => 'Non-conformité des produits',
                'class' => 'Contrôle qualité',
                'impact' => '60%',
                'production_id' => 1,
                'catalog_id' => 1,
                'created_at' => '2024-04-28 13:16:38',
                'updated_at' => '2024-04-28 13:16:38',
            ),

            2 => 
            array (
                'id' => 3,
                'code' => 'Arr-003',
                'masqué' => 0,
                'duration' => 10,
                'famille' => 'organisationnel',
                'sfamille' => 'Manifestation des employés',
                'class' => 'Opérations',
                'impact' => '90%',
                'production_id' => 2,
                'catalog_id' => 1,
                'created_at' => '2024-04-28 13:16:38',
                'updated_at' => '2024-04-28 13:16:38',
            ),
            4 => 
            array (
                'id' => 4,
                'code' => 'Arr-004',
                'masqué' => 0,
                'duration' => 8,
                'famille' => 'Technique',
                'sfamille' => 'Maintenance préventive',
                'class' => 'Maintenance',
                'impact' => '50%',
                'production_id' => 2,
                'catalog_id' => 1,
                'created_at' => '2024-04-28 13:16:38',
                'updated_at' => '2024-04-28 13:16:38',
            ),
        ));
        
        
    }
}