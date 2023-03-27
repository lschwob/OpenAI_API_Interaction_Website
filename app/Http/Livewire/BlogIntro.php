<?php

namespace App\Http\Livewire;

use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;


class BlogIntro extends Component
{

    public string $input = '';
    public array $responses = [];

    public bool $loading = false;
    
    public function render() : View
    {
        return view('livewire.blog-intro');
    }


    public function loader() {
        $this->loading = true;
    }

    public function submit()
    {
        Session::forget('messages');

        $this->responses = [];

        $prompt = $this->input;

        $texte_base = "Je vais te donner le titre d'un article de blog et tu vas m'écrire une introduction accrocheuse pour cet article : " . $prompt . "Mentionne uniquement des choses qui pourraient concerner l'article et rien d'autre";

        $responses = array();
        for ($i = 0; $i < 4; $i++) {
            $chatgpt = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $texte_base],
                ],
            ]);

            array_push($responses, $chatgpt->choices[0]->message->content);
        }

        $this->responses = $responses;

        $this->input = "";

        $this->loading = false; // mettre la variable à false pour cacher le loader;

    }
}
