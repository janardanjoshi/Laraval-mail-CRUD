<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Emp;
use Faker\Factory as Faker;

class EmpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=1; $i <= 200; $i++) { 
            $emp = new Emp;
            $emp->name = $faker->name;
            $emp->email = $faker->email;
            $emp->password = md5($faker->password);
            $emp->address = $faker->address;
            $emp->gender = 'M';
            $emp->dob = $faker->date;
            $emp->save();
        }
    }
}
