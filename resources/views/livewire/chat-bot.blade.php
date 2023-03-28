<div class="h-full w-full relative">
    <div class="inset-0 flex items-center justify-center" wire:loading.class="absolute">
        <div wire:loading.delay wire:target='submit' class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-blue-500"></div>
    </div>
    <div class="absolute top-0 left-0 w-full flex justify-center mt-5">
        <button wire:click="resetChat" class="bg-indigo-900 text-white px-4 py-2 rounded-full z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <div class="h-full overflow-y-scroll space-y-4 scrollbar">
        @foreach ($chats as $chat)
            @if ($chat['user'] === "ai")
                <div class="flex justify-start mx-4">
                    <p class="max-w-xs bg-blue-200 rounded-tl-3xl rounded-tr-3xl rounded-br-3xl p-3">
                        {!! $chat['response'] !!}
                    </p>
                </div>
            @else
                <div class="flex justify-end  mx-4">
                    <p class="max-w-xs bg-blue-500 rounded-tr-3xl rounded-tl-3xl rounded-bl-3xl p-3">
                        {{ $chat['request'] }}
                    </p>
                </div>
            @endif
        @endforeach
    </div>

    <div class="flex items-center bg-white overflow-hidden p-1 rounded-2xl">
        <label class="flex-1">
            <input wire:keydown.enter='submit' wire:model="input" class="bg-white p-3 w-full rounded-l-2xl" type="text"
                   placeholder="Type something..."/>
        </label>
        <button wire:click="submit" class="bg-indigo-900 text-white px-4 py-2 rounded-2xl h-full">
            Envoyer
        </button>
    </div>
</div>
