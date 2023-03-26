<?php

namespace App\Http\Livewire;

use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class ChatBot extends Component
{
    public array $chats = [];

    public string $input = '';

    public bool $loading = false;

    public function render(): View
    {
        return view('livewire.chat-bot');
    }

    public function loader() {
        $this->loading = true;
    }

    public function submit()
    {

        $this->chats[] = ['user' => 'human', 'request' => $this->input];

        $messages = [];
        if (Session::has('messages')) {
            array_push($messages, Session::get('messages'));
        }
        else {
            array_push($messages, ['role' => 'user', 'content' => 'Tu es AskWise une intelligence artificielle qui répond à toutes les questions de manière professionnelle.']);
        }
        array_push($messages, ['role' => 'user', 'content' => $this->input]);
        // dd($messages);

        $model = 'gpt-3.5-turbo';
        $params = ['model' => $model, 'messages' => $messages];

        // dd($messages);
        $result = Openai::chat()->create($params);
        $response = array_reduce(
            $result->toArray()['choices'],
            fn(string $result, array $choice) => $result . $choice['message']['content'],
            ""
        );

        $this->chats[] = [
            'user' => 'ai',
            'response' => $response,
        ];

        Session::put('messages', $result->choices[0]->message->toArray());
     
        $this->input = "";

        $this->loading = false; // mettre la variable à false pour cacher le loader
    
    }

    public function resetChat()
    {
        $this->chats = [];
        Session::forget('messages');
    }
}

