<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Add categories
        $this->call(categorySeeder::class);
        $this->call(SupportSeeder::class);
        $this->call(PromotionPaymentsSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(StockCategory::class);
        // exit();
        // Add users
        DB::table('users')->delete();
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            do {
                $user_id = Str::random(15);
            } while (User::where('user_id', $user_id)->first());

            $username = $index == 1 ? "admin" : $faker->username;
            if ($username != "admin")
                $username = $index == 2 ? "aron" : $faker->username;

            $email = $index == 1 ? "admin@admin.com" : $faker->email;
            if ($email != "admin@admin.com")
                $email = $index == 2 ? "aron@aron.com" : $faker->email;

            DB::table('users')->insertGetId([
                'user_id'    => $user_id,
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'username'   => $username,
                'email'      => $email,
                'admin'      => $index == 1 ? '1' : '0',
                'gender'     => 'm',
                'country'     => 'ET',
                'phone_code'     => 'ET',
                'phone_number' => '917171717',
                'birth_date'     => '1999-04-03',
                'password'  => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}