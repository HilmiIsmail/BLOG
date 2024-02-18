<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Category::orderBy('id')->paginate(5);
        return view('categorias.inicio', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validación de campos
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'unique:categories,nombre'],
            'descripcion' => ['required', 'string', 'min:10']
        ]);

        //Almacenamiento en la base de datos
        Category::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('categories.index')->with('mensaje', 'Categoria agregada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categorias.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'unique:categories,nombre,' . $category->id],
            'descripcion' => ['required', 'string', 'min:5'],
        ]);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('mensaje', "Categoría Editada");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('mensaje', 'La categoria se ha eliminado correctamente');
    }
}
