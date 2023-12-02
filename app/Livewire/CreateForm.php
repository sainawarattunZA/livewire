<?php

namespace App\Livewire;

use App\Models\FormTemplate;
use App\Models\Post;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\Attributes\On;


class CreateForm extends Component implements HasForms
{

    use InteractsWithForms;

    public $content;

    #[On('create')]
    public function create($message)
    {
        $this->content = json_decode($message);
        // dd($this->form->getState()['name']);
        // dd($this->content);
        FormTemplate::create([
            'name' => $this->form->getState()['name'],
            'content' => $this->content
        ]);

        return redirect()->route('filament.admin.pages.show-form');
    }

    public ?array $data = [];
    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                // ...
            ])
            ->statePath('data');
    }


    public function render(): View
    {
        return view('livewire.create-form');
    }
}
