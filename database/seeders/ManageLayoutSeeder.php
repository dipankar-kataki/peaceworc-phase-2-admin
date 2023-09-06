<?php

namespace Database\Seeders;

use App\Models\ManageLayout;
use Illuminate\Database\Seeder;

class ManageLayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $layout_modules = new \stdClass();
        $layout_modules->banner = 1;
        $layout_modules->about = 1;
        $layout_modules->service = 1;
        $layout_modules->become_caregiver = 1;
        $layout_modules->become_agency = 1;
        $layout_modules->testimonial = 1;
        $layout_modules->contact_us = 1;

        foreach($layout_modules  as $key => $item){
            
            ManageLayout::create([
                'module' => $key,
                'status' => $item,
            ]);
        }
        
    }
}
