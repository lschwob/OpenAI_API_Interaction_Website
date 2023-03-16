<?php

namespace App\Http\Controllers;

use App\Models\Ia;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function mail_show()
    {
        return view('mail');
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

    // use OpenAI\Configuration;
    // use OpenAI\OpenAIApi;
    // $configuration = new Configuration();
    // $configuration->setApiKey(getenv('OPENAI_API_KEY'));

    // $openai = new OpenAIApi($configuration);

    // $texte_base = "Voici mon texte de base. ";

    // $response = $openai->createCompletion(array(
    //     'model' => 'text-davinci-002',
    //     'prompt' => $texte_base . 'Ajoutez du texte à la fin.',
    //     'temperature' => 0.7,
    //     'max_tokens' => 50
    // ));

    // $texte_complet = $response->getChoices()[0]->getText();
    // $texte_base .= $texte_complet;

    // // Effectuez une nouvelle requête en utilisant le texte mis à jour
    // $response2 = $openai->createCompletion(array(
    //     'model' => 'text-davinci-002',
    //     'prompt' => $texte_base . 'Ajoutez encore plus de texte.',
    //     'temperature' => 0.7,
    //     'max_tokens' => 50
    // ));

    // $texte_complet2 = $response2->getChoices()[0]->getText();
    // $texte_base .= $texte_complet2;

    // // Répétez autant de fois que nécessaire pour incrémenter le texte de base avec de nouvelles requêtes
}
