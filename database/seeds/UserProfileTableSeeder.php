<?php

use Illuminate\Database\Seeder;
use App\UserProfile;

class UserProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UserProfile::class, 50)->create();
    }
}
