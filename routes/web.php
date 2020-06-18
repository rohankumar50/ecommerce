<?php use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>['customAuth']], function()
    {

        Route::view('/', 'welcome');

        Route::get('signout', function (Request $request) {
                $request->session()->flush();
                return redirect('http://localhost/myecommerce/public/');
            }

        );
        Route::view('login', 'auth/login');
        Route::post('loginController', 'Auth\LoginController@index');

        //register route---------
        Route::view('register', 'auth/register');
        Route::post('registerController', 'Auth\RegisterController@index')->name('register');
        //--------------------------
        // Route::resource('product', 'ProductController');
        // Route::resource('category', 'CategoryController');
        Route::view('admin', 'admin/dashboard');

        Route::group(['prefix' => 'admin'], function () {
            Route::resource('product', 'ProductController');
            Route::resource('category', 'CategoryController');

            //add category---------------
            Route::get('categorybtn','CategoryController@storedata');
            Route::post('addCategory', 'CategoryController@senddata');

        });

    }

);
