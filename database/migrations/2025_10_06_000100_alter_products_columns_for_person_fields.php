<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("ALTER TABLE `products` MODIFY `qty` VARCHAR(191) NOT NULL");
        DB::statement("ALTER TABLE `products` MODIFY `price` INT NOT NULL");
        DB::statement("ALTER TABLE `products` MODIFY `description` TEXT NULL");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE `products` MODIFY `qty` INT NOT NULL");
        DB::statement("ALTER TABLE `products` MODIFY `price` DECIMAL(8,2) NOT NULL");
        DB::statement("ALTER TABLE `products` MODIFY `description` TEXT NOT NULL");
    }
};


