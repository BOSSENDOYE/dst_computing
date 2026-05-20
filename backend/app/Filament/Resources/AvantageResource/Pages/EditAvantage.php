<?php
namespace App\Filament\Resources\AvantageResource\Pages;
use App\Filament\Resources\AvantageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAvantage extends EditRecord {
    protected static string $resource = AvantageResource::class;
    protected function getHeaderActions(): array {
        return [Actions\DeleteAction::make()];
    }
}
