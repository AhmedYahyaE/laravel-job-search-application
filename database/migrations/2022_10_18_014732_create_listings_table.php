<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // For Relationships, check 3:51:29 in https://www.youtube.com/watch?v=MYyJ4PuL4pY    // foreignId(): https://laravel.com/docs/9.x/migrations#column-method-foreignId    // Foreign Key Constraints: https://laravel.com/docs/9.x/migrations#foreign-key-constraints
            $table->string('title');
            $table->string('logo')->nullable(); // Was added later!    // this is Uploaded File Path    // For File Upload (Uploading files) (using store() or storeAs() method, and the 'public' disk instead of Laravel's default disk 'local', and using the Symbolic Link by using the 'php artisan storage:link' command), check 2:45:14 in https://www.youtube.com/watch?v=MYyJ4PuL4pY
            $table->string('tags');
            $table->string('company');
            $table->string('location');
            $table->string('email');
            $table->string('website');
            $table->longText('description');

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
        Schema::dropIfExists('listings');
    }
};
