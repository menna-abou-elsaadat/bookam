<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RuntimeException;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/countries.json');

        if (! File::exists($path)) {
            throw new RuntimeException('The ISO country data file is missing.');
        }

        $countries = json_decode(File::get($path), true, flags: JSON_THROW_ON_ERROR);
        $now = now();

        DB::table('countries')->upsert(
            array_map(fn (array $country): array => [
                ...$country,
                'created_at' => $now,
                'updated_at' => $now,
            ], $countries),
            ['iso2'],
            ['name_en', 'name_ar', 'iso3', 'numeric_code', 'updated_at'],
        );
    }
}
