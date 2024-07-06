<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CotiserController;
use App\Http\Controllers\EcheanceController;
use App\Http\Controllers\ParticiperController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TontineController;
use App\Models\Cotiser;
use App\Models\Tontine;
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
//page acceuil
Route::get('/', function () {
    return view('acceuil');
});
//page acceuil pour les utilisateurs connecteees
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//creation tonine
Route::get('/tontine/creationtontine', [TontineController::class, 'create'])->name('tontine.create')->middleware(['auth', 'verified']);

//stocker tontine creer
Route::post('/tontine/stockage', [TontineController::class, 'store'])->name('tontine.store')->middleware(['auth', 'verified']);
//voir detail tontine
Route::get('/tontine/deatil/{tontine}', [TontineController::class, 'show'])->name('tontine.show')->middleware(['auth', 'verified']);
//creer echeances d'une tontine
Route::get('/echeance/creer/{tontine}', [EcheanceController::class, 'create'])->name('echeance.create')->middleware(['auth', 'verified']);
//lister les tontines disponibles
Route::get('/lister/touslestontine/disponible', [TontineController::class, 'index'])->name('tontine.index')->middleware(['auth', 'verified']);
//ajouter un participant dans une tontine
Route::get('/participer/tontine/{tontine}', [ParticiperController::class, 'create'])->name('participer.create')->middleware(['auth', 'verified']);
Route::post('/participer/tontine/finalisation/{tontine}', [ParticiperController::class, 'store'])->name('participer.store')->middleware(['auth', 'verified']);
//mes tontines participees
Route::get('/mestontines/participers', [TontineController::class, 'mesTontinesParticipers'])->name('tontine.mestontinesparticipers')->middleware(['auth', 'verified']);
//mes tontines creer
Route::get('/mestontines/creer', [TontineController::class, 'mesTontinesCreer'])->name('tontine.mestontinescreer')->middleware(['auth', 'verified']);
//payer l'argent
Route::get('/payer/dansuner/tontine/{tontine}', [CotiserController::class, 'create'])->name('cotiser.create')->middleware(['auth', 'verified']);
//administrateur liste les utilisateurs
Route::get('/admin/lister/inscrits', [Controller::class, 'index'])->name('controller.index')->middleware(['auth', 'verified']);
//administrateur liste les demandes de creation de tontine
Route::get('/admin/lister/demandecreationtontine', [TontineController::class, 'listerLesDemandeCreationTontine'])->name('tontine.lesDemandesCreationTontine')->middleware(['auth', 'verified']);
//reponse a une creation de tontine
Route::get('/admin/reponse/creationdetontine/{tontine}/{type}', [Controller::class, 'reponseCreationTontine'])->name('controller.reponsecreationtontine')->middleware(['auth', 'verified']);
//le  propritaire met fin la tontine
Route::get('/tontine/proprietaire/terminer/{tontine}', [TontineController::class, 'terminerTontine'])->name('tontine.terminertontine')->middleware(['auth', 'verified']);
//telecharger les informations d'une tontine
Route::get('/tontine/proprietaire/telecharger/information/{tontine}', [TontineController::class, 'telechargerFichierPdf'])->name('tontine.telechargerinformation')->middleware(['auth', 'verified']);
//modification compte
Route::match(['get','post'],'/utilisateur/rmodifier/compte', [Controller::class, 'modifierCompte'])->name('controller.modifiercompte')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
