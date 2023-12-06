<?php

namespace App\Livewire;

use App\Models\NRC;
use App\Models\Region;
use App\Models\Quarter;
use Livewire\Component;
use App\Models\Township;
use Livewire\Attributes\On;
use App\Models\FormTemplate;

class EditForm extends Component
{
    public  $record_id;
    public FormTemplate $form_template;
    public $content;
    public $name;
    public $regions;
    public $townships;
    public $quarters;
    public $nrcs;
    public $nrc_code;
    public function mount()
    {
        $this->record_id = request()->query('record');
        $this->form_template = FormTemplate::find($this->record_id);
        $this->name = $this->form_template->name;

        // $this->regions = Region::get()->pluck('name', 'id')->toArray();
        // $this->townships = Township::get()->pluck('name', 'id')->toArray();
        // $this->quarters = Quarter::get()->pluck('name', 'id')->toArray();
        // $this->nrcs = NRC::get()->pluck('name_en', 'id')->toArray();
        // $this->nrc_code = NRC::distinct()->get('nrc_code', 'id')->toArray();

    }
    #[On('update')]
    public function update($content)
    {
        $this->content = json_decode($content);

        $form_template =  FormTemplate::find($this->record_id);
        $form_template->name = $this->name;
        $form_template->content = $this->content;

        $form_template->update();
        return redirect()->route('filament.admin.pages.show-form');
    }
    public function render()
    {
        return view('livewire.edit-form');
    }
}
