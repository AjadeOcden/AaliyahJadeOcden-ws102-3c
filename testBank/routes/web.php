<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuestionController;

//REGISTRATION ROUTES
Route::get('register', [EmployeesController::class, 'registrationForm'])->name('registrationForm');
Route::post('register', [EmployeesController::class, 'register'])->name('register');

//LOGIN ROUTES
Route::get('login', [EmployeesController::class, 'loginForm'])->name('loginForm');
Route::post("login", [EmployeesController::class, "login"])->name("login");

//LOGOUT ROUTE
Route::post('logout', [EmployeesController::class, "logout"])->name('logout');

//INDEX ROUTE
Route::get('index', [EmployeesController::class, "index"])->name('index');

//ADD SUBJECT RPUTE
Route::get('subject', [SubjectController::class, "subjectForm"])->name('subjectForm');
Route::post('subject', [SubjectController::class, "addSubject"])->name('addSubject');

//EDIT DELETE
Route::get('editForm/{id}', [SubjectController::class, 'editFormSub'])->name('editFormSub');
Route::put('update/{id}', [SubjectController::class, 'updateSub'])->name('updateSub');
Route::delete('/delete/{id}', [SubjectController::class, 'deleteSub'])->name('deleteSub');

//SEARCH SUB
Route::get("search", [SubjectController::class, "search"])->name("search");
//
Route::get("fetchSubjects", [SubjectController::class, "fetchSubjects"]);

Route::get("allQuestions/{sub_code}", [QuestionController::class, "allQuestions"])->name("allQuestions");

//ADD QUESTION
Route::get("question/{sub_name}/{sub_code}", [QuestionController::class, "questionForm"])->name("questionForm");
Route::post("addQuestion", [QuestionController::class, "addQuestion"])->name("addQuestion");


// Route to view the edit form
Route::get('editQuestion/{id}', [QuestionController::class, 'editQuestion'])->name('editQuestion');

// Route to update the question in the database
Route::put('updateQuestion/{id}', [QuestionController::class, 'updateQuestion'])->name('updateQuestion');

// Route to delete the question from the database
Route::delete('/question/delete/{id}', [QuestionController::class, 'deleteQuestion'])->name('deleteQuestion');

//ROUTES FOR GENERATING QUIZ AND DL TO PDF
Route::get('/testForm/{sub_code}', [QuestionController::class, 'testForm'])->name('testForm');
Route::get('/generateTest/{sub_code}', [QuestionController::class, 'generateTest'])->name("generateTest");
Route::get('/previewTest', [QuestionController::class, 'previewTest'])->name("previewTest");

//sort question
Route::get("sort", [QuestionController::class, "sort"])->name("sort");

