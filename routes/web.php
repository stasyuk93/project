<?php

Auth::routes();
Route::resource('/','IndexController',[
    'only'=>['index'],
    'names'=>[
        'index'=>'home'
    ]
]);
Route::resource('portfolios','PortfolioController',[
    'parameters'=>[
        'portfolios'=>'alias'
    ]
]);
Route::resource('articles','ArticleController',[
    'parameters'=>[
        'articles'=>'alias'
    ]
]);

Route::get('articles/cat/{cat_alias?}',['uses'=>'ArticleController@index','as'=>'articlesCat'])->where('cat_alias','[\w-]+');


/*Route::get('/', function ()    {
   return view('welcome');
});
Route::group(['prefix' => '/api/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::get('/', function ()    {
        return view('admin/companies/index');
    });
    Route::resource('companies', 'CompaniesController');
});*/
