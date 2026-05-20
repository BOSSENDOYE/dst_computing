<?php
namespace App\Filament\Resources\MissionItemResource\Pages;
use App\Filament\Resources\MissionItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMissionItems extends ListRecords {
    protected static string $resource = MissionItemResource::class;
    protected function getHeaderActions(): array {
        return [Actions\CreateAction::make()];
    }
}
