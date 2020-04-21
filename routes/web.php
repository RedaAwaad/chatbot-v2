<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Backend\UserController;
Route::get('/', function () {
    if(request()->getHttpHost() === 'covid19.rchsp.med.sa'){
        return redirect()->to('chatbot/rchrch/37/live');
    }
    return view('welcome');

});
Route::get('/sendMessage', function () {
    $client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic('ad5df3af', 'K1LCEUliOiXgTUlQ'));
    $message = $client->message()->send([
    'to' => 966537861951,
    'from' => "Wakeb ",
    'text' => 'Wakeb SMS Notification    Your reservation has been confirmed within the specified date 05/03/2020'
]);
});

Route::get('mailing','Backend\AdminController@public_email')->name('sendMail');
Route::get('/chatbot/{slug}/{id}/chat_icon', 'Backend\UserController@chatbot_icon')->name('chatbot.icon');
Route::get('/chatbot/{slug}/{id}/docs', 'Backend\UserController@docs')->name('docs');

Route::get('/migrate', function () {
    Artisan::call('migrate:refresh');
    Artisan::call('db:seed');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/chatbot/{slug}/{id}/live', 'Backend\UserController@chatbot')->name('chatbot.show');

Route::get('/lang/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang');

    Route::get('chatbot/{user}/{id}/response', 'Backend\UserController@response')->middleware('cors');
    Route::get('chatbot/{user}/{id}/entry_question', 'Backend\ChatController@entry_question')->name('entryQuestion')->middleware('cors');
    Route::get('chatbot/{user}/{id}/select_next_question', 'Backend\ChatController@select_next_question')->middleware('cors');


    Route::get('admin/chats/{id}/response', 'Backend\UserController@response')->middleware('cors');
    Route::get('admin/chats/{id}/entry_question', 'Backend\ChatController@entry_question')->name('entryQuestion')->middleware('cors');
    Route::get('admin/chats/{id}/select_next_question', 'Backend\ChatController@select_next_question')->middleware('cors');

    Route::get('chatbot/{user}/{id}/store_response', 'Backend\UserController@store_response')->middleware('cors');
    Route::get('admin/chats/{id}/store_response', 'Backend\UserController@store_response')->middleware('cors');
    Route::get('chatbot/{user}/{id}/report', 'Backend\UserController@report');
    Route::get('admin/chats/{id}/report', 'Backend\UserController@report');
    Route::get('admin/chats/{id}/question_orders', 'Backend\UserController@question_orders');
