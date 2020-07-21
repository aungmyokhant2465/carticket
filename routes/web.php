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

Route::get('/image/{image_name}',[
    'uses'=>'AuthController@getImage',
    'as'=>'image'
]);
Route::get('/',[
    'uses'=>'AuthController@getLogin',
    'as'=>'get.login'
]);
Route::post('/',[
    'uses'=>'AuthController@postLogin',
    'as'=>'post.login'
]);

Route::group(['middleware'=>'role:admin|staff'],function (){
    Route::get('/logout',[
        'uses'=>'AuthController@getLogout',
        'as'=>'get.logout'
    ]);
    Route::get('/welcome',[
        'uses'=>'AuthController@getWelcome',
        'as'=>'welcome'
    ]);
    Route::group(['prefix'=>'user'],function (){
        Route::get('addUser',[
            'uses'=>'AuthController@getAddUser',
            'as'=>'get.addUser'
        ]);
        Route::post('addUser',[
            'uses'=>'AuthController@postAddUser',
            'as'=>'post.addUser'
        ]);
        Route::get('users',[
            'uses'=>'AuthController@getUsers',
            'as'=>'get.users'
        ]);
        Route::get('userDelete',[
            'uses'=>'AuthController@getUserDelete',
            'as'=>'get.user.delete'
        ]);
        Route::post('userEdit',[
            'uses'=>'AuthController@postUserEdit',
            'as'=>"post.user.edit"
        ]);
    });

    Route::group(['prefix'=>'store'],function (){
        Route::get('stateAndCity',[
            'uses'=>'StoreController@getStateAndCity',
            'as'=>'get.stateAndCity'
        ]);
        Route::post('stateAndCity',[
            'uses'=>'StoreController@postStateAndCity',
            'as'=>'post.stateAndCity'
        ]);
        Route::post('stateAndCity/stateAndCityEdit',[
            'uses'=>'StoreController@postStateAndCityEdit',
            'as'=>'post.stateAndCityEdit'
        ]);
        Route::get('stateAndCity/stateAndCityDelete',[
            'uses'=>'StoreController@getStateAndCityDelete',
            'as'=>'get.stateAndCityDelete'
        ]);
        Route::get("storeAndUser/{user_id}",[
            'uses'=>'StoreController@getStoreAndUser',
            'as'=>'get.storeAndUser'
        ]);
    });
    Route::group(['prefix'=>'driver'],function(){
        Route::get('addDriver',[
            'uses'=>'DriverController@getAddDriver',
            'as'=>'get.addDriver'
        ]);
        Route::post('addDriver',[
            'uses'=>'DriverController@postAddDriver',
            'as'=>'post.addDriver'
        ]);
        Route::get('drivers',[
            'uses'=>'DriverController@getDrivers',
            'as'=>'get.drivers'
        ]);
        Route::get('driver/{driver_id}',[
            'uses'=>'DriverController@getDriver',
            'as'=>'get.driver'
        ]);
        Route::get('edit/{driver_id}',[
            'uses'=>'DriverController@getEditDriver',
            'as'=>'get.editDriver'
        ]);
        Route::post('edit',[
            'uses'=>'DriverController@postEditDriver',
            'as'=>'post.editDriver'
        ]);
        Route::get('delete',[
            'uses'=>'DriverController@getDeleteDriver',
            'as'=>'get.deleteDriver'
        ]);
    });

    Route::group(['prefix'=>'car'],function (){
        Route::get('cars',[
            'uses'=>'CarController@getCars',
            'as'=>'get.cars'
        ]);
        Route::post('add',[
            'uses'=>'CarController@postAddCar',
            'as'=>'post.addCar'
        ]);
        Route::get('state/{car_id}',[
            'uses'=>'CarController@getCarState',
            'as'=>'get.carState'
        ]);
        Route::post('edit',[
            'uses'=>'CarController@postCarEdit',
            'as'=>'post.carEdit'
        ]);
        Route::get('delete/{car_id}',[
            'uses'=>'CarController@getCarDelete',
            'as'=>'get.carDelete'
        ]);
        Route::get('seat',[
            'uses'=>'CarController@getCarSeat',
            'as'=>'get.carSeat'
        ]);
        Route::get('search',[
            'uses'=>'CarController@getSearch',
            'as'=>'car.search'
        ]);
    });
    Route::group(['prefix'=>'travel'],function (){
        Route::get('add',[
            'uses'=>'TravelController@getAddTravel',
            'as'=>'get.addTravel'
        ]);
        Route::post('add',[
            'uses'=>'TravelController@postAddTravel',
            'as'=>'post.addTravel'
        ]);
        Route::get('addTime/{travel_id}',[
            'uses'=>'TravelController@getAddTravelTime',
            'as'=>'get.addTravelTime'
        ]);
        Route::post('addTime',[
            'uses'=>"TravelController@postAddTravelTime",
            'as'=>'post.addTravelTime'
        ]);
        Route::get('travels',[
            'uses'=>"TravelController@getTravels",
            'as'=>'get.travels'
        ]);
        Route::get('delete/{travel_id}/{travelTime_id}',[
            'uses'=>"TravelController@getDeleteTravel",
            'as'=>'get.deleteTravel'
        ]);
        Route::get('edit/{travel_id}/{travelTime_id}',[
            'uses'=>"TravelController@getEditTravel",
            'as'=>'get.editTravel'
        ]);
        Route::post('edit',[
            'uses'=>'TravelController@postEditTravel',
            'as'=>'post.editTravel'
        ]);
        Route::get('editTime/{travelTime_id}/{travel_id}',[
            'uses'=>"TravelController@getEditTravelTime",
            'as'=>'get.editTravelTime'
        ]);
        Route::post('editTime',[
            'uses'=>"TravelController@postEditTravelTime",
            'as'=>'post.editTravelTime'
        ]);
        Route::group(['prefix'=>'withAndWithout/time'],function (){
            Route::get('/', [
                'uses'=>"TravelController@getTravelWithoutTime",
                'as'=>'get.travelsWithAndWithoutTime'
            ]);
            Route::get('edit/{travel_id}',[
                'uses'=>"TravelController@getEditTravelWithoutTime",
                'as'=>'get.editTravelWithAndWithoutTime'
            ]);
            Route::post('edit',[
                'uses'=>'TravelController@postEditTravelWithoutTime',
                'as'=>'post.editTravelWithAndWithoutTime'
            ]);
            Route::get('delete/{travel_id}',[
                'uses'=>"TravelController@getDeleteTravelWithoutTime",
                'as'=>'get.deleteTravelWithAndWithoutTime'
            ]);
        });
    });

});