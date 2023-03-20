@extends('layouts.app')
@section('content')
    <div class="min-h-screen text-black dark:text-white bg-[url('../../public/bg-waves-white.svg')] dark:bg-[url('../../public/bg-waves.svg')] bg-cover bg-center flex flex-col justify-center items-center">
        <div class="max-w-3xl h-110 rounded-2xl shadow-2xl shadow-blue-800 bg-white dark:bg-[#001220] p-8 flex flex-col justify-center items-center">
            <img src="{{ asset('askwiselogo.webp') }}" class="h-20 sm:h-32 mb-8 select-none" alt="Askwise Logo" />
            <h1 class="text-4xl md:text-6xl font-bold mb-4 selection:bg-green-600">AskWise</h1>
            <p class="text-lg md:text-2xl text-center mb-8 selection:bg-green-600">The first all-in-one AI website</p>
            <div class="flex justify-center">
                <a href="{{ route('ias') }}" class="px-6 py-3 text-md font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 mx-3 md:mx-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:shadow-lg hover:shadow-blue-600 select-none">Get started</a>
            </div>
        </div>
    </div>
@endsection