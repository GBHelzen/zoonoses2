<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    public function index()
{
    // Lógica para obter a lista de arquivos do diretório 'public/docs'
    $files = File::files(public_path('docs'));

    // Filtra apenas os arquivos com a extensão .pdf
    $pdfs = array_filter($files, function ($file) {
        return pathinfo($file, PATHINFO_EXTENSION) === 'pdf';
    });

    // Salvar os documentos no banco de dados
    foreach ($pdfs as $pdf) {
        $Arquivo = pathinfo($pdf, PATHINFO_FILENAME);
        $nome_arquivo = 'Nome do Documento';

        // Verifica se o documento já existe no banco de dados
        if (!Documento::where('arquivo', $Arquivo)->exists()) {
            // Salva no banco de dados
            Documento::create([
                'arquivo' => $Arquivo,
                'nome_arquivo' => $nome_arquivo,
                'path' => basename($pdf),
            ]);
        }
    }

    // Recuperar documentos do banco de dados
    $documentos = Documento::all();

    return view('admin.documentos.index-documentos', compact('documentos'));
}
    public function create() 
{
    return view('admin.documentos.create-documento');
}
    public function store(Request $request)
{
    $data = $request->all();
    $data['path'] = '/public/docs';

    Documento::create($data);

    return redirect()->route('documentos.index');
}

    //  public function show($filename)
    //  {
    //      // Lógica para exibir um PDF específico
    //      $documento = Documento::where('arquivo', $filename . '.pdf')->first();

    //      if ($documento) {
    //          $path = public_path($documento->path);

    //          // Verifica se o arquivo existe antes de tentar retorná-lo
    //          if (file_exists($path)) {
    //              return response()->file($path);
    //          }
    //      }

    //      abort(404);
    //  }
}
