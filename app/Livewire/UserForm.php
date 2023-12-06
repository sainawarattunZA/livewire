<?php

namespace App\Livewire;

use App\Models\Form;
use Livewire\Component;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;
class UserForm extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Form::query())
            ->columns([
                TextColumn::make('id')->rowIndex(),
                TextColumn::make('form.name')->sortable()->label('Form Name'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('View')
                ->icon('heroicon-m-eye')
                ->url(fn (Form $record): string => route('filament.admin.pages.user-view', ['record' => $record])),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.user-form');
    }

}
