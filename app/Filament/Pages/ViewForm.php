<?php

namespace App\Filament\Pages;

use App\Models\FormTemplate;
use Filament\Pages\Page;

class ViewForm extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.view-form';
    
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}
