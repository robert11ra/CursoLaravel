<?php

use App\Http\Controllers\AnswerController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/foro', [QuestionController::class, 'index'])->name('questions.index');

Route::get('/foro/crear', [QuestionController::class, 'create'])->name('questions.create')->middleware('auth');
Route::post('/foro', [QuestionController::class, 'store'])->name('questions.store')->middleware('auth');

Route::get('/foro/{question:slug}/editar', [QuestionController::class, 'edit'])->name('questions.edit')->middleware('auth', 'can:update,question');
Route::put('/foro/{question}', [QuestionController::class, 'update'])->name('questions.update')->middleware('auth', 'can:update,question');

Route::get('/foro/{question:slug}', [QuestionController::class, 'show'])->name('questions.show');
Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('question.destroy')->middleware('auth', 'can:delete,question');

Route::post('/answers/{question}/', [AnswerController::class, 'store'])->name('answer.store')->middleware('auth');



Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
