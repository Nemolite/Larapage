<?php

use Illuminate\Database\Seeder;
use App\Ttt;

class TSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Ttt::create([
           'name'=>'Имя',
            'airline'=>'Получилось'
        ]);
    }
}
