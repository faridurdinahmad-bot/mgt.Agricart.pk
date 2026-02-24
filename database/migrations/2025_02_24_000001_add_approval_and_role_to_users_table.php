<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_approved')->default(false)->after('remember_token');
            $table->string('role')->default('staff')->after('is_approved'); // staff | vendor
            $table->string('status')->default('pending')->after('role');   // pending | approved | rejected
            $table->string('company_name')->nullable()->after('status');
            $table->string('department')->nullable()->after('company_name');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_approved', 'role', 'status', 'company_name', 'department']);
        });
    }
};
