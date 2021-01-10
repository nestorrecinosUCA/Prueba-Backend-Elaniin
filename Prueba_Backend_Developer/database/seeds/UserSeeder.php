<?php

use App\Models\User as AppUser;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creando dos usuarios
        $newUser = AppUser::create([
            'name' => 'Alexander',
            'telephone' => 78900987, 
            'username' => 'alex123',
            'dob' => '2001-01-01',
            'email' => 'alex123@prueba.com',
            'password' => bcrypt('Alexander123')
        ]);

        $newUser = AppUser::create([
            'name' => 'Néstor',
            'telephone' => 79865789, 
            'username' => 'nestor123',
            'dob' => '2001-10-10',
            'email' => 'nestor123@prueba.com',
            'password' => bcrypt('Nestor123')
        ]);
    }
}
