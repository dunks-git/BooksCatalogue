<?php

use App\Models\Book;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('id_prefix', 16)->default(config('catalog.book_id_prefix', 'bk'));
            $table->string('author');
            $table->string('title');
            $table->integer('price', false, true);
            $table->dateTime('publish_date');
            $table->text('description');
            $table->foreignId('genre_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
            $table->index('author', 'author_idx');
            $table->index('title', 'title_idx');
            $table->index('publish_date', 'publish_date_idx');
            $table->index('genre_id', 'book_genre_idx');
            $table->unique(['author', 'title'], 'author_title_unique_idx');
            $table->foreign('genre_id', 'book_genre_fk')->on('genres')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
