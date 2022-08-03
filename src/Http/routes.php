<?php

use Dcat\Admin\Helps\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('terminal', Controllers\TerminalController::class.'@index');

Route::get('helpers/terminal/database', Controllers\TerminalController::class.'@database');
Route::post('helpers/terminal/database', Controllers\TerminalController::class.'@runDatabase');
Route::get('helpers/terminal/artisan', Controllers\TerminalController::class.'@artisan');
Route::post('helpers/terminal/artisan',  Controllers\TerminalController::class.'@runArtisan');

Route::get('helpers/logs',  Controllers\LogController::class.'@index')->name('log-viewer-index');
Route::get('helpers/logs/{file}', Controllers\LogController::class.'@index')->name('log-viewer-file');
Route::get('helpers/logs/{file}/tail', Controllers\LogController::class.'@tail')->name('log-viewer-tail');