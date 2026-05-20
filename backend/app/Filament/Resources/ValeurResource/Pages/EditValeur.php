<?php
namespace App\Filament\Resources\ValeurResource\Pages;
use App\Filament\Resources\ValeurResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditValeur extends EditRecord {
    protected static string $resource = ValeurResource::class;
    protected function getHeaderActions(): array {
        return [Actions\DeleteAction::make()];
    }
}
