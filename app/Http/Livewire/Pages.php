<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;

class Pages extends Component
{       
        public $modalFormVisible = true;
        public $slug;
        public $title;
        public $content;

        
    /**
     * ctrl + shift i shortcut comment on function
     * Shows the form modal
     * of the creeate function.
     * @return void
     */
    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }
    
    /**
     * ctrl + shift i shortcut comment on function
     * livewire render function
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.pages');
    }
}
