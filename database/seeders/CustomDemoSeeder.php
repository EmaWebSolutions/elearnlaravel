<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CustomDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Specify the path to the demo.sql file in the seeders folder.
        $sqlFilePath = __DIR__ . '/demo.sql';

        // Check if the SQL file exists before attempting to read and execute it.
        if (File::exists($sqlFilePath)) {
            // Read the contents of the SQL file.
            $sql = File::get($sqlFilePath);

            // Execute the SQL queries.
            DB::unprepared($sql);

            $this->command->info('Demo data seeded successfully.');
        } else {
            $this->command->error('The demo.sql file does not exist in the seeders folder.');
        }
    }
}

