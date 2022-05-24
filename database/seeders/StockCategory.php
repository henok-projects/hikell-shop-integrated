<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StockCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stock_categories')->truncate();
        $stockCategories = [
            'Electronics',
            'Shoose',
            'Clothes',
            'Food',
            'machine',
            'Others'
        ];
       foreach ($stockCategories as $stockCategory) {
            DB::table('stock_categories')->insert([
                'name'          => $stockCategory,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }

    }
}
