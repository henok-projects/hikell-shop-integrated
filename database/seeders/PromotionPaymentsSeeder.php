<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PromotionPaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $payments = [
            [
                48,
                3000,
            ],
            [
                24,
                2500
            ],
            [
                20,
                2000
            ],
            [
                16,
                1500
            ],
            [
                12,
                1000
            ],
            [
                8,
                700
            ]
        ];


        foreach ($payments as $payment) {
            DB::table('payment_datas')->insert([
                'type'          => $payment[0],
                'amount'        => $payment[1],
                'service'        => 'promotion',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }
    }
}
