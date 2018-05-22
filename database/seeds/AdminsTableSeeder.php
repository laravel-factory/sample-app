<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Admin::class)->create([
            'email' => 'admin@test.com',
            'username' => 'admin',
            'password' => bcrypt('123456'),
        ]);
    }
}
