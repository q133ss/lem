<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('project_types')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('regions')->insert([
            [ 'name' => '{"ru": "Северо-кавказский федеральный округ", "en": "North Caucasian Federal District"}'],
            [ 'name' => '{"ru": "Приволжский федеральный округ", "en": "Volga Federal District"}'],
            [ 'name' => '{"ru": "Цетральный федеральный округ", "en": "Central Federal District"}'],
            [ 'name' => '{"ru": "Сибирский федеральный округ", "en": "Siberian Federal District"}'],
            [ 'name' => '{"ru": "Северо-западный федеральный округ", "en": "Northwestern Federal District"}'],
            [ 'name' => '{"ru": "Южный федеральный округ", "en": "Southern Federal District"}'],
            [ 'name' => '{"ru": "Уральский федеральный округ", "en": "Ural Federal District"}'],
            [ 'name' => '{"ru": "Дальневосточный федеральный округ", "en": "Far Eastern Federal District"}'],
        ]);
    }
}
