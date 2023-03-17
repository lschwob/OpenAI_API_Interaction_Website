<footer class="p-4 bg-white md:p-8 lg:p-10 dark:bg-gray-800 shadow-inner shadow-blue-900">
    <div class="mx-auto max-w-screen-xl text-center">
        <a href="#" class="flex justify-center items-center text-2xl font-semibold text-gray-900 dark:text-white">
            <img src="{{ asset('askwiselogo.png') }}" class="mr-3 h-6 sm:h-9" alt="Askwise Logo" />
            AskWise    
        </a>
        <p class="my-6 text-gray-500 dark:text-gray-400">The first all in one AI website.</p>
        <ul class="flex flex-wrap justify-center items-center mb-6 text-gray-900 dark:text-white">
            <li>
                <a href="{{ route('home') }}" class="mr-4 hover:underline md:mr-6 ">Home</a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="mr-4 hover:underline md:mr-6 ">About</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Premium</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">FAQs</a>
            </li>
            <li>
                <a href="{{ route('contact') }}" class="mr-4 hover:underline md:mr-6">Contact</a>
            </li>
        </ul>
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022-2023 <a href="{{ route('home') }}" class="hover:underline">AskWise™</a>. All Rights Reserved.</span>
    </div>
  </footer>