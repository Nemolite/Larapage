<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pages')->insert([
            'name'=>'Name the pages',
            'alias'=>'Thi is alias',
            'text'=>'<h1>Pages</h1>
                     <p>The text pages</p>
                     '
        ]);
    }
}
