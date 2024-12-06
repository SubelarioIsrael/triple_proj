<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginVoiceController;
use App\Http\Controllers\RegisterVoiceController;
use App\Http\Controllers\WelcomeController;

// Student
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MoodTrackController;
use App\Http\Controllers\ExerciseStartController;
use App\Http\Controllers\ExercisesController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\HotlinesController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\OnlineResourceController;
use App\Http\Controllers\ChatbotController;

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminFeedbackController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AdminResourcesController;
use App\Http\Controllers\AdminNotificationsController;
use App\Http\Controllers\AdminMTQController;



use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::resource('user', UserController::class);


Route::middleware(['auth', 'student'])->name('student.')->group(function () {
    // Sidebar
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    // Edit Profile
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

    // Chatbot
    Route::get('/chat', [ChatbotController::class, 'index'])->name('chat');

    Route::get('/track-your-mood', [MoodTrackController::class, 'index'])->name('track-your-mood');
    Route::get('/results', [MoodTrackController::class, 'showResults'])->name('mood.results');
    Route::post('/track-your-mood/store', [MoodTrackController::class, 'store'])->name('store-mood');

    // Feedback
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');

    // Results and exercises
    Route::get('/results/{timestamp}', [ResultsController::class, 'show'])->name('results.show');
    Route::get('/exercises', [ExercisesController::class, 'index'])->name('exercises');
    Route::get('/exercise/{name}', [ExerciseStartController::class, 'show'])->name('exercise.show');

    // About Us
    Route::get('/About-us', [AboutUsController::class, 'index'])->name('about-us');

    // Hotlines
    Route::get('/hotlines', [HotlinesController::class, 'index'])->name('hotlines');
    Route::get('/call/{hotline-name}', [CallController::class, 'index'])->name('call');

    // Online Resources
    Route::get('/resource', [OnlineResourceController::class, 'index'])->name('online-resources');
});



Route::name('admin.')->group(function () {
    Route::get('/home-admin', [AdminHomeController::class, 'index'])->name('home');
    Route::get('/feedback-admin', [AdminFeedbackController::class, 'index'])->name('feedback');

    Route::get('/accounts', [AccountsController::class, 'index'])->name('accounts');
    Route::delete('/admin/users/{id}', [AccountsController::class, 'destroy'])->name('users.destroy');

    // notifications
    Route::get('/notifications', [AdminNotificationsController::class, 'index'])->name('notifications');
    Route::post('/notifications', [AdminNotificationsController::class, 'store'])->name('notifications.store');
    Route::delete('/admin/notifications/{id}', [AdminNotificationsController::class, 'destroy'])->name('notifications.delete');

    Route::get('/mtq', [AdminMTQController::class, 'index'])->name('mtq');
    Route::get('/admin/mtq/{id}/edit', [AdminMTQController::class, 'edit'])->name('mtq.edit');
    Route::put('/admin/mtq/{id}', [AdminMTQController::class, 'update'])->name('mtq.update');


    // Add other admin-specific routes here
});

// Admin Resources and Articles Routes
Route::prefix('admin-resources')->group(function () {
    Route::get('/resources', [AdminResourcesController::class, 'index'])->name('admin-resources.index'); // Show all resources and articles

    // Resource routes
    Route::post('/resources/store', [AdminResourcesController::class, 'storeResource'])->name('admin-resources.store-resource'); // Store a new resource
    Route::put('/resources/{id}', [AdminResourcesController::class, 'updateResource'])->name('admin-resources.edit-resource'); // Update an existing resource

    // Article routes
    Route::post('/articles', [AdminResourcesController::class, 'storeArticle'])->name('admin-resources.store-article'); // Store a new article
    Route::put('/articles/{id}', [AdminResourcesController::class, 'updateArticle'])->name('admin-resources.edit-article'); // Update an existing article
});


Route::name('authentication.')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('sign-in');
    Route::post('/', [LoginController::class, 'authenticate'])->name('sign-in.authenticate');
    Route::get('/Register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.validate');
    Route::get('/Sign-in/Voice', [LoginVoiceController::class, 'index'])->name('sign-in-voice');
    Route::get('/Register/Voice', [RegisterVoiceController::class, 'index'])->name('register-voice');
    Route::get('/Welcome-back', [WelcomeController::class, 'index'])->name('welcome-back');
});

Route::post('/logout', function () {
    Auth::logout(); // Log the user out
    return redirect()->route('authentication.sign-in'); // Redirect to login page
})->name('logout');