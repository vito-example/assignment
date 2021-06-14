<?php

use App\Http\Controllers\v1\ArticleController;
use App\Http\Controllers\v1\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['paginate'])->group(function () {
    // Get Articles
    Route::get('articles', [ArticleController::class, 'index']);

    // Get article with comments
    Route::get('articles/{article}/comments', [ArticleController::class, 'showArticleComments']);

    // Get Tags
    Route::get('tags', [TagController::class, 'index']);

    // Get Articles with Tags
    Route::get('tags/{tag}/{articles}', [TagController::class, 'showTagArticles']);
});