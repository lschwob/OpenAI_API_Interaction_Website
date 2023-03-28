<div class="flex flex-col items-center mb-10">
    <div class="w-full max-w-3xl mb-8">
      <div class="flex items-center">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <input wire:model="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
        </div>
      </div>
    </div>
    <div class="grid w-[90%] grid-cols-1 gap-8 mx-8 mt-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 grid-rows-2">
      @foreach ($ias as $ia)
        <div class="block overflow-hidden transition-all bg-white rounded-lg dark:bg-gray-800 hover:shadow-xl max-sm:shadow-sm hover:shadow-blue-600">
          <a href="{{ $ia->link }}" class="h-full">
            <div class="flex items-center justify-center flex-shrink-0 h-56 bg-gray-200 dark:bg-gray-700 sm:h-64 md:h-72 lg:h-80">
              <i class="{{ $ia->image }} text-8xl sm:text-9xl md:text-10xl lg:text-12xl text-[#1974E9] dark:text-[#001220]"></i>
            </div>
            <div class="p-4 sm:p-6 lg:p-8">
              <h3 class="mb-2 text-lg font-bold text-gray-800 dark:text-white">{{ $ia->title }}</h3>
              <p class="text-sm text-gray-600 dark:text-gray-300">{{ $ia->description }}</p>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
