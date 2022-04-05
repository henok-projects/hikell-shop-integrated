<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        $movieCategories = [
            'Action & Adventure',
            'Classic',
            'Comedies',
            'Dramas',
            'Horror',
            'Romantic',
            'Sci-Fi & Fantasy',
            'Sports',
            'Thrillers',
            'Documentaries',
            'Teen',
            'Children & Family',
            'Anime',
            'Independent',
            'Foreign',
            'Music',
            'Christmas',
            'Cartoon',
            'Others'
        ];

        $nonmovieCategories = [
            'Film & Animation',
            'Autos & Vehicles',
            'Music',
            'Pets & Animal',
            'Sports',
            'Travel & Events',
            'Gaming',
            'People & Blogs',
            'Comedy',
            'Entertainment',
            'News & Politics',
            'Howto & Style',
            'Education',
            'Science & Technology',
            'Nonprofits & Activism',
            'Others'
        ];

        $hgtCategories = [
            'Comedy',
            'Choirs',
            'Dog Acts',
            'Sports',
            'Music',
            'Gaming',
            'Water Acts',
            'Acrobats',
            'Impressionists',
            'Alternative Acts',
        ];
        foreach ($movieCategories as $videoCategory) {
            DB::table('categories')->insert([
                'name'          => $videoCategory,
                'for'           => "movie",
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }

        foreach ($nonmovieCategories as $videoCategory) {
            DB::table('categories')->insert([
                'name'          => $videoCategory,
                'for'           => "non-movie",
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }

        foreach ($hgtCategories as $videoCategory) {
            DB::table('categories')->insert([
                'name'          => $videoCategory,
                'for'           => "hgt",
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }
    }
}
