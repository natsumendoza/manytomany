<?php

use App\User;
use App\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {

    $user = User::findOrFail(1);

    $role = new Role(['name' => 'author']);

    $user->roles()->save($role);

});

Route::get('/read', function () {

    $user = User::findOrFail(1);

    foreach ($user->roles as $role) {

        echo $role->name;

    }

});

Route::get('/update', function () {

    $user = User::findOrFail(1);

    if ($user->has('roles')) {

        foreach ($user->roles as $role) {

            if ($role->name == 'Administrator') {

                $role->name = 'subscriber';

                $role->save();

            }

        }

    }

});

Route::get('/delete', function () {

    $user = User::findOrFail(1);

    foreach ($user->roles as $role) {

        $role->whereId(3)->delete();

    }

});

Route::get('/attach', function () {

    $user = User::findOrFail(1);

    $user->roles()->attach(2);

});

Route::get('/detach', function () {

    $user = User::findOrFail(1);

    $user->roles()->detach(2);

});

Route::get('/sync', function () {

    $user = User::findOrFail(1);

    $user->roles()->sync([1]);

});