<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // First check if the price column exists
        $columns = DB::select('SHOW COLUMNS FROM purchases');
        $hasPriceColumn = false;
        
        foreach ($columns as $column) {
            if ($column->Field === 'price') {
                $hasPriceColumn = true;
                break;
            }
        }

        // If price column exists, drop it since we're using price_at_purchase
        if ($hasPriceColumn) {
            DB::statement('ALTER TABLE purchases DROP COLUMN price');
        }

        // Make sure price_at_purchase exists and is properly configured
        $hasPriceAtPurchase = false;
        foreach ($columns as $column) {
            if ($column->Field === 'price_at_purchase') {
                $hasPriceAtPurchase = true;
                break;
            }
        }

        if (!$hasPriceAtPurchase) {
            DB::statement('ALTER TABLE purchases ADD COLUMN price_at_purchase DECIMAL(10,2) NOT NULL AFTER product_id');
        }
    }

    public function down()
    {
        // We won't make any changes in down() to prevent data loss
    }
}; 