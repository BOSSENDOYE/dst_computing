<?php
namespace App\Filament\Resources\ValeurResource\Pages;
use App\Filament\Resources\ValeurResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListValeurs extends ListRecords {
    protected static string $resource = ValeurResource::class;
    protected function getHeaderActions(): array {
        return [Actions\CreateAction::make()];
    }
}
