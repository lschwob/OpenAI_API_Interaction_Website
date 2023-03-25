<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use getID3;
use App\Models\Ia;
use App\Models\User;
use App\Models\Contact;
use Spatie\PdfToText\Pdf;
use Smalot\PdfParser\Parser;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class FineTuningController extends Controller
{
    // public function ft() {
    //     return view('ft');
    // }
    
    // public function upload_ft_training(Request $request) {

    //     $path = $request->file('training')->store('training_files');
    //     $path = storage_path('app/' . $path);

    //     $response = Openai::files()->upload([
    //         'purpose' => 'fine-tune',
    //         'file' => fopen($path, 'r'),
    //     ]);
    
    //     $response->id; // 'file-XjGxS3KTG0uNmNOK362iJua3'
    //     $response->object; // 'file'
    //     $response->bytes; // 140
    //     $response->createdAt; // 1613779657
    //     $response->filename; // 'mydata.jsonl'
    //     $response->purpose; // 'fine-tune'
    //     $response->status; // 'succeeded'

    
    //     $response->toArray(); // ['id' => 'file-XjGxS3KTG0uNmNOK362iJua3', ...]
    //     $response = Openai::files()->list();

    //     $response->object; // 'list'

    //     foreach ($response->data as $result) {
    //         $result->id; // 'file-XjGxS3KTG0uNmNOK362iJua3'
    //         $result->object; // 'file'
    //         // ...
    //     }

    //     $response->toArray(); // ['object' => 'list', 'data' => [...]]
    //     dd($response);
    // }

    // public function list_files() {
    //     $response = Openai::files()->list();

    //     $response->object; // 'list'

    //     foreach ($response->data as $result) {
    //         $result->id; // 'file-XjGxS3KTG0uNmNOK362iJua3'
    //         $result->object; // 'file'
    //         // ...
    //     }

    //     $response->toArray(); // ['object' => 'list', 'data' => [...]]
    //     dd($response);
    // }

    // public function retrieve_file() {
    //     $response = Openai::files()->retrieve('file-9QcXX2Ye0Vpmhthj6LijbPRc');

    //     $response->id; // 'file-XjGxS3KTG0uNmNOK362iJua3'
    //     $response->object; // 'file'
    //     $response->bytes; // 140
    //     $response->createdAt; // 1613779657
    //     $response->filename; // 'mydata.jsonl'
    //     $response->purpose; // 'fine-tune'
    //     $response->status; // 'succeeded'

    //     $response->toArray(); // ['id' => 'file-XjGxS3KTG0uNmNOK362iJua3', ...]
    //     dd($response);
    // }

    // public function delete_file(Request $request) {

    //     $file = $request->text;

    //     $response = Openai::files()->delete($file);

    //     $response->id; // 'file-XjGxS3KTG0uNmNOK362iJua3'
    //     $response->object; // 'file'
    //     $response->deleted; // true

    //     $response->toArray(); // ['id' => 'file-XjGxS3KTG0uNmNOK362iJua3', ...]
    //     dd($response);
    // }

    // public function download_file(Request $request) {
    //     $file = $request->text;
    //     Openai::files()->download($file); // '{"prompt": "<prompt text>", ...'
    // }

    // public function create_ft(Request $request) {

    //     $training_file = $request->training_file;
    //     $model = $request->model;
    //     $suffix = $request->suffix;
    //     $response = Openai::fineTunes()->create([
    //         'training_file' => $training_file, // file id
    //         'model' => $model,
    //         'n_epochs' => 4,
    //         'learning_rate_multiplier' => 0.1,
    //         'compute_classification_metrics' => false,
    //         'suffix' => $suffix,
    //     ]);
        
    //     $response->id; // 'ft-AF1WoRqd3aJAHsqc9NY7iL8F'
    //     $response->object; // 'fine-tune'
    //     // ...
        
    //     $response->toArray(); // ['id' => 'ft-AF1WoRqd3aJAHsqc9NY7iL8F', ...]

    //     dd($response);
    // }

    // public function list_ft() {
    //     $response = Openai::fineTunes()->list();

    //     $response->object; // 'list'

    //     foreach ($response->data as $result) {
    //         $result->id; // 'ft-AF1WoRqd3aJAHsqc9NY7iL8F'
    //         $result->object; // 'fine-tune'

    //     }

    //     $response->toArray(); // ['object' => 'list', 'data' => [...]]

    //     dd($response->toArray());
    // }

    // public function retrieve_ft() {
    //     $response = Openai::fineTunes()->retrieve('ft-r4QeKxDLh77GyLGsKfUPVnFs');

    //     $response->id; // 'ft-AF1WoRqd3aJAHsqc9NY7iL8F'
    //     $response->object; // 'fine-tune'
    //     $response->model; // 'curie'
    //     $response->createdAt; // 1614807352
    //     $response->fineTunedModel; // 'curie => ft-acmeco-2021-03-03-21-44-20'
    //     $response->organizationId; // 'org-jwe45798ASN82s'
    //     $response->resultFiles; // [
    //     $response->status; // 'succeeded'
    //     $response->validationFiles; // [
    //     $response->trainingFiles; // [
    //     $response->updatedAt; // 1614807865

    //     foreach ($response->events as $result) {
    //         $result->object; // 'fine-tune-event' 
    //         $result->createdAt; // 1614807352
    //         $result->level; // 'info'
    //         $result->message; // 'Job enqueued. Waiting for jobs ahead to complete. Queue number =>  0.'
    //     }

    //     $response->hyperparams->batchSize; // 4 
    //     $response->hyperparams->learningRateMultiplier; // 0.1 
    //     $response->hyperparams->nEpochs; // 4 
    //     $response->hyperparams->promptLossWeight; // 0.1

    //     foreach ($response->resultFiles as $result) {
    //         $result->id; // 'file-XjGxS3KTG0uNmNOK362iJua3'
    //         $result->object; // 'file'
    //         $result->bytes; // 140
    //         $result->createdAt; // 1613779657
    //         $result->filename; // 'mydata.jsonl'
    //         $result->purpose; // 'fine-tune'
    //         $result->status; // 'succeeded'
    //     }

    //     foreach ($response->validationFiles as $result) {
    //         $result->id; // 'file-XjGxS3KTG0uNmNOK362iJua3'
    //         // ...
    //     }

    //     foreach ($response->trainingFiles as $result) {
    //         $result->id; // 'file-XjGxS3KTG0uNmNOK362iJua3'
    //         // ...
    //     }

    //     $response->toArray(); // ['id' => 'ft-AF1WoRqd3aJAHsqc9NY7iL8F', ...]
    //     dd($response);
    // }

    public function blog_intro() {
        //Utilise le retour de la fonction mail_form pour afficher le prompt
        $prompt = session('prompt');
        $messages = session('messages');
        if ($prompt == null) {
            $prompt = "";
        }

        return view('/ias/blog_intro', ['prompt' => $prompt, 'messages' => $messages]);
    }

    public function blog_intro_form(Request $request) {
        // $prompt = '10 tools for every data scientist, Here are ten tools that every data scientist should know and use.';
        // $response = Openai::completions()->create([
        //     'model' => 'ada:ft-personal:test2-2023-03-25-15-54-42',
        //     'prompt' => $prompt,
        //     'temperature' => 0.7,
        //     'n' => 1,
        //     'stop' => [".\n", ".\n"]
        // ]);

        $messages = null;
        $prompt = $request->prompt;

        $completion = Openai::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => 'I will give you the title of a blog article and you are going to write an introduction : ' . $prompt,
            'temperature' => 0.8,
            'top_p' => 0.5,
            'n' => 1,
            'stream' => false,
            'max_tokens' => 2000,
            'stop' => [".\n", ".\n"]
        ]);

        $text = $completion->choices[0]->text;

        $texte_base =  "Je vais te donner un texte, généres en 4 variantes différentes, écris \n seulement entre les variantes.
                        Voici le texte de base : \n\n";
            
        $response = Openai::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $texte_base . $text],
            ],
        ]);
        // dd($response);
        $result = array_filter(preg_split("/[\n]/", $response->choices[0]->message->content), function($value) {
            return !empty($value) && !strstr($value, 'Variante') && !strstr($value, 'Vari');
        });

        $result = array_slice($result, 0, 4);
        
        return redirect()->route('blog_intro')->with(['prompt' => $request->prompt, 'messages' => $result]);
    }

    // public function compare_gpt() {

    //     $completion = Openai::completions()->create([
    //         'model' => 'text-davinci-003',
    //         'prompt' => 'I will give you the title of a blog article and you are going to write an introduction : Top 10 of the reasons why you should visit Paris.',
    //         'temperature' => 0.8,
    //         'top_p' => 0.5,
    //         'n' => 1,
    //         'stream' => false,
    //         'max_tokens' => 2000,
    //         'stop' => [".\n", ".\n"]
    //     ]);

    //     $text = $completion->choices[0]->text;

    //     $texte_base =  "Je vais te donner un texte, généres en 4 variantes différentes.
    //                     Voici le texte de base : \n\n";
            
    //     $response = Openai::chat()->create([
    //         'model' => 'gpt-3.5-turbo',
    //         'messages' => [
    //             ['role' => 'user', 'content' => $texte_base . $text],
    //         ],
    //     ]);
        
    //     $result = preg_split("/[\n,]+/", $completion->choices[0]->text);

    //     dd($result);
    // }
        
}
