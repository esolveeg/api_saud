<?php

use App\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            
            
            
            [ "icon" => "paper-roll" , "Home" => 1 , "GroupNameEn"=> "عود" , "GroupName"=>"عود ", "image" => null , "FatherCode"=>null, "Featured" => 1],
            [ "icon" => "paper-roll" , "Home" => 1 , "GroupNameEn"=> "بخور" , "GroupName"=>"بخور ", "image" => null , "FatherCode"=>null, "Featured" => 1],
            [ "icon" => "desktop-classic" , "Home" => 1 , "GroupNameEn"=> "عطر" , "GroupName"=>"عطر","FatherCode"=>null, "image" => null , "Featured" => 1],
        ];
        Group::insert($groups);
    }
}
