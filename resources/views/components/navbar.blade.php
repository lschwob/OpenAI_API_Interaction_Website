<nav class="bg-white border-blue-800 max-lg:py-0 max-lg:px-0 max-lg:border-0 px-4 lg:px-6 py-3.5 dark:bg-gray-800 border-b-2 border-opacity-80">
  <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-lg flex-1">
      <a href="{{ route('home') }}" class="flex items-center max-lg:hidden select-none">
        <img src="{{ asset('askwiselogo.png') }}" class="mr-3 h-8 sm:h-12" alt="Askwise Logo" />
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">AskWise</span>
      </a>
      <ion-icon name="menu-outline" id="menu" class="lg:hidden absolute text-5xl top-9 right-10 text-blue-500 z-40 cursor-pointer select-none"></ion-icon>
      <a href="{{ route('home') }}">
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white lg:hidden absolute top-11 left-24 z-40 select-none">AskWise</span>
        <img src="{{ asset('askwiselogo.png') }}" class="mr-3 h-12 self-center lg:hidden absolute top-8 left-10 z-40 select-none" alt="Askwise Logo" />
      </a>
      <div id="navlinks" class="max-lg:absolute flex max-lg:bg-[url('../../public/bg-waves-white.svg')] dark:max-lg:bg-[url('../../public/bg-waves.svg')] max-lg:bg-cover max-lg:bg-center max-lg:w-full max-lg:h-[100vh] max-lg:top-0 max-lg:left-0 lg:ml-4 lg:mr-28 justify-center items-center lg:mx-auto lg:flex lg:w-auto lg:order-1 navlink transition-menu z-10">
          <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0 lg:mr-64 justify-center max-lg:text-center max-lg:text-2xl selection:bg-green-600 selection:text-white">
            <li>
              @if(\Illuminate\Support\Str::of(url()->current())->contains(['ias/']))
                <a href="{{ route('ias') }}" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-blue-700 lg:p-0 lg:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700 lg:hidden">Previous Page</a>
              @endif
            </li>
            <li>
              <a href="{{ route('home') }}" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded lg:bg-transparent lg:text-blue-700 lg:p-0 dark:text-white" aria-current="page">Home</a>
            </li>
            <li>
              <a href="{{ route('about') }}" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-blue-700 lg:p-0 lg:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About</a>
            </li>
            <li>
              <a href="{{ route('contact') }}" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-blue-700 lg:p-0 lg:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
            </li>
            <li>
              @can('is_admin', Auth::user())
              <a href="{{ route('admin') }}" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-blue-700 lg:p-0 lg:dark:hover:text-red-800 dark:text-red-400 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Admin</a>
              @endcan
            </li>
          </ul>
      </div>
  </div>
</nav>
