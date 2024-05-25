<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');

    // $users = DB::table('users')->get();
    // $user = DB::table('users')->where('id', 2)->get();



    // $users = DB::select('select * from Users');
    // $user = DB::select('select * from Users where id=1');
    // $user_by_email = DB::select('select * from Users where email=?', ['beb@gmail.com']);
    // $user = User::where('id', 2)->get();
    $user = User::find(7);
    $users = User::all();



    // create user
    // $create_user = DB::insert('insert into Users (name, email, password) values (?, ?, ?)', [
    //     'Artur',
    //     'beb@gmail.com',
    //     'password',
    // ]);
    // $create_user = DB::table('users')->insert([
    //     'name' => 'Ar',
    //     'email' => 'beb@gmail.com',
    //     'password' => '12345678',
    // ]);

    // $create_user = User::create([
    // 'name' => 'Ar',
    // 'email' => 'abcdefg@tripchanski.com',
    // 'password' => '12345678',
    // ]);



    // update user
    // $update_user = DB::update("update Users set email=? where id=?", [
    //     'abc@tripchanski.com',
    //     1,
    // ]);
    // $update_user = DB::table('users')->where('id', 4)->update([
    //     'email' => 'abc@tripchanski.com',
    // ]);
    // $update_user = User::find(5);
    // $update_user->update([
    //     'email' => 'bebeb@tripchanski.com',
    // ]);



    // delete user
    // $delete_user = DB::delete("delete from Users where id=?", [
    // 1,
    // ]);
    // $delete_user = DB::table('users')->where('id', 4)->delete();
    // $delete_user = User::find(2);
    // $delete_user->delete();


    // dd($users);
    // dd($user);


    dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
