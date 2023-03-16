@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen">
    <h1 class="text-3xl text-center font-bold tracking-tight text-white -mt-28 mb-10">
        Liste des IAs
    </h1>
    <div class="grid grid-cols-4 row">
        @foreach ($ias as $ia)
          <div class="rounded-2xl mr-8 mt-16 bg-gradient-to-r from-blue-500 via-blue-800 to-purple-900 p-1 shadow-xl shadow-blue-900 hover:transition-transform hover:-translate-y-2 hover:translate-x-2">
            <a class="block rounded-xl bg-black p-4 sm:p-6 lg:p-8" href="{{ $ia->link }}">
              <div class="mt-16">
                <h3 class="text-lg font-bold text-white sm:text-xl">
                  {{  $ia->title  }}
                </h3>
                <p class="mt-2 text-sm text-gray-500 text">
                  {{  $ia->description  }}
                </p>
              </div>
            </a>
          </div>
        @endforeach
    </div>
</div>
@endsection