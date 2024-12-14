<?php

namespace App\Http\Controllers;


use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          // Listar todos los usuarios
       $users = User::all();
       return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar formulario de creación
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $validatedData = $request->validate([
            'numero_socio' => 'nullable|unique:users,numero_socio',
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'nullable|string|max:15',
            'role' => 'required|in:admin,client,guest',
        ]);

        // Encriptar la contraseña antes de guardarla
        $validatedData['password'] = bcrypt($validatedData['password']);
        
         // Crear un nuevo usuario
         User::create($validatedData);

         return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
     
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Mostrar detalles de un usuario
        return view('users.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id); // Busca el usuario o lanza un error 404 si no existe
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validatedData = $request->validate([
        'numero_socio' => 'nullable|unique:users,numero_socio,' . $user->id,
        'name' => 'required|string|max:255',
        'surname' => 'nullable|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required|in:admin,client,guest',
        'phone' => 'nullable|string|max:15',
    ]);

        // Si la contraseña está presente, la encriptamos
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        }

        // Actualizar el usuario con los datos validados
        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
    
        // Eliminar el usuario
        $user->delete();
    
        // Redirigir al listado de usuarios con un mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
