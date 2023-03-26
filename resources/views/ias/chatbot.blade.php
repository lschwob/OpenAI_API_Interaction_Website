@extends('layouts.app')

@section('content')
    <main class="bg-[url('../../public/bg-waves-white.svg')] dark:bg-[url('../../public/bg-waves.svg')] bg-cover max-lg:h-[80%] h-screen w-full flex justify-center items-center pb-24 max-lg:pt-32">
        <div class="container gap-4 max-lg:max-w-xl max-w-4xl h-[700px] rounded-xl p-4 flex justify-start flex-col shadow-2xl shadow-primary-900 backdrop-blur-xl border-2 border-white">
            <livewire:chat-bot />
        </div>
    </main>
@endsection