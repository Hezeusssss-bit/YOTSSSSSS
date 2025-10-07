<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resident;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $residents = [
            ['name' => 'John', 'qty' => 'Doe', 'price' => 25, 'description' => '123 Main St, City'],
            ['name' => 'Jane', 'qty' => 'Smith', 'price' => 30, 'description' => '456 Oak Ave, Town'],
            ['name' => 'Mike', 'qty' => 'Johnson', 'price' => 28, 'description' => '789 Pine Rd, Village'],
            ['name' => 'Sarah', 'qty' => 'Williams', 'price' => 35, 'description' => '321 Elm St, City'],
            ['name' => 'David', 'qty' => 'Brown', 'price' => 22, 'description' => '654 Maple Dr, Town'],
            ['name' => 'Lisa', 'qty' => 'Davis', 'price' => 29, 'description' => '987 Cedar Ln, Village'],
            ['name' => 'Tom', 'qty' => 'Wilson', 'price' => 31, 'description' => '147 Birch St, City'],
            ['name' => 'Amy', 'qty' => 'Moore', 'price' => 27, 'description' => '258 Spruce Ave, Town'],
            ['name' => 'Chris', 'qty' => 'Taylor', 'price' => 33, 'description' => '369 Walnut Rd, Village'],
            ['name' => 'Emma', 'qty' => 'Anderson', 'price' => 26, 'description' => '741 Cherry St, City'],
            ['name' => 'James', 'qty' => 'Thomas', 'price' => 24, 'description' => '852 Ash Dr, Town'],
            ['name' => 'Maria', 'qty' => 'Jackson', 'price' => 32, 'description' => '963 Poplar Ln, Village'],
            ['name' => 'Robert', 'qty' => 'White', 'price' => 29, 'description' => '159 Hickory St, City'],
            ['name' => 'Jennifer', 'qty' => 'Harris', 'price' => 28, 'description' => '357 Sycamore Ave, Town'],
            ['name' => 'Michael', 'qty' => 'Martin', 'price' => 30, 'description' => '468 Willow Rd, Village'],
        ];

        foreach ($residents as $resident) {
            Resident::create($resident);
        }
    }
}
