<?php

use Illuminate\Support\Facades\Route;

/*mail notifi*/
use App\Notifications\Email;
use Illuminate\Support\Facades\Notification;

use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('notifi', function () {
    /*single notifi*/
    //$user = User::find(2);
    //$user->notify(new Email());
    //Notification::send($user, new Email());

    /*multi user mail sent*/
    $users = User::all();

    foreach ($users as $key => $user) {
        $name =$user->name;
        $email =$user->email;
        Notification::send($user, new Email($name,$email));
    }

    return redirect()->back();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
