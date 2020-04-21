<?php

/*
*
*     Theses routes  have prefix in Router map - admin
*
*/

Route::get('/', 'Backend\AdminController@index')->name('admin');
Route::get('/change',function (){
   foreach(Auth::user()->questions as $q){
       $q->chat_id = Auth::user()->chats[0]->id;
       $q->save();
   }

});
Route::resource('/users', 'Backend\UserController');
Route::resource('/chats', 'Backend\ChatController');
Route::get('/chats/{id}/build', 'Backend\ChatController@build')->name('admin.chats.build');
Route::get('/chats/{id}/activation', 'Backend\ChatController@activation')->name('activation');
Route::get('/chats/{id}/history', 'Backend\ChatController@history')->name('admin.chats.history');
Route::get('/chats/{id}/edit', 'Backend\ChatController@edit')->name('admin.chats.edit');
Route::get('/chats/{id}/support', 'Backend\ChatController@support')->name('admin.chats.support');
Route::get('/chats/{id}/statistics', 'Backend\ChatController@statistics')->name('admin.chats.statistics');
Route::get('/admin/chats/{id}/questions', 'Backend\ChatController@questions')->name('chats.questions');
Route::post('/admin/chats/store_questions', 'Backend\ChatController@store_questions')->name('chats.store_questions');
Route::get('/admin/chats/url_delete_question', 'Backend\ChatController@url_delete_question')->name('chats.url_delete_question');
Route::post('/admin/chats/url_edit_answers', 'Backend\ChatController@url_edit_answers')->name('chats.url_edit_answers');
Route::get('/admin/chats/delete_answers', 'Backend\ChatController@delete_answers')->name('chats.delete_answers');
Route::post('/admin/chats/edit_question', 'Backend\ChatController@edit_question')->name('chats.edit_question');
Route::post('/admin/chats/store_answers', 'Backend\ChatController@store_answers')->name('chats.store_answers');
Route::get('/users/{id}/restore', 'Backend\UserController@restore')->name('users.restore');
Route::get('/u/statistics', 'Backend\UserController@statistics')->name('users.statistics');
Route::get('resp_stat', 'Backend\UserController@resp_stat')->name('resp_stat');
Route::get('resp_chat_stat/{id}', 'Backend\ChatController@resp_stat')->name('resp_chat_stat');

Route::resource('/questions', 'Backend\QuestionController');
Route::get('/questions/{id}/restore', 'Backend\QuestionController@restore')->name('questions.restore');

Route::resource('/answers', 'Backend\AnswerController');
Route::get('/answers/{id}/restore', 'Backend\AnswerController@restore')->name('answers.restore');

Route::get('/settings', 'Backend\SettingController@index')->name('settings.index');
Route::put('/settings/{id}', 'Backend\SettingController@update')->name('settings.update');
Route::get('/question/answers/{id}', 'Backend\QuestionController@answers')->name('question.answers');
Route::post('/question/answers', 'Backend\QuestionController@answer_store')->name('questions.answer.store');
Route::get('/question_answers/delete/{id}', 'Backend\QuestionController@answer_delete')->name('question_answer.destroy');

