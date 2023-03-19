@extends('layouts.app')

@section('content')
<section class="bg-[url('../../public/bg-waves-white.svg')] dark:bg-[url('../../public/bg-waves.svg')] bg-cover min-h-screen w-full pt-32 selection:bg-green-600 selection:text-white max-lg:pb-10 max-2xl:pb-10">
    <div class="py-8 lg:py-16 px-4 mx-auto max-lg:w-[80%] max-w-screen-md max-h-screen rounded-xl shadow-2xl shadow-primary-900 backdrop-blur-xl">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Mail Generator</h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Besoin d'écrire un mail rapidement ? Donnez-nous les indications nécessaires et on s'occupe du reste !</p>
        <form action="{{ route('translate_form') }}" method="POST" class="space-y-8" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="p-4 bg-red-500 text-white rounded-lg">
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                </div>
                @endforeach
            @endif
            <label for="prompt" class="block m-0 text-sm font-medium text-gray-900 dark:text-gray-300 mb-2">Indications</label>
            <div class="flex flex-auto m-0 h-11">
                <input type="file" name="audio" id="audio" class="block mr-3 w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4 dark:file:bg-gray-700 dark:file:text-gray-400">
                <button type="submit" class="py-3 px-7 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 select-none">Générer</button>
            </div>
            
            <div class="sm:col-span-2 col-span-7">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Génération</label>
                <textarea id="message" name="message" rows="10" class="resize-none overflow-auto block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Veuillez patienter quelques secondes après avoir cliqué sur générer" readonly>{{ $message }}</textarea>
            </div>
        </form>
    </div>
</section>
@endsection