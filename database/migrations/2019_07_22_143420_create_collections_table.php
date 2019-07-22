<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'collections', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->unsignedInteger( 'user_id' );
            $table->date( 'date' )->nullable();
            $table->decimal( 'amount', 10, 2 )->nullable();
            $table->text( 'remarks' )->nullable();
            $table->integer( 'created_by' )->nullable();
            $table->integer( 'updated_by' )->nullable();
            $table->tinyInteger( 'status' )->default( 1 )->comment( '1=Active, 9=Inactive' );
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
        Schema::dropIfExists( 'collections' );
    }
}
