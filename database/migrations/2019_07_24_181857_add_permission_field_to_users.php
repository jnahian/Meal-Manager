<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPermissionFieldToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( 'users', function ( Blueprint $table ) {
            $table->date( 'perm_from' )->default( NULL )->nullable()->after( 'remember_token' );
            $table->date( 'perm_to' )->default( NULL )->nullable()->after( 'perm_from' );
        } );
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table( 'users', function ( Blueprint $table ) {
            $table->dropColumn( 'perm_from', 'perm_to' );
        } );
    }
}
