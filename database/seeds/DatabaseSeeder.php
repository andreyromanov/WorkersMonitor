<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<15;$i++){
        DB::table('projects')->insert([
            
            [
            'project_name' => str_random(10)
            ]
          

        ]);
            }
    }
}
