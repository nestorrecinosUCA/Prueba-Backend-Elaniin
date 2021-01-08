<?php

use App\Models\User as AppUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alexander',
            'telephone' => 78900987, 
            'username' => 'alex123',
            'dob' => '2001-10-10',
            'email' => 'alex123@prueba.com',
            'password' => bcrypt('Nestor_10')
        ]);
        
    }
}
