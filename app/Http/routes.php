<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*AREA DE FRONTEND */

Route::get('/','FrontController@home')->name('front');

Route::get('/pais/{country}','FrontController@pais')->name('front.pais');

Route::get('/pais/{country}/ciudad/{city}','FrontController@ciudad')->name('front.ciudad');

Route::get('/pais/{country}/ciudad/{city}/municipio/{municipality}','FrontController@municipio')->name('front.municipio');

Route::get('/search','FrontController@search')->name('search');

Route::get('/pais/{country}/ciudad/{city}/municipio/{municipality}/{bussine}','FrontController@bussine')->name('front.bussine');

Route::get('/lugar/{country}/categoria/{subcategory}','FrontController@categorycountry')->name('front.categorycountry');

Route::get('/paises','FrontController@paises')->name('front.paises');

Route::get('/lugar/{country}/populares','FrontController@populares')->name('front.populares');

Route::get('/perfil','FrontController@perfil')->name('front.perfil');

Route::get('/commentbussine/{bussine}','FrontController@commentbussine')->name('front.commentbussine');

Route::post('/commentcreate','FrontController@commentcreate')->name('front.commentcreate');

Route::get('/agregar/negocio/{bussine}','FrontController@agregar')->name('front.agregar')->where(['bussine' => '[0-9]+']);

Route::get('/regresar','FrontController@regresar')->name('front.regresar');

Route::get('/imprimir-terminos','FrontController@imprimir')->name('front.imprimir');

Route::get('/imprimir-privacidad','FrontController@imprimirpriv')->name('front.imprimirpriv');

Route::get('/marcadores','FrontController@marcadores')->name('front.marcadores');

Route::get('/comentarios','FrontController@comentarios')->name('front.comentarios');

Route::get('/configuracion','FrontController@configuracion')->name('front.configuracion');

Route::put('/edit/user/{user}','FrontController@edituser')->name('front.edit.user');

Route::put('/edit/image/{user}','FrontController@editimage')->name('front.edit.image');

Route::put('/edit/password/{user}','FrontController@editpassword')->name('front.edit.password');

Route::delete('/elim/marcador/{bussine}','FrontController@elimmark')->name('front.elim.mark');

Route::get('/verperfil/{user}','FrontController@verperfil')->name('front.verperfil');

Route::post('/enviarmensaje','FrontController@enviarmensaje')->name('front.enviarmensaje');

Route::get('/vermensajes','FrontController@vermensajes')->name('front.vermensajes');

Route::get('/retroceder','FrontController@back')->name('front.back');

Route::delete('/eliminar/mensaje/{message}','FrontController@elimmessage')->name('front.message.elim');

Route::get('/like/{comment}','FrontController@like')->name('front.like')->where(['comment' => '[0-9]+']);

Route::get('/dislike/{comment}','FrontController@dislike')->name('front.dislike')->where(['comment' => '[0-9]+']);

Route::get('/contacto','FrontController@contacto')->name('front.contacto');

Route::post('/contacto/form','FrontController@contactoform')->name('front.contactoform');

Route::get('/galeria-de-videos/{bussine}','FrontController@videos')->name('front.videos');

Route::get('/galeria-de-imagenes/{bussine}','FrontController@imagenes')->name('front.imagenes');

Route::get('/terminos','FrontController@terminos')->name('app.terminos');

Route::get('privacidad','FrontController@privacidad')->name('app.privacidad');

Route::get('/lenguaje/{lang}',function($lang){
	session(['lang'=>$lang]);
	return \Redirect::back();
})->where(['lang' => 'es|en'])->name('front.lang');

Route::auth();

/*FIN AREA DE FRONTEND */



/*AREA DE ADMINISTRACION */

Route::get('/loginadmin',function(){
		return view('backend.login');
	})->name('loginadmin');

Route::post('/introadmin','UserController@intro')->name('introadmin');

Route::group(['prefix'=>'shoes','middleware'=>'admin'],function(){
	
	Route::get('/','UserController@admin')->name('admin');

	Route::resource('/bussine','BussineController');
	Route::get('/bussine/{bussine}/delete','BussineController@delete')->name('delete_bussine');

	Route::resource('/category','CategoryController');
	Route::get('/category/{category}/delete','CategoryController@delete')->name('delete_category');

	Route::resource('/subcategory','SubCategoryController');
	Route::get('/subcategory/{subcategory}/delete','SubCategoryController@delete')->name('delete_subcategory');

	Route::resource('/city','CityController');
	Route::get('/city/{city}/delete','CityController@delete')->name('delete_city');

	Route::resource('/municipality','MunicipalityController');
	Route::get('/municipality/{municipality}/delete','MunicipalityController@delete')->name('delete_municipality');

	Route::resource('/comment','CommentController');
	Route::get('/comment/{comment}/delete','CommentController@delete')->name('delete_comment');

	Route::resource('/country','CountryController');
	Route::get('/country/{country}/delete','CountryController@delete')->name('delete_country');

	Route::resource('/message','MessageController');
	Route::get('/message/{message}/delete','MessageController@delete')->name('delete_message');

	Route::resource('/like','LikeController');
	Route::get('/like/{like}/delete','LikeController@delete')->name('delete_like');

	Route::resource('/picture','PictureController');
	Route::get('/picture/{picture}/delete','PictureController@delete')->name('delete_picture');

	Route::resource('/user','UserController');
	Route::get('/user/{user}/delete','UserController@delete')->name('delete');

	Route::get('/logoutadmin','UserController@logout')->name('logoutadmin');

	Route::resource('/video','VideoController');
	Route::get('/video/{video}/delete','VideoController@delete')->name('delete_video');

	Route::resource('/marker','MarkerController');

	Route::get('/contactback','UserController@contactback')->name('contactback');

	Route::get('/verprofile/{user}','UserController@getprofile')->name('verprofile');
	Route::put('/editprofile/{user}/update','UserController@putprofile')->name('editprofile');

	Route::resource('/language','LangController');
});

/* FIN AREA DE ADMINISTRACION */