<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response()->json("Sekolahku API", 200);
});

Route::group(['prefix' => 'user'], function () {
    Route::post('create', 'Api\UserController@create');
    Route::get('list', 'Api\UserController@list');
    Route::get('read', 'Api\UserController@read');
    Route::put('update', 'Api\UserController@update');
    Route::delete('delete', 'Api\UserController@delete');
});

Route::group(['prefix' => 'religion'], function () {
    Route::post('create', 'Api\ReligionController@create');
    Route::get('list', 'Api\ReligionController@list');
    Route::get('read', 'Api\ReligionController@read');
    Route::put('update', 'Api\ReligionController@update');
    Route::delete('delete', 'Api\ReligionController@delete');
});

Route::group(['prefix' => 'student'], function () {
    Route::post('create', 'Api\StudentController@create');
    Route::get('list', 'Api\StudentController@list');
    Route::get('read', 'Api\StudentController@read');
    Route::put('update', 'Api\StudentController@update');
    Route::delete('delete', 'Api\StudentController@delete');
});

Route::group(['prefix' => 'staff'], function () {
    Route::post('create', 'Api\StaffController@create');
    Route::get('list', 'Api\StaffController@list');
    Route::get('read', 'Api\StaffController@read');
    Route::put('update', 'Api\StaffController@update');
    Route::delete('delete', 'Api\StaffController@delete');
});

Route::group(['prefix' => 'blogCategory'], function () {
    Route::post('create', 'Api\BlogCategoryController@create');
    Route::get('list', 'Api\BlogCategoryController@list');
    Route::get('read', 'Api\BlogCategoryController@read');
    Route::put('update', 'Api\BlogCategoryController@update');
    Route::delete('delete', 'Api\BlogCategoryController@delete');
});

Route::group(['prefix' => 'blog'], function () {
    Route::post('create', 'Api\BlogController@create');
    Route::get('list', 'Api\BlogController@list');
    Route::get('read', 'Api\BlogController@read');
    Route::put('update', 'Api\BlogController@update');
    Route::delete('delete', 'Api\BlogController@delete');
});

Route::group(['prefix' => 'event'], function () {
    Route::post('create', 'Api\EventController@create');
    Route::get('list', 'Api\EventController@list');
    Route::get('read', 'Api\EventController@read');
    Route::put('update', 'Api\EventController@update');
    Route::delete('delete', 'Api\EventController@delete');
});

Route::group(['prefix' => 'class'], function () {
    Route::post('create', 'Api\ClassesController@create');
    Route::get('list', 'Api\ClassesController@list');
    Route::get('read', 'Api\ClassesController@read');
    Route::put('update', 'Api\ClassesController@update');
    Route::delete('delete', 'Api\ClassesController@delete');
});

Route::group(['prefix' => 'canteen'], function () {
    Route::post('create', 'Api\CanteenController@create');
    Route::get('list', 'Api\CanteenController@list');
    Route::get('read', 'Api\CanteenController@read');
    Route::put('update', 'Api\CanteenController@update');
    Route::delete('delete', 'Api\CanteenController@delete');
});

Route::group(['prefix' => 'building'], function () {
    Route::post('create', 'Api\BuildingController@create');
    Route::get('list', 'Api\BuildingController@list');
    Route::get('read', 'Api\BuildingController@read');
    Route::put('update', 'Api\BuildingController@update');
    Route::delete('delete', 'Api\BuildingController@delete');
});

Route::group(['prefix' => 'courses'], function () {
    Route::post('create', 'Api\CoursesController@create');
    Route::get('list', 'Api\CoursesController@list');
    Route::get('read', 'Api\CoursesController@read');
    Route::put('update', 'Api\CoursesController@update');
    Route::delete('delete', 'Api\CoursesController@delete');
});

Route::group(['prefix' => 'book-category'], function () {
    Route::post('create', 'Api\BookCategoryController@create');
    Route::get('list', 'Api\BookCategoryController@list');
    Route::get('read', 'Api\BookCategoryController@read');
    Route::put('update', 'Api\BookCategoryController@update');
    Route::delete('delete', 'Api\BookCategoryController@delete');
});

Route::group(['prefix' => 'extracurricular'], function () {
    Route::post('create', 'Api\ExtracurricularController@create');
    Route::get('list', 'Api\ExtracurricularController@list');
    Route::get('read', 'Api\ExtracurricularController@read');
    Route::put('update', 'Api\ExtracurricularController@update');
    Route::delete('delete', 'Api\ExtracurricularController@delete');
});

Route::group(['prefix' => 'student-councils'], function () {
    Route::post('create', 'Api\StudentCouncilsController@create');
    Route::get('list', 'Api\StudentCouncilsController@list');
    Route::get('read', 'Api\StudentCouncilsController@read');
    Route::put('update', 'Api\StudentCouncilsController@update');
    Route::delete('delete', 'Api\StudentCouncilsController@delete');
});

Route::group(['prefix' => 'student_trak'], function () {
    Route::post('create', 'Api\StudentTrackController@create');
    Route::get('list', 'Api\StudentTrackController@list');
    Route::get('read', 'Api\StudentTrackController@read');
    Route::put('update', 'Api\StudentTrackController@update');
    Route::delete('delete', 'Api\StudentTrackController@delete');
});

Route::group(['prefix' => 'book'], function () {
    Route::post('create', 'Api\BookController@create');
    Route::get('list', 'Api\BookController@list');
    Route::get('read', 'Api\BookController@read');
    Route::put('update', 'Api\BookController@update');
    Route::delete('delete', 'Api\BookController@delete');
});

Route::group(['prefix' => 'book_reg'], function () {
    Route::post('create', 'Api\BookRegistrationController@create');
    Route::get('list', 'Api\BookRegistrationController@list');
    Route::get('read', 'Api\BookRegistrationController@read');
    Route::put('update', 'Api\BookRegistrationController@update');
    Route::delete('delete', 'Api\BookRegistrationController@delete');
});
Route::group(['prefix' => 'borrowing'], function () {
    Route::post('create', 'Api\BorrowingController@create');
    Route::get('list', 'Api\BorrowingController@list');
    Route::get('read', 'Api\BorrowingController@read');
    Route::put('update', 'Api\BorrowingController@update');
    Route::delete('delete', 'Api\BorrowingController@delete');
});

Route::group(['prefix' => 'criticism-suggestion'], function () {
    Route::post('create', 'Api\CriticismCategoriesController@create');
    Route::get('list', 'Api\CriticismCategoriesController@list');
    Route::get('read', 'Api\CriticismCategoriesController@read');
    Route::put('update', 'Api\CriticismCategoriesController@update');
    Route::delete('delete', 'Api\CriticismCategoriesController@delete');
});

Route::group(['prefix' => 'author'], function () {
    Route::post('create', 'Api\AuthorController@create');
    Route::get('list', 'Api\AuthorController@list');
    Route::get('read', 'Api\AuthorController@read');
    Route::put('update', 'Api\AuthorController@update');
    Route::delete('delete', 'Api\AuthorController@delete');
});

Route::group(['prefix' => 'school_structures'], function () {
    Route::post('create', 'Api\SchoolStructuresController@create');
    Route::get('list', 'Api\SchoolStructuresController@list');
    Route::get('read', 'Api\SchoolStructuresController@read');
    Route::put('update', 'Api\SchoolStructuresController@update');
    Route::delete('delete', 'Api\SchoolStructuresController@delete');
});

Route::group(['prefix' => 'member'], function () {
    Route::post('create', 'Api\MemberController@create');
    Route::get('list', 'Api\MemberController@list');
    Route::get('read', 'Api\MemberController@read');
    Route::put('update', 'Api\MemberController@update');
    Route::delete('delete', 'Api\MemberController@delete');
});

Route::group(['prefix' => 'publisher'], function () {
    Route::post('create', 'Api\PublisherController@create');
    Route::get('list', 'Api\PublisherController@list');
    Route::get('read', 'Api\PublisherController@read');
    Route::put('update', 'Api\PublisherController@update');
    Route::delete('delete', 'Api\PublisherController@delete');
});

Route::group(['prefix' => 'teacher'], function () {
    Route::post('create', 'Api\TeacherController@create');
    Route::get('list', 'Api\TeacherController@list');
    Route::get('read', 'Api\TeacherController@read');
    Route::put('update', 'Api\TeacherController@update');
    Route::delete('delete', 'Api\TeacherController@delete');
});
