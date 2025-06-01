<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Products table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Orders table
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->text('customer_address');
            $table->decimal('total_amount', 8, 2);
            $table->string('status')->default('pending');
            $table->timestamps();
        });

        // Seed sample products
        \App\Models\Product::insert([
            [
                'name' => 'Laptop',
                'description' => 'Laptop dengan spesifikasi tinggi',
                'price' => 12000000,
                'stock' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Smartphone',
                'description' => 'Smartphone terbaru',
                'price' => 8000000,
                'stock' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Headphone',
                'description' => 'Headphone dengan kualitas suara tinggi',
                'price' => 1500000,
                'stock' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('orders');
    }
};