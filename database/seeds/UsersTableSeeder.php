<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nbUsers = (int)$this->command->ask('How many do you want to generate ? ',10);
        $users = factory(App\User::class, $nbUsers)->create();
    }
}
