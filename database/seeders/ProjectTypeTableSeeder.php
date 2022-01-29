<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ProjectTypeTableSeeder extends Seeder
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
        DB::table('project_types')->insert([
            [ 'name' => '{"ru": "Линейные"}' ],
            [ 'name' => '{"ru": "Вторые"}' ]
        ]);
    }
}
