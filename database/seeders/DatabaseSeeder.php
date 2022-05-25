<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call(EstadoSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(ContactoSeeder::class);
        $this->call(GiroSeeder::class);
        $this->call(ClienteSeeder::class);
    }
}
