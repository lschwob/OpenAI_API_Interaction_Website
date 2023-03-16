@extends('layouts.app')
@section('content')
    <div class="flex flex-col items-center justify-center h-screen text-white">
        <img src="{{ asset('askwiselogo.png') }}" class="h-20 sm:h-32" alt="Askwise Logo" />
        <h1 class="text-6xl font-bold">AskWise</h1>
        <p class="text-2xl">The first all-in-one AI website</p>
        <div class="flex md:order-2">
            <a href="{{ route('ias') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-8 py-2.5 text-center mr-3 md:mr-0 mt-10 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:shadow-lg hover:shadow-blue-600">Get started</a>
        </div>
    </div>
@endsection