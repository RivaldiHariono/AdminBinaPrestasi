<?php

use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = new \App\User;                
        $owner->name = "Owner";         
        $owner->email = "owner@bp.test";      
        $owner->address = "Tangerang";
        $owner->phone = "087809432155";   
        $owner->roles = "OWNER";         
        $owner->password = \Hash::make("binaprestasi"); 
 
        $owner->save(); 
 
        $this->command->info("Owner berhasil di insert ke Database");
    }
}
