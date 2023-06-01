@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="lg:flex lg:justify-center lg:gap-10 lg:items-center">
        <div class="lg:w-6/12 p-2">
            <img src="{{asset('img/registrar.jpg')}}" alt="imagen registro de usuarios">
        </div>
        <div class="lg:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action={{route('register')}} method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input 
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Tu nombre"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{old('name')}}"
                    >
                    @error('name')
                        <p
                            class="bg-red-500 text-red-950 my-2 rounded-lg text-sm p-2 text-center font-bold"
                        >{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Nombre de usuario</label>
                    <input 
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{old('username')}}"
                    >
                    @error('username')
                        <p
                            class="bg-red-500 text-red-950 my-2 rounded-lg text-sm p-2 text-center font-bold"
                        >{{$message}}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Correo Electrónico</label>
                    <input 
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Correo electrónico"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{old('email')}}"
                    >
                    @error('email')
                        <p
                            class="bg-red-500 text-red-950 my-2 rounded-lg text-sm p-2 text-center font-bold"
                        >{{$message}}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
                    <input 
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Contraseña"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                    >
                    @error('password')
                        <p
                            class="bg-red-500 text-red-950 my-2 rounded-lg text-sm p-2 text-center font-bold"
                        >{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Contraseña</label>
                    <input 
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repite tu Contraseña"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                    />
                </div>
                <input 
                    type="submit" 
                    value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"    
                >
            </form>
        </div>
    </div>

@endsection