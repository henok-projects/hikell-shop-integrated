<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            array('apply-ek','basic-ek', '7.99'),
            array('launch-site', 'basic', '19.99'),
            array('launch-site', 'standard', '48.99'),
            array('launch-site', 'premium', '98.99'),
            array('goldenbuzzer', 'gold1', '2.57'),
            array('goldenbuzzer', 'gold2', '8.99'),
            array('goldenbuzzer', 'gold3', '19.57'),
            

        ];
        foreach ($plans as $plan) {
            DB::table('payment_plans')->insert([
                'service'       => $plan[0],
                'plan'          => $plan[1],
                'amount'        => $plan[2],
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }
    }
}
