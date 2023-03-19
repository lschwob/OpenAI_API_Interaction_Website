@extends('layouts.app')

@section('content')
<section class="bg-[url('../../public/bg-waves-white.svg')] dark:bg-[url('../../public/bg-waves.svg')] bg-cover min-h-screen w-full pt-32 selection:bg-green-600 selection:text-white sm:pb-10">
    <div class="py-8 lg:py-16 px-4 mx-auto max-lg:w-[80%] max-w-screen-md max-h-screen rounded-xl shadow-2xl shadow-primary-900 backdrop-blur-xl">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Image Generator</h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Vous pouvez tout créer ! Il vous suffit d'entrer les indications nécessaires pour créer votre image.</p>
        <form id="form" action="" method="POST" class="space-y-8" enctype='multipart/form-data'>
            @csrf
            @if ($errors->any())
            <div class="p-4 bg-red-500 text-white rounded-lg">
                <ul>
                    <li>Les indications sont trop courtes... Vous devez entrer au moins 10 caractères.</li>
                </ul>
            </div>
            @endif
            <label for="prompt" class="block m-0 text-sm font-medium text-gray-900 dark:text-gray-300 mb-2">Indications</label>
            <div class="flex flex-auto m-0 h-11">
                <textarea type="prompt" name="prompt" id="prompt" class="flex-1 mr-2 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Image d'un chien qui joue à la balle sur la Lune..." required style="resize: none;">{{ $prompt }}</textarea>
                <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 select-none">Générer</button>
            </div>
            <div class="sm:col-span-2 col-span-7">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Génération</label>
                @if (strpos($message, 'http') !== false)
                    <a href="{{ $message }}" target="_blank" class="w-auto mb-5">
                        <img src="{{ $message }}" alt="Generated image" class="w-64 h-auto mx-auto block rounded-xl md:w-80 xl:w-96 shadow-xl shadow-black" />
                    </a>
                @else
                    <textarea id="message" name="message" rows="10" class="resize-none overflow-auto block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Veuillez patienter quelques secondes après avoir cliqué sur générer... Cliquez sur l'image pour la télécharger" readonly>{{ $message }}</textarea>
                @endif

            </div>
        </form>
    </div>
</section>
@endsection