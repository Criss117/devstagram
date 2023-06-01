@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-4/5 lg:w-1/2 bg-white shadow p-6">
            <form 
                class="mt-10 md:mt-0"
                action={{route('perfil.store')}}
                method="POST"    
                enctype="multipart/form-data"
            >
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Nombre de usuario</label>
                    <input 
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Tu nombre de ususario"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{auth()->user()->username}}"
                    >
                    @error('username')
                        <p
                            class="bg-red-500 text-red-950 my-2 rounded-lg text-sm p-2 text-center font-bold"
                        >{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen de perfil</label>
                    <input 
                        type="file"
                        id="imagen"
                        name="imagen"
                        class="border p-3 w-full rounded-lg"
                        accept=".jpg, .jpeg, .png"
                    >
                </div>
                <input 
                    type="submit" 
                    value="Guardar cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"    
                >
            </form>
        </div>
    </div>
@endsection