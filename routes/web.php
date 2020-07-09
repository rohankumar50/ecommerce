<?php use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>['customAuth']], function(){

        Route::get('/', 'WelcomeController@index');
        Route::get('product/{product}/{slug}','WelcomeController@singleproduct');
        Route::get('addToCart/{product}','WelcomeController@addtocart')->name('addtocart');
        Route::get('cart','WelcomeController@cart')->name('cart');

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

        Route::group(['middleware' =>['adminmiddle']], function () {

                Route::view('admin', 'admin/dashboard');
                Route::group(['prefix' => 'admin'], function () {
                //add category---------------
                Route::post('trash/{category}','CategoryController@trash')->name('trash');
                Route::get('categorybtn','CategoryController@storedata');
                Route::post('addCategory', 'CategoryController@senddata');
                Route::get('categoryTrash','CategoryController@categoryTrash')->name('categoryTrash');
                Route::post('restore/{category}','CategoryController@restore')->name('restoreCategoryTrash');
                //product---------------------------
                Route::get('allproduct','ProductController@index')->name('allproduct');
                Route::get('addproduct','ProductController@addproduct')->name('addproduct');
                Route::get('trashproduct','ProductController@trashproduct')->name('trashproduct');
                Route::post('storeProduct','ProductController@storeproduct')->name('storeProduct');
                Route::get('editproduct','ProductController@editproduct')->name('editproduct');
                Route::get('btn_trashproduct/{id}','ProductController@btn_trashproduct')->name('btn_trashproduct');
                Route::get('btn_restore/{id}','ProductController@btn_restore')->name('btn_restore');
                Route::get('btn_delete/{id}','ProductController@btn_delete')->name('btn_delete');
                //customers--------------
                Route::get('customers','ProfileController@index')->name('customers');

                // Route::resource('product', 'ProductController');
                Route::resource('category', 'CategoryController');

            });
    });


    }

);