@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-white dark:bg-[#001220] selection:bg-green-600">
  <h1 class="text-3xl text-center font-bold tracking-tight text-white mt-10 mb-8 sm:mb-10 max-lg:mt-24">
    Liste des IAs
  </h1>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mx-8 mb-10 w-[90%]">
    @foreach ($ias->sortBy('class') as $ia)<!--Sort the $ias array according to the "class" attribute of the $ia for displaying $ia free first and then $ia premium--> 
    <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden sm:hover:translate-x-2 hover:-translate-y-2 hover:shadow-xl max-sm:shadow-sm hover:shadow-blue-600 transition-all">
      <a href="{{ $ia->link }}">
        <div class="bg-gray-200 dark:bg-gray-700 h-56 sm:h-64 md:h-72 lg:h-80 flex-shrink-0 flex items-center justify-center">
          <i class="{{ $ia->image }} text-8xl sm:text-9xl md:text-10xl lg:text-12xl text-[#1974E9] dark:text-[#001220]"></i>
        </div>          
        <div class="p-4 sm:p-6 lg:p-8">
          <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $ia->title }}</h3>
          <p class="text-gray-600 dark:text-gray-300 text-sm">{{ $ia->description }}</p>
        </div>
      </a>
    </div>    
  @endforeach
  </div>
</div>

@endsection