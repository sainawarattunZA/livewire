<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FormTemplate;
use Livewire\Attributes\On;

class EditForm extends Component
{
    public  $record_id;
    public FormTemplate $form_template;
    public $content;
    public $name;
    public function mount()
    {
        $this->record_id = request()->query('record');
        $this->form_template = FormTemplate::find($this->record_id);
        $this->name = $this->form_template->name;
        // dd($this->form_template);
    }
    #[On('update')]
    public function update($content)
    {
        $this->content = json_decode($content);
        // dd($this->form->getState()['name']);
        // dd($this->content);
        $form_template =  FormTemplate::find($this->record_id);
        $form_template->name = $this->name;
        $form_template->content = $this->content;
        $form_template->update();
        // return redirect('admin/list-form-builder');
        return redirect()->route('filament.admin.pages.show-form');
    }
    public function render()
    {
        return view('livewire.edit-form');
    }
}

