<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'meals', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->unsignedInteger( 'user_id' );
            $table->date( 'date' )->nullable()->default( NULL );
            $table->decimal( 'meal' )->default( 0 );
            $table->decimal( 'guest' )->default( 0 );
            $table->decimal( 'total' )->default( 0 );
            $table->timestamps();
            $table->softDeletes();
        } );
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'meals' );
    }
}
