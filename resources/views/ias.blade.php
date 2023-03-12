@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen">
    <h1 class="text-3xl text-center font-bold tracking-tight text-white -mt-28 mb-10">
        Liste des IAs
    </h1>
    <div class="grid grid-cols-4 row">
        @foreach ($ias as $ia)
        <div class="flex justify-center mx-12 mb-12">
            <div
              class="block max-w-sm rounded-lg bg-white shadow-lg dark:bg-gray-900 shadow-blue-900">
              <a href="#!" data-te-ripple-init data-te-ripple-color="light">
                <img
                  class="rounded-t-lg"
                  src="{{ $ia->image }}"
                  alt="" />
              </a>
              <div class="p-6">
                <h5
                  class="mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
                  {{  $ia->title  }}
                </h5>
                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                    {{  $ia->description  }}
                </p>
                <a
                  href="{{  $ia->link  }}"
                  class="inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]"
                  data-te-ripple-init
                  data-te-ripple-color="light">
                  Lancer
                </a>
              </div>
            </div>
          </div>
        @endforeach
    </div>
</div>
@endsection