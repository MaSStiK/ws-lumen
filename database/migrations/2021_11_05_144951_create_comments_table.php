<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')
                ->default(new Expression('CURRENT_TIMESTAMP'));
            $table->foreignId('card_id')->constrained('cards');
            $table->text('comment_text')
                ->comment('Текст комментария');
            $table->integer('comment_likes')
                ->default(0)
                ->comment('Колличество лайков');
            $table->integer('comment_dislikes')
                ->default(0)
                ->comment('Колличество дизлайков');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
