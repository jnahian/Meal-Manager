<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'expenses', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'user_id' );
            $table->date( 'date' )->default( NULL )->nullable();
            $table->string( 'purpose' )->default( NULL )->nullable();
            $table->string( 'type' )->default( 'R' )->nullable()->comment( 'R=Regular, O=Others' );
            $table->decimal( 'amount', 10, 2 )->default( NULL )->nullable();
            $table->text( 'remarks' )->default( NULL )->nullable();
            $table->integer( 'created_by' )->nullable();
            $table->integer( 'updated_by' )->nullable();
            $table->tinyInteger( 'status' )->default( 9 )->comment( 'Active=1, Inactive=9' );
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
        Schema::dropIfExists( 'expenses' );
    }
}
