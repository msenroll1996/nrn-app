<?php

use App\Models\EligibilityType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateMembershipTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_types', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EligibilityType::class);
            $table->foreign('eligibility_type_id')->references('id')->on('eligibility_types')->onDelete('cascade');
            $table->string('name');
            $table->string('expiration_years')->nullable();
            $table->enum('status',['1','2']); // 1 for active , 2 for de-active
            $table->string('amount');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membership_types');
    }
}
