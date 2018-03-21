<?php

use Illuminate\Http\Request;

use App\Article;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */

Route::group(['middleware' => 'api'], function() {
    Route::get('articles',  function() {
        $articles = Article::all()->take(10);
//		Log::debug(__METHOD__.'():'.__LINE__." ".print_r($articles, true));
        return $articles;
    });
});

