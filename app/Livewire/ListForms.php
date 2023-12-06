<?php

namespace App\Livewire;

use App\Models\FormTemplate;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\Action;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ListForms extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(FormTemplate::query())
            ->columns([
                TextColumn::make('name'),


            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('View')
                    ->icon('heroicon-m-eye')
                    ->url(fn (FormTemplate $record): string => route('filament.admin.pages.view-form', ['record' => $record])),
                Action::make('edit')
                    ->icon('heroicon-o-pencil')
                    ->url(fn (FormTemplate $record): string => route('filament.admin.pages.edit-form', ['record' => $record])),
                DeleteAction::make('delete')

            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function createFormTemplate()
    {
        return redirect()->route('filament.admin.pages.form-builder');
    }
    public function render(): View
    {
        return view('livewire.list-forms');
    }
}
