<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;

class Frontpage extends Component
{
    
    public $title;
    public $content;
    
    /**
     * Livewire mount function.
     *
     * @param  mixed $urlslug
     * @return void
     */
    public function mount($urlslug)
    {
        $this->retrieveContent($urlslug);
    }
    
    /**
     * Retrieves the content of the page.
     *
     * @param  mixed $urlslug
     * @return void
     */
    public function retrieveContent($urlslug)
    {
        $data = Page::where('slug', $urlslug)->first();
        $this->title = $data->title;
        $this->content = $data->content;
    }
    
    /**
     * Livewire render function
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.frontpage')->layout('layouts.frontpage');
    }
}
