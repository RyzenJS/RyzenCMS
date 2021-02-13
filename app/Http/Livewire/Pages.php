<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Pages extends Component
{       
        public $modalFormVisible = false;
        public $slug;
        public $title;
        public $content;
        
    /**
     * Validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages', 'slug')],
            'content' => 'required',
        ];
    }

    /**
     * Runs everytime if the title
     * variable is being updated
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedTitle($value)
    {
        $this->generateSlug($value);
    }


    /**
     * create function
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        Page::create($this->modelData());
        $this->modalFormVisible = false;
        $this->resetVars();
    }

    public function read()
    {
        return Page::paginate(5);
    }


        
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
     * Data for the model mapped
     *in this component
     * @return void
     */
    public function modelData()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
        ];
    }

    
    /**
     * Resets variables to null
     *
     * @return void
     */
    public function resetVars()
    {
        $this->title = null;
        $this->slug = null;
        $this->content = null;
    }
    
    /**
     * Generates url slug based on the title
     *
     * @param  mixed $value
     * @return void
     */
    private function generateSlug($value)
    {
        $process1 = str_replace(' ','-', $value);
        $process2 = strtolower($process1);
        $this->slug = $process2;
    }

     
    /**
     * live wire render function
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.pages', [
            'data' => $this->read(),
        ]);
    }
}
