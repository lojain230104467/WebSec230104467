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
        $columns = DB::select('SHOW COLUMNS FROM purchases');
        $columnExists = false;
        
        foreach ($columns as $column) {
            if ($column->Field === 'price_at_purchase') {
                $columnExists = true;
                break;
            }
        }

        // If column doesn't exist, add it
        if (!$columnExists) {
            DB::statement('ALTER TABLE purchases ADD COLUMN price_at_purchase DECIMAL(10,2) NOT NULL AFTER product_id');
        }
    }

    public function down()
    {
        // We won't remove the column in down() to prevent data loss
    }
}; 