<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class UserView extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.user-view';

    public static function shouldRegisterNavigation(): bool{
        return false;
    }
}
