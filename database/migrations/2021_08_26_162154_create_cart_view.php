<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCartView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS cart_view");
        DB::statement("CREATE VIEW cart_view AS
        select
        p.id,
        p.ItemNameEn,
        p.ItemName,
        p.ItemImage,
        cp.price,
        cp.cart_id,
        cp.deleted_at,
        cp.image,
        cp.qty
        FROM
            cart_product cp
            join products p 
            on cp.product_id = p.id ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('cart_view');
    }
}
