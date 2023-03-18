<?php

namespace App\Http\Controllers;

use App\Models\Ia;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Hash;

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
        return view('mail', ['prompt' => '', 'message' => '']);

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
        return view('mail', ['prompt' => $request->prompt, 'message' => $generated_text]);
    }
}
