<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
          'name' => 'Andreina del carmen',
          'email' => 'adpirela@misena.edu.co',
          'password'=>bcrypt('12345678')
      ])->assignRole('Admin');
        //User::factory(1)->create();

    }
}
