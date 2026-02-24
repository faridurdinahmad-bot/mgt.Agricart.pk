<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('designation', 100)->nullable()->after('department');
            $table->date('joining_date')->nullable()->after('designation');
            $table->string('cnic_front_path', 500)->nullable()->after('joining_date');
            $table->string('cnic_back_path', 500)->nullable()->after('cnic_front_path');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['designation', 'joining_date', 'cnic_front_path', 'cnic_back_path']);
        });
    }
};
