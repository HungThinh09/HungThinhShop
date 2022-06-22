<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class account extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            ['id'=>1,'name'=>'Thinh hung','user'=>'hung','email'=>'hung@gmail.com','password'=>'$2y$10$c8TtR8ebDOluzTUPblJTcOJdB/lci2jFeYHeev//nU2p2JvT21KS.'],
            ['id'=>2,'name'=>'Devolop', 'user'=>'Dev', 'email'=>'dev@gmail.com','password'=>'$2y$10$c8TtR8ebDOluzTUPblJTcOJdB/lci2jFeYHeev//nU2p2JvT21KS.'],
            ['id'=>3,'name'=>'Sale', 'user'=>'sale', 'email'=>'sale@gmail.com','password'=>'$2y$10$c8TtR8ebDOluzTUPblJTcOJdB/lci2jFeYHeev//nU2p2JvT21KS.'],
            ['id'=>4,'name'=>'Content', 'user'=>'content', 'email'=>'content@gmail.com','password'=>'$2y$10$c8TtR8ebDOluzTUPblJTcOJdB/lci2jFeYHeev//nU2p2JvT21KS.'],
        ]);
    }
}
