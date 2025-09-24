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
       Schema::table('job_listings', function (Blueprint $table) {
            // Add the new foreign key column
            $table->foreignId('job_type_id')->nullable()->after('employment_type')->constrained()->onDelete('set null');

            // Drop the old string column
            $table->dropColumn('employment_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            // Re-add the old string column
            $table->string('employment_type')->nullable();

            // Drop the new foreign key column
            $table->dropConstrainedForeignId('job_type_id');
        });
    }
};
