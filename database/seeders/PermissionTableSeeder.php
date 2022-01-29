<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('permissions')->insert([
            [ 'name' => 'view-role', 'label' => 'Управление ролями' ],
            [ 'name' => 'view-user', 'label' => 'Управление пользователями' ],
            [ 'name' => 'view-post', 'label' => 'Управление новостями' ],
            [ 'name' => 'view-project', 'label' => 'Управление объектами' ],
            [ 'name' => 'view-reward', 'label' => 'Управление наградами' ],
            [ 'name' => 'view-vacancy', 'label' => 'Управление вакансиями' ],
            [ 'name' => 'view-direction', 'label' => 'Управление направлениями деятельности' ],
        ]);
    }
}
