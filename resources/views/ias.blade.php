@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-white dark:bg-[#001220] selection:bg-green-600">
  <h1 class="text-3xl text-center font-bold tracking-tight text-white mt-10 mb-8 sm:mb-10 max-lg:mt-24">
    Liste des IAs
  </h1>
  <livewire:search-ias />
</div>
@livewireScripts
@endsection