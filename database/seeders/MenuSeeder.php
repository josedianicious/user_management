<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'title'=>'Test1',
            'type'=>'Folder'
        ]);
        Menu::create([
            'title'=>'Test2',
            'type'=>'Folder'
        ]);
        Menu::create([
            'title'=>'Test3',
            'parent_id'=>1,
            'type'=>'Folder'
        ]);
        Menu::create([
            'title'=>'Test4',
            'parent_id'=>3,
            'type'=>'Folder'
        ]);
        Menu::create([
            'title'=>'Test5',
            'parent_id'=>4,
            'type'=>'Smamrt Folder'
        ]);
        Menu::create([
            'title'=>'Test6',
            'parent_id'=>2,
            'type'=>'Folder'
        ]);
        Menu::create([
            'title'=>'Test7',
            'parent_id'=>1,
            'type'=>'Folder'
        ]);
    }
}
