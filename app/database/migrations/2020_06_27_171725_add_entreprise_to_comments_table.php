<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEntrepriseToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::table('comments', function (Blueprint $table) {
            $table->foreignId('entreprise_id')->constrained()->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       /* Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_entreprise_id_foreign');
            $table->dropColumn('entreprise_id');
        });*/
    }
}
