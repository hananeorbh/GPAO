<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
       
        $this->call(ProductionsTableSeeder::class);
        $this->call(LignesTableSeeder::class);
        $this->call(AteliersTableSeeder::class);
        $this->call(CatalogsTableSeeder::class);
        
        $this->call(ArretsTableSeeder::class);
        $this->call(ConsommationsIpTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
    }
}
