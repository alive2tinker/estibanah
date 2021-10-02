<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\FormResponseController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultsExportController;
use App\Http\Resources\FormResource;
use App\Http\Resources\FormResponseResource;
use App\Models\FormResponse;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard',[
        'forms' => FormResource::collection(Auth::user()->forms()->orderby('created_at','desc')->paginate(10)),
        'responses' => count(FormResponse::all()),
        'users' => count(User::all())
    ]);
})->name('dashboard');


Route::middleware(['auth:sanctum','verified'])->resource('forms', FormController::class);
Route::middleware(['auth:sanctum','verified'])->resource('questions', QuestionController::class);
Route::get('/forms/{form}/answer', [FormResponseController::class, 'create'])->name('forms.answer');
Route::post('/formResponses/{form}', [FormResponseController::class, 'store'])->name('formResponses.store');

Route::post('/invitations', InvitationController::class)->name('invitations');

Route::get('/export-results/{form}', ResultsExportController::class)->name('results.export');