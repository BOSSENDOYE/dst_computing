<?php
namespace App\Filament\Resources\TechnologieResource\Pages;
use App\Filament\Resources\TechnologieResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTechnologie extends EditRecord {
    protected static string $resource = TechnologieResource::class;
    protected function getHeaderActions(): array {
        return [Actions\DeleteAction::make()];
    }
}
