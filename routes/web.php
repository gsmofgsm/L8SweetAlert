<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

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
//    Alert::success('Success Title', 'Success Message');
//    alert()->info('Title','Lorem Lorem Lorem');
//    toast('Your Post as been submited!','success');

    return view('welcome');
});

Route::post('/success', function() {
    return redirect('/')->withSuccess('Task Created Successfully!');
//    return redirect('/')->with('success', 'Task Created Successfully!');
});

Route::post('/error', function(Request $request) {

    $validator = Validator::make($request->all(), [
        'title' => 'required|min:3',
    ]);

    if ($validator->fails()) {
        return back()->with('errors', $validator->messages()->all()[0])->withInput();
    }
});

Route::post('/toast-success', function() {
//    return redirect('/')->with('toast_success', 'Task Created Successfully!');
    return redirect('/')->withToastSuccess('Task Created Successfully!');
});

Route::post('/toast-error', function(Request $request) {
    $validator = Validator::make($request->all(), [
        'body' => 'required|min:3'
    ]);

    if ($validator->fails()) {
        return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
    }
});
