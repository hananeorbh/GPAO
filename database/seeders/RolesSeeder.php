<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $responsable = Role::create(['name' => 'responsable']);
        $operateur = Role::create(['name' => 'operateur']);


        $voir_utilisateur = Permission::create(['name' => 'voir utilisateur']);
        $voir_prods = Permission::create(['name' => 'voir prods']);
        $calcul = Permission::create(['name' => 'calcul']);
        $voir_repport = Permission::create(['name' => 'voir repport']);
        $voir_conso = Permission::create(['name' => 'voir conso']);
        $voir_ateliers = Permission::create(['name' => 'voir ateliers']);
        $voir_lignes = Permission::create(['name' => 'voir lignes']);
        $voir_arrets = Permission::create(['name' => 'voir arrets']);
        $voir_catalogue = Permission::create(['name' => 'voir catalogue']);
        $voir_planning = Permission::create(['name' => 'voir planning']);
        $voir_cadence = Permission::create(['name' => 'voir cadence']);
        $voir_recette= Permission::create(['name' => 'voir recette']);
        $gestion_articles= Permission::create(['name' => 'gestion articles']);
        $menu_admin= Permission::create(['name' => 'menu admin']);
        $menu_responsable= Permission::create(['name' => 'menu responsable']);
        $menu_operateur= Permission::create(['name' => 'menu operateur']);
        
        
        
        $admin->syncPermissions([$voir_utilisateur->name, $voir_prods->name, $calcul->name, $voir_repport->name, $voir_conso->name,$voir_ateliers->name,$voir_lignes->name,$voir_arrets->name,$voir_catalogue->name, $voir_planning->name,$voir_cadence->name,$voir_recette->name, $gestion_articles->name,$menu_operateur->name,$menu_responsable->name,$menu_admin->name]);
        $responsable->syncPermissions([$voir_prods->name, $calcul->name, $voir_repport->name,$voir_planning->name,$voir_recette->name, $gestion_articles->name,$voir_conso->name,$voir_arrets->name,$menu_responsable->name,$menu_operateur->name]);
        $operateur->syncPermissions([$voir_prods->name,$voir_conso->name,$voir_arrets->name,$menu_operateur->name]);

    }
}