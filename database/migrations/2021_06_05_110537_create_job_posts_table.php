<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string("slug")->unique();
            $table->foreignId("user_id")->nullable(true)->constrained()->onDelete('cascade');
            $table->longText('description');
            $table->string('title');
            $table->json( 'job_skills');
            $table->string('career_level');
            $table->string('ctc');
            $table->string('salary');
            $table->string('job_type_id');
            $table->integer('job_shift_id');
            $table->char('gender', 100);
            $table->date('expiry_date');
            $table->string('degree_level');
            $table->string('job_experience');
            $table->char('contact_us', 100);
            $table->timestamps();
            $table->integer('created_by')->unsigned()->default(0);
            $table->integer('updated_by')->unsigned()->default(0);
            $table->softDeletes();
            $table->integer('deleted_by')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
}
