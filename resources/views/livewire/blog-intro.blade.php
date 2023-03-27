<div class="h-full w-full relative">
    <div class="space-y-5 h-auto">
        <label for="prompt" class="block m-0 text-sm font-medium text-gray-900 dark:text-gray-300 mb-2">Titre de l'article</label>
        <div class="flex flex-auto m-0 h-11">
            <input wire:model="input" type="prompt" name="prompt" id="prompt" class="flex-1 mr-2 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm max-lg:text-xs rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="10 raisons pour lesquelles vous devez visiter Paris !" required>
            <button wire:click="submit" wire:loading.attr="disabled" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 select-none">
                Générer
            </button>
        </div>
        <div class="sm:col-span-2 col-span-7 space-y-4 h-96 overflow-y-auto">
            @if ($responses !== [])
                <label for="message" class="block pt-8 mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Génération</label>
            @endif
            @foreach ($responses as $response)
                <div class="relative">
                    <a id="message" name="message" class="overflow-auto h-auto block p-2.5 w-full min-h-10 text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">{{ $response }}</a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none" wire:loading.flex wire:target='submit'>
        <div wire:loading.delay wire:target='submit' class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-blue-500"></div>
    </div>
</div>
