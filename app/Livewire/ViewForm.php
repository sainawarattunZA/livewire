<?php

namespace App\Livewire;

use App\Models\Form;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\FormTemplate;
use Filament\Infolists\Infolist;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Infolists\Concerns\InteractsWithInfolists;
class ViewForm extends Component implements HasForms, HasInfolists
{
    use InteractsWithInfolists;
    use InteractsWithForms;

    public  $record_id;
    public $content;
    public FormTemplate $form_template;
    public function mount()
    {
        $this->record_id = request()->query('record');
        $this->form_template = FormTemplate::find($this->record_id);
    }

    #[On('create')]
    public function create($message)
    {
        $this->content = json_decode($message);

        Form::create([
            'form_id' => $this->record_id,
            'form' => @json_encode($this->content)
        ]);
        return redirect()->route('filament.admin.pages.user-form');
    }

    public function formInfolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->form_template)
            ->schema([
                // TextEntry::make('name'),

            ]);
    }
    public function render()
    {
        return view('livewire.view-form');
    }
}
