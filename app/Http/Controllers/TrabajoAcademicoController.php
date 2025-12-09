<?php

namespace App\Http\Controllers;

use App\Models\TrabajoAcademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TrabajoAcademicoController extends Controller
{
    // LISTAR TRABAJOS
    public function index()
    {
        $trabajos = TrabajoAcademico::with('user')
            ->latest()
            ->paginate(10);

        return view('trabajos.index', compact('trabajos'));
    }

    // MOSTRAR FORMULARIO DE CREACIÓN
    public function create()
    {
        $estados = [
            'en_revision'        => 'En revisión',
            'aceptado_revision'  => 'Aceptado para revisión',
            'aprobado'           => 'Aprobado',
        ];

        return view('trabajos.create', compact('estados'));
    }

    // GUARDAR NUEVO TRABAJO
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor'  => 'required|string|max:255',
            'anio'   => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'asesor' => 'nullable|string|max:255',
            'estado' => 'required|in:en_revision,aceptado_revision,aprobado',
            'lugar'  => 'required|string|max:255',

            // VALIDACIÓN DEL PDF + VALIDACIÓN DEL NOMBRE DEL ARCHIVO
            'pdf' => [
                'required',
                'file',
                'mimes:pdf',
                'max:20480', // 20 MB
                function ($attribute, $value, $fail) {
                    if ($value && strlen($value->getClientOriginalName()) > 80) {
                        $fail('El nombre del archivo no puede tener más de 80 caracteres.');
                    }
                },
            ],
        ]);

        // GUARDAR ARCHIVO
        $path = $request->file('pdf')->store('trabajos', 'public');

        // CREAR REGISTRO
        TrabajoAcademico::create([
            'user_id'  => Auth::id(),
            'titulo'   => $request->titulo,
            'autor'    => $request->autor,
            'anio'     => $request->anio,
            'asesor'   => $request->asesor,
            'estado'   => $request->estado,
            'lugar'    => $request->lugar,
            'ruta_pdf' => $path,
        ]);

        return redirect()
            ->route('trabajos.index')
            ->with('success', 'Trabajo registrado correctamente.');
    }

    // MOSTRAR DETALLE DE UN TRABAJO
    public function show(TrabajoAcademico $trabajo)
    {
        return view('trabajos.show', compact('trabajo'));
    }

    // ELIMINAR TRABAJO
    public function destroy(TrabajoAcademico $trabajo)
    {
        if ($trabajo->user_id !== Auth::id()) {
            abort(403);
        }

        Storage::disk('public')->delete($trabajo->ruta_pdf);
        $trabajo->delete();

        return redirect()
            ->route('trabajos.index')
            ->with('success', 'Trabajo eliminado correctamente.');
    }
}
