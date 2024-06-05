<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@app.com',
            'password' => Hash::make('admin1234'),
        ]);

        DB::table('permissions')->insert([
            ["id"=>1,"name"=> "View Dashboard","guard_name"=>"web"],
            ["id"=>2,"name"=> "Manage Authentication","guard_name"=>"web"],
            ["id"=>3,"name"=> "View Translations","guard_name"=>"web"],
            ["id"=>4,"name"=> "Manage Translations","guard_name"=>"web"],
            ["id"=>5,"name"=> "View Sliders","guard_name"=>"web"],
            ["id"=>6,"name"=> "Manage Sliders","guard_name"=>"web"],
            ["id"=>7,"name"=> "View Site Texts","guard_name"=>"web"],
            ["id"=>8,"name"=> "Manage Site Texts","guard_name"=>"web"],
            ["id"=>9,"name"=> "View Contacts","guard_name"=>"web"],
            ["id"=>10,"name"=> "Manage Contacts","guard_name"=>"web"],
            ["id"=>11,"name"=> "View Socials","guard_name"=>"web"],
            ["id"=>12,"name"=> "Manage Socials","guard_name"=>"web"],
            ["id"=>13,"name"=> "View News Letters","guard_name"=>"web"],
            ["id"=>14,"name"=> "Manage News Letters","guard_name"=>"web"],
            ["id"=>15,"name"=> "View Faqs","guard_name"=>"web"],
            ["id"=>16,"name"=> "Manage Faqs","guard_name"=>"web"],
            ["id"=>17,"name"=> "View Countries","guard_name"=>"web"],
            ["id"=>18,"name"=> "Manage Countries","guard_name"=>"web"],
            ["id"=>19,"name"=> "View States","guard_name"=>"web"],
            ["id"=>20,"name"=> "Manage States","guard_name"=>"web"],
            ["id"=>21,"name"=> "View Cities","guard_name"=>"web"],
            ["id"=>22,"name"=> "Manage Cities","guard_name"=>"web"],
            ["id"=>23,"name"=> "View Colors","guard_name"=>"web"],
            ["id"=>24,"name"=> "Manage Colors","guard_name"=>"web"],
            ["id"=>25,"name"=> "View Sizes","guard_name"=>"web"],
            ["id"=>26,"name"=> "Manage Sizes","guard_name"=>"web"],
            ["id"=>27,"name"=> "View Categories","guard_name"=>"web"],
            ["id"=>28,"name"=> "Manage Categories","guard_name"=>"web"],
            ["id"=>29,"name"=> "View Shipping Companies","guard_name"=>"web"],
            ["id"=>30,"name"=> "Manage Shipping Companies","guard_name"=>"web"],
            ["id"=>31,"name"=> "View Coupons","guard_name"=>"web"],
            ["id"=>32,"name"=> "Manage Coupons","guard_name"=>"web"],
            ["id"=>33,"name"=> "View Order Statuses","guard_name"=>"web"],
            ["id"=>34,"name"=> "Manage Order Statuses","guard_name"=>"web"],
            ["id"=>35,"name"=> "View Products","guard_name"=>"web"],
            ["id"=>36,"name"=> "Manage Products","guard_name"=>"web"],
            ["id"=>37,"name"=> "View Contact Requests","guard_name"=>"web"],
            ["id"=>38,"name"=> "Manage Contact Requests","guard_name"=>"web"],
            ["id"=>39,"name"=> "View Customers","guard_name"=>"web"],
            ["id"=>40,"name"=> "Manage Customers","guard_name"=>"web"],
            ["id"=>41,"name"=> "View Orders","guard_name"=>"web"],
            ["id"=>42,"name"=> "Manage Orders","guard_name"=>"web"],
        ]);

        DB::table('roles')->insert([
            ["id"=>1,"name"=>"Super Admin","guard_name"=>"web"]
        ]);

        DB::table('model_has_roles')->insert([
            ["role_id"=>1,"model_type"=>"App\Models\User","model_id"=>"1"],
        ]);

        DB::table('role_has_permissions')->insert([
            ["permission_id"=>1,"role_id"=>1],
            ["permission_id"=>2,"role_id"=>1],
            ["permission_id"=>3,"role_id"=>1],
            ["permission_id"=>4,"role_id"=>1],
            ["permission_id"=>5,"role_id"=>1],
            ["permission_id"=>6,"role_id"=>1],
            ["permission_id"=>7,"role_id"=>1],
            ["permission_id"=>8,"role_id"=>1],
            ["permission_id"=>9,"role_id"=>1],
            ["permission_id"=>10,"role_id"=>1],
            ["permission_id"=>11,"role_id"=>1],
            ["permission_id"=>12,"role_id"=>1],
            ["permission_id"=>13,"role_id"=>1],
            ["permission_id"=>14,"role_id"=>1],
            ["permission_id"=>15,"role_id"=>1],
            ["permission_id"=>16,"role_id"=>1],
            ["permission_id"=>17,"role_id"=>1],
            ["permission_id"=>18,"role_id"=>1],
            ["permission_id"=>19,"role_id"=>1],
            ["permission_id"=>20,"role_id"=>1],
            ["permission_id"=>21,"role_id"=>1],
            ["permission_id"=>22,"role_id"=>1],
            ["permission_id"=>23,"role_id"=>1],
            ["permission_id"=>24,"role_id"=>1],
            ["permission_id"=>25,"role_id"=>1],
            ["permission_id"=>26,"role_id"=>1],
            ["permission_id"=>27,"role_id"=>1],
            ["permission_id"=>28,"role_id"=>1],
            ["permission_id"=>29,"role_id"=>1],
            ["permission_id"=>30,"role_id"=>1],
            ["permission_id"=>31,"role_id"=>1],
            ["permission_id"=>32,"role_id"=>1],
            ["permission_id"=>33,"role_id"=>1],
            ["permission_id"=>34,"role_id"=>1],
            ["permission_id"=>35,"role_id"=>1],
            ["permission_id"=>36,"role_id"=>1],
            ["permission_id"=>37,"role_id"=>1],
            ["permission_id"=>38,"role_id"=>1],
            ["permission_id"=>39,"role_id"=>1],
            ["permission_id"=>40,"role_id"=>1],
            ["permission_id"=>41,"role_id"=>1],
            ["permission_id"=>42,"role_id"=>1],
        ]);
    }
}
