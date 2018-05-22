<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}
