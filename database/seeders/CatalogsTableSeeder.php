<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CatalogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('catalogs')->delete();
        
        \DB::table('catalogs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'CT-001',
                'famille' => 'organisationnel',
                'sfamille' => 'gréve du personnelle ',
                'class' => 'ressource humaine',
                'impact' => '100%',
                'created_at' => '2024-04-27 20:16:57',
                'updated_at' => '2024-04-27 20:16:57',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'CT-002',
                'famille' => 'organisationnel',
                'sfamille' => 'Manifestation des employés',
                'class' => 'Opérations',
                'impact' => '90%',
                'created_at' => '2024-04-27 20:16:57',
                'updated_at' => '2024-04-27 20:16:57',
            ),

            2 => 
            array (
                'id' => 3,
                'code' => 'CT-003',
                'famille' => 'Qualité',
                'sfamille' => 'Non-conformité des produits',
                'class' => 'Contrôle qualité',
                'impact' => '60%',
                'created_at' => '2024-04-27 20:16:57',
                'updated_at' => '2024-04-27 20:16:57',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'CT-004',
                'famille' => 'Technique',
                'sfamille' => 'Maintenance préventive',
                'class' => 'Maintenance',
                'impact' => '50%',
                'created_at' => '2024-04-27 20:16:57',
                'updated_at' => '2024-04-27 20:16:57',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'CT-005',
                'famille' => 'Technique',
                'sfamille' => ' Panne électrique',
                'class' => 'Équipements ',
                'impact' => '20%',
                'created_at' => '2024-04-27 20:16:57',
                'updated_at' => '2024-04-27 20:16:57',
            ),
        ));
        
        
    }
}