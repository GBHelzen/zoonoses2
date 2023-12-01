<?php

use App\Http\Controllers\Admin\ServicoController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\PessoaController;
use App\Http\Livewire\Admin\Animais\CreateRaca;
use App\Http\Livewire\Admin\Animais\EditRaca;
use App\Http\Livewire\Admin\Animais\IndexRacas;
use App\Http\Livewire\Admin\Animais\ShowAnimal;
use App\Http\Livewire\Admin\ClinicaVeterinaria\CreateClinica;
use App\Http\Livewire\Admin\ClinicaVeterinaria\EditClinica;
use App\Http\Livewire\Admin\ClinicaVeterinaria\IndexClinicas;
use App\Http\Livewire\Admin\Documentos\CreateDocumento;
use App\Http\Livewire\Admin\Documentos\EditDocumento;
use App\Http\Livewire\Admin\Documentos\IndexDocumentos;
use App\Http\Livewire\Admin\Endereco\ShowEnderecoPessoas;
use App\Http\Livewire\Admin\Logs\Index;
use App\Http\Livewire\Admin\Logs\Show;
use App\Http\Livewire\Admin\Ong\ShowOng;
use App\Http\Livewire\Admin\PainelMetaBase;
use App\Http\Livewire\Admin\Pessoas\ShowPessoa;
use App\Http\Livewire\Admin\Users\ShowUsers;
use App\Http\Livewire\Auth\Cadastro;
use App\Http\Livewire\Ong\Animais\CreateOrUpdateAnimal;
use App\Http\Livewire\Ong\Perfil;
use App\Http\Livewire\Ong\PerfilResponsavel;
use App\Http\Livewire\Pessoas\Animal\ShowAnimais;
use App\Http\Livewire\Pessoas\ShowPerfilPessoa;
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

// Rotas públicas

Route::get('/', function () {
    return view('index');
});

Route::get('/cadastro', Cadastro::class)->name('cadastro');
Route::post('/cadastro', [PessoaController::class, 'store'])->name('store.cadastro');
// Route::impersonate();
// END Rotas públicas

// Rotas painel documentos
// Route::get('/admin/documentos', [DocumentoController::class, 'index'])->name('documentos.index');
// Route::get('/admin/documentos/create', [DocumentoController::class, 'create'])->name('documentos.create');
// Route::post('/admin/documentos', [DocumentoController::class, 'store'])->name('documentos.store');
// Route::get('/documentos/{filename}', [DocumentoController::class, 'show'])->name('documentos.show');
// Route::get('/admin/documentos/{filename}/edit', EditDocumento::class)->name('documentos.edit');

Route::get('/admin/documentos', IndexDocumentos::class)->name('documentos.index');
Route::get('/documentos/create', CreateDocumento::class)->name('documentos.create');
Route::get('/documentos/{filename}/edit', EditDocumento::class)->name('documentos.edit');

// Rotas para o cidadão
Route::prefix('/cidadao')->middleware('auth')->group(function () {

    Route::get('/{user}/profile', [PessoaController::class, 'show'])->name('pessoas.show');

    Route::get('/dashboard', function () {
        return view('pessoas.dashboard');
    })->name('dashboard');
});

// Rotas para as ongs

Route::prefix('/ong')->middleware('auth', 'role:ong-admin')->group(function () {

    Route::get('{ong}/animal/{animal}/edit', CreateOrUpdateAnimal::class)->name('ong.animais.edit');

    Route::get('/{ong}/perfil', Perfil::class)->name('ongs.profile');

    Route::get('/{ong}/responsavel/{user}/perfil', PerfilResponsavel::class)->name('ong.responsavel.perfil');

    Route::get('{ong}/animal/create', CreateOrUpdateAnimal::class)->name('ong.animais.create');

    Route::get('/dashboard', function () {
        return view('ong.dashboard');
    })->name('ong.dashboard');
});

Route::prefix('/admin')->middleware(['auth'])->group(function () {
Route::get('/impersonate_leave', [PessoaController::class, 'impersonateLeave'])->name('impersonate_leave');
});

// Rotas administrativas
Route::prefix('/admin')->middleware(['auth', 'role:administrador|super-admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');


    })->name('admin.dashboard');

    Route::get('/painel-meta-base', PainelMetaBase::class)->name('admin.painel-meta-base');

    Route::get('/ongs/{ong}/show', ShowOng::class)->name('admin.ong.show');

    Route::get('/perfil/{pessoa}', ShowPerfilPessoa::class)->name('admin.pessoa.show');


    Route::get('/pessoas', ShowUsers::class)->name('pessoas.index');
    Route::get('/impersonate/{id}', [PessoaController::class, 'impersonate'])->name('impersonate');
    Route::get('/pessoas/{id}/add-roles', [PessoaController::class, 'addRoles'])->name('pessoas.add-roles');
    Route::get('/pessoas/{id}/edit-password', [PessoaController::class, 'editPassword'])->name('pessoas.edit-password');
    Route::post('/pessoas/{id}/update-password', [PessoaController::class, 'updatePassword'])->name('pessoas.update-password');

    Route::get('/servico/{servico}/clinica/{clinica}/imprimir-guia', [ServicoController::class, 'imprimirGuia'])->name('imprimir-guia');


    Route::get('/clinicas', IndexClinicas::class)->name('clinicas.index');
    Route::get('/clinicas/create', CreateClinica::class)->name('clinicas.create');
    Route::get('/clinicas/{clinica}/edit', EditClinica::class)->name('clinicas.edit');



    Route::get('/racas', IndexRacas::class)->name('racas.index');
    Route::get('/racas/create', CreateRaca::class)->name('racas.create');
    Route::get('/racas/{raca}/edit', EditRaca::class)->name('racas.edit');
    Route::get('/animais/{animal}/show', ShowAnimal::class)->name('animais.show');
    Route::get('/pessoas/{pessoa}/show', ShowPessoa::class)->name('admin.pessoas.show');

    Route::get('/logs', Index::class)->middleware('role:super-admin')->name('logs.index');
    Route::get('/logs/{log}', Show::class)->middleware('role:super-admin')->name('logs.show');

    Route::get('/endereco/{endereco}/pessoas', ShowEnderecoPessoas::class)->name('endereco.pessoas.show');

    /* Registration Routes... */
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('d.register');
    Route::post('register', 'Auth\RegisterController@register');

});


require __DIR__ . '/auth.php';
