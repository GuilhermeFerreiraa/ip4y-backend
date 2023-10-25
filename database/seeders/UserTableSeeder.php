<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
 /**
  * Run the database seeds.
  */
 public function run(): void
 {
  DB::table("users")->insert([
   'document' => '1234567890',
   'name' => 'João',
   'lastName' => 'da Silva',
   'email' => 'joao@email.com',
   'birthdate' => '1990-12-01',
   'gender' => 'Masculino'
  ]);
 }
}
