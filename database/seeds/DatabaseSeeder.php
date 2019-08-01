<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Sheep;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        for($i=1; $i<=10; $i++){
            $sheep='sheep';
            Sheep::create([
                'name'=>$sheep.' '.$i,
                'status' =>1
            ]);
        }
    }
}
