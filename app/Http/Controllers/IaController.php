<?php

namespace App\Http\Controllers;

use App\Models\Ia;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use getID3;

class IaController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function ias_show()
    {
        $ias = Ia::all();

        return view('ias', 
        [
            'ias' => $ias,
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function store_contact(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10|max:1000',
        ]);

        $contact = new Contact();
        $contact->email = $request->email;
        $contact->text = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        return view('contact-success');
        
    }

    public function contact_success()
    {
        return view('contact-success');
    }

    public function register()
    {
        return view('admin_signup');
    }

    public function store_register(Request $request)
    {
        $password = $request->password; // Récupérez le mot de passe à partir du formulaire
        $hashedPassword = Hash::make($password);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $hashedPassword;
        $user->save();
        return view('index');
    }

    public function admin()
    {
        $this->authorize('is_admin', auth()->user());
        return view('admin');
    }

    public function store_ia(Request $request)
    {
        
        $this->authorize('is_admin', auth()->user());
    
        $ia = new Ia();
        $ia->title = $request->title;
        $ia->description = $request->description;
        $ia->link = $request->link;
        $ia->image = $request->image;
        
        $ia->save();

        return redirect()->route('ias');
    }

 
    // Infos pour openaiAPI https://github.com/openai-php/client

    // Views des IAs

    public function mail_show()
    {
        //Utilise le retour de la fonction mail_form pour afficher le prompt
        $prompt = session('prompt');
        $message = session('message');
        if ($prompt == null) {
            $prompt = "";
        }
        if ($message == null) {
            $message = "";
        }
        return view('/ias/mail', ['prompt' => $prompt, 'message' => $message]);

    }

    public function image()
    {   
        //Utilise le retour de la fonction image_form pour afficher le prompt
        $prompt = session('prompt');
        $message = session('message');

        if ($prompt == null) {
            $prompt = "";
        }

        if ($message == null) {
            $message = "";
        }

        return view('/ias/image', ['prompt' => $prompt, 'message' => $message]);
    }

    public function audio()
    {
        //Utilise le retour de la fonction audio_form pour afficher le prompt
        $prompt = session('prompt');
        $message = session('message');

        if ($prompt == null) {
            $prompt = "";
        }

        if ($message == null) {
            $message = "";
        }

        return view('/ias/audio', ['message' => $message]);
    }


    // Formulaires des IAs

    public function mail_form(Request $request)
    {   
        $request->validate([
            'prompt' => 'required|min:10',
        ]);

        $texte_base =  "Tu es un assistant dans la rédaction de très bons mails. Tu dois aider un utilisateur à rédiger un mail. 
                        Je vais te donner des indications et tu devras écrire un partir de ces indications. 
                        Ne mentionne rien de plus que ce qui est inscrit dans les indications. Si tu ne peux pas répondre sans indication supplémentaire, répond simplement que tu manques d'information.
                        Voici les indications : ";

        $response = Openai::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $texte_base . $request->prompt],
            ],
        ]);
        
        $response->id; // 'chatcmpl-6pMyfj1HF4QXnfvjtfzvufZSQq6Eq'
        $response->object; // 'chat.completion'
        $response->created; // 1677701073
        $response->model; // 'gpt-3.5-turbo-0301'

        $generated_text = $response->choices[0]->message->content;
        return redirect()->route('mail')->with(['prompt' => $request->prompt, 'message' => $generated_text]);
    }

    public function image_form(Request $request) {

        $request->validate([
            'prompt' => 'required|min:10',
        ]);

        $response = Openai::images()->create([
            'prompt' => $request->prompt,
            'n' => 1,
            'size' => '256x256',
            'response_format' => 'url',
        ]);
        
        $response->created; // 1589478378
        
        foreach ($response->data as $data) {
            $data->url; // 'https://oaidalleapiprodscus.blob.core.windows.net/private/...'
            $data->b64_json; // null
        }
        
        $response->toArray(); // ['created' => 1589478378, data => ['url' => 'https://oaidalleapiprodscus...', ...]]
        return redirect()->route('image')->with(['prompt' => $request->prompt, 'message' => $response->data[0]->url]);
    }

    public function audio_form_explain(Request $request) {

        $request->validate([
            'audio' => 'required|mimes:mp3|max_duration:30',
        ]);
        
    
        if ($request->hasFile('audio')) {
            // Stocker le fichier dans le dossier temporaire
            $path = $request->file('audio')->store('temp');
            // Récupérer le chemin d'accès complet du fichier stocké
            $path = storage_path('app/' . $path);
    
            $response = Openai::audio()->transcribe([
                'model' => 'whisper-1',
                'file' => fopen($path, 'r'),
                'response_format' => 'verbose_json',
            ]);
            
            $response->task; // 'transcribe'
            $response->language; // 'english'
            $response->duration; // 2.95
            $response->text; // 'Hello, how are you?'
            
            $response->toArray(); // ['task' => 'transcribe', ...]
            
            // Supprimer le fichier temporaire après utilisation
            unlink($path);

            // Utiliser le texte généré pour le prompt
            $texte_base =  "Je vais te donner un texte qui retranscrit un audio et tu devras le résumer sans oublier aucun détail et en l'explicant le mieux possible. 
                            Ne mentionne rien de plus que ce qui est inscrit dans le texte. N'invente rien de plus au texte. Lorsque tu mentionnes le texte utilise le mot 'audio' plutôt que 'texte'.
                            Voici le texte : ";

            $text = Openai::chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $texte_base . $response->text],
                ],
            ]);
            
            $text->id; // 'chatcmpl-6pMyfj1HF4QXnfvjtfzvufZSQq6Eq'
            $text->object; // 'chat.completion'
            $text->created; // 1677701073
            $text->model; // 'gpt-3.5-turbo-0301'
    
            $generated_text = $text->choices[0]->message->content;

        } else {
            // Le fichier n'a pas été téléchargé
            $generated_text = "";
        }
    
        return redirect()->route('audio')->with(['message' => $generated_text]);
    }

}
