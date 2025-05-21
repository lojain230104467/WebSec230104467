<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // First check if the column exists
        $columns = DB::select('SHOW COLUMNS FROM products');
        $columnExists = false;
        
        foreach ($columns as $column) {
            if ($column->Field === 'stock_quantity') {
                $columnExists = true;
                break;
            }
        }

        // If column doesn't exist, add it
        if (!$columnExists) {
            DB::statement('ALTER TABLE products ADD COLUMN stock_quantity INT NOT NULL DEFAULT 0 AFTER price');
        }
    }

    public function down()
    {
        // We won't remove the column in down() to prevent data loss
    }
}; 