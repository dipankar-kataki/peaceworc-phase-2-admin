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
        ManageLayout::create([
            'banner' => 1,
            'about' => 1,
            'service' => 1,
            'become_caregiver' => 1,
            'become_agency' => 1,
            'testimonial' => 1,
            'contact_us' => 1
        ]);
    }
}
