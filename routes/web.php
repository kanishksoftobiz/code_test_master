<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpleTestController;
use App\Http\Controllers\MailController;

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

Route::get('/', [\App\Http\Controllers\SimpleTestController::class, 'index']);
Route::post('/store', [\App\Http\Controllers\SimpleTestController::class, 'store'])->name('user.color');
Route::get('/read', [SimpleTestController::class, 'read']);
Route::delete('/delete/{id}', [SimpleTestController::class, 'delete']);
Route::get('/send-mail', [SimpleTestController::class, 'reademail']);

// Route::get('/send-mail',function() {
//   $data = ['title' => 'Mail from Developer test', 'body' => 'This is for testing email using smtp'];
//   $user['to'] = 'tanusharma170899@gmail.com';
//   Mail::send('emails.submitted', $data, function($messages) use($user){
//       $messages->to($user['to']);
//       $messages->subject('hello Dev');
//   });
// });

// Route::get('/send-mail', function() {
//   $to_name = "kanishk";
//   $to_email = "kanishk17kumar@gmail.com";
//   $submittedData = ['title' => 'Mail from Developer test', 'body' => [SimpleTestController::class, 'reademail']];
//   Mail::send('emails.submitted', $submittedData, function($message) use($to_name, $to_email) {
//     $message->to($to_email)->subject('testing mail');
//   });
//   echo ("mail send...!");
// });

// Route::get('/send-mail', function() {
//   Mail::to('kanishk17kumar@gmail.com')->send( new SendSubmittedData());
//   return new SendSubmittedData();
// });