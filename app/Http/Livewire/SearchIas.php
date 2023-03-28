<?php

namespace App\Http\Livewire;

use App\Models\Ia;
use Livewire\Component;

class SearchIas extends Component
{
    public String $search = '';

    public $ias = [];



    public function updatedSearch()
    {
        if (strlen($this->search) > 2) {
            $words = '%'  . $this->search . '%';
            $this->ias = Ia::where('title', 'like', $words)
            ->orWhere('description', 'like', $words)
            -> get();
        }
        else {
            $this->ias = Ia::all();
        }
    }

    public function render()
    {
        if (empty($this->ias)) {
            $this->ias = Ia::all();
        }
        return view('livewire.search-ias', [
            'ias' => $this->ias
        ]);        
    }
}
