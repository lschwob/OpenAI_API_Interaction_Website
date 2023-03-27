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

        $completion = OpenAI::completions()->create([
            'model' => 'text-ada-001',
            'prompt' => "Je vais te donner le titre d'un article de blog et tu vas m'écrire une introduction accrocheuse pour cet article : " . $prompt . "Mentionne uniquement des choses qui pourraient concerner l'article et rien d'autre.",
            'temperature' => 0.8,
            'top_p' => 0.5,
            'n' => 1,
            'stream' => false,
            'max_tokens' => 1500,
            'stop' => [".\n", ".\n"]
        ]);

        $text = $completion->choices[0]->text;


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
