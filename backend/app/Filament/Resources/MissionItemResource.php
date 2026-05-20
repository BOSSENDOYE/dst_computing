<?php
namespace App\Filament\Resources;
use App\Filament\Resources\MissionItemResource\Pages;
use App\Models\MissionItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MissionItemResource extends Resource {
    protected static ?string $model = MissionItem::class;
    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?string $navigationLabel = 'Mission / Vision';
    protected static ?string $navigationGroup = 'Paramètres';
    protected static ?int $navigationSort = 12;
    protected static ?string $modelLabel = 'Item Mission';
    protected static ?string $pluralModelLabel = 'Mission / Vision / Engagement';

    public static function form(Form $form): Form {
        return $form->schema([
            Forms\Components\Section::make('Contenu')->schema([
                Forms\Components\TextInput::make('titre')->label('Titre (ex: Notre mission)')->required(),
                Forms\Components\Textarea::make('texte')->label('Texte')->rows(4)->required(),
                Forms\Components\Textarea::make('icone_path')->label('SVG icon path (d="...")')->rows(3)->required(),
                Forms\Components\TextInput::make('icone_bg')->label('Fond icône (CSS)')->default('bg-dst-blue/10'),
                Forms\Components\TextInput::make('icone_color')->label('Couleur icône (CSS)')->default('text-dst-blue'),
                Forms\Components\TextInput::make('barre')->label('Couleur barre accent (CSS)')->default('bg-dst-blue'),
            ]),
            Forms\Components\Section::make('Affichage')->columns(2)->schema([
                Forms\Components\Toggle::make('actif')->label('Actif')->default(true),
                Forms\Components\TextInput::make('ordre')->label('Ordre')->numeric()->default(0),
            ]),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->defaultSort('ordre')->columns([
            Tables\Columns\TextColumn::make('ordre')->label('#')->sortable(),
            Tables\Columns\TextColumn::make('titre')->label('Titre')->searchable(),
            Tables\Columns\IconColumn::make('actif')->label('Actif')->boolean(),
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([
            Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()]),
        ]);
    }

    public static function getPages(): array {
        return [
            'index'  => Pages\ListMissionItems::route('/'),
            'create' => Pages\CreateMissionItem::route('/create'),
            'edit'   => Pages\EditMissionItem::route('/{record}/edit'),
        ];
    }
}
