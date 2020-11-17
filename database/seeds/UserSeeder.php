<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Merchant',
            'username' => 'merchant',
            'fullname' => 'Merchant Full',
            'status' => '0',
            'email' => 'merchant@kawankoding.id',
            'password' => md5('12345678'),
        ]);

        $admin->assignRole('merchant');

        $user = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'fullname' => 'Admin Full',
            'status' => '1',
            'email' => 'admin@kawankoding.id',
            'password' => md5('12345678'),
        ]);

        $user->assignRole('admin');

        $operation = User::create([
            'name' => 'Operation',
            'username' => 'operation',
            'fullname' => 'Operation Full',
            'status' => '0',
            'email' => 'operation@kawankoding.id',
            'password' => md5('12345678'),
        ]);

        $operation->assignRole('operation');
    }
}
