<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_logins', function (Blueprint $table) {
            $table->string('user_name',250)->unique()->after('user_id');
            $table->tinyInteger('status')->comment('1:Active; 2:Inactive')->default(1)
            ->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_logins', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
