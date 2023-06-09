@extends('layouts.app')

@section('titulo')
    @if (auth()->user() && auth()->user()->username == $user->username)
        Tú perfil        
    @else
        Perfil de: {{$user->username}}    
    @endif
@endsection

@section('contenido')
    <div class="flex justify-center ">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center sm:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img  class="rounded-full"src={{$user->imagen ? asset('perfiles'). '/' .$user->imagen : asset('img/usuario.svg')}} alt="imagen usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center py-10 md:py-0 md:items-start">
                <div class="flex items-center gap-2 ">
                    <p class="text-gray-700 text-2xl my-5">{{$user->username}}</p>

                    @auth
                        @if($user->id === auth()->user()->id)
                            <a 
                                href={{route('perfil.index')}}
                                class="text-gray-500 hover:text-gray-900 hover:cursor-pointer border-solid border-2 border-gray-100 hover:border-gray-500"
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                            </a>
                        @endif
                    @endauth
                </div>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->followers->count()}}
                    <span class="font-normal">@choice('Seguidor|Seguidores', $user->followers->count())</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->followings->count()}}
                    <span class="font-normal">Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$user->posts->count()}}
                    <span class="font-normal">Posts</span>
                </p>
                
                @auth    
                    @if (auth()->user() && auth()->user()->username !== $user->username)
                    @php
                        $siguiendo = $user->siguiendo(auth()->user());
                    @endphp
                        <form 
                            action={{$siguiendo ? route('user.unfollow', $user) : route('user.follow', $user)}}
                            method="POST"
                        >
                            @if ($siguiendo)
                                @method('DELETE')
                            @endif
                            
                            @csrf
                            <input 
                                type="submit"
                                class="{{$siguiendo ? 'bg-red-600' : 'bg-blue-600'}} text-white uppercase px-3 py-1 text-xs font-bold cursor-pointer rounded"
                                value="{{$siguiendo ? 'dejar de seguir' : 'seguir'}}"
                            />
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

        <x-listar-post :posts="$posts"/>

    </section>
@endsection