<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FormTemplate;
use Filament\Infolists\Infolist;
use Filament\Forms\Components\Section;
use Filament\Infolists\Components\TextEntry;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;




class ViewForm extends Component implements HasForms, HasInfolists
{
    use InteractsWithInfolists;
    use InteractsWithForms;

    public  $record_id;
    public FormTemplate $form_template;
    public function mount()
    {
        $this->record_id = request()->query('record');
        $this->form_template = FormTemplate::find($this->record_id);


    }


    public function formInfolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->record($this->form_template)
        ->schema([
            TextEntry::make('name'),

        ]);

    }
    public function render()
    {
        return view('livewire.view-form');
    }
}
