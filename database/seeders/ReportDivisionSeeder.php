<?php

namespace Database\Seeders;

use App\Models\ReportDivision;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportDivision::create([
            'report_id' => 1,
            'division_id' => 1
        ]);

        ReportDivision::create([
            'report_id' => 1,
            'division_id' => 2
        ]);
    }
}
