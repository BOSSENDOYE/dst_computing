<?php
namespace App\Filament\Resources;
use App\Filament\Resources\AvantageResource\Pages;
use App\Models\Avantage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AvantageResource extends Resource {
    protected static ?string $model = Avantage::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Avantages DST';
    protected static ?string $navigationGroup = 'Paramètres';
    protected static ?int $navigationSort = 11;
    protected static ?string $modelLabel = 'Avantage';
    protected static ?string $pluralModelLabel = 'Avantages';

    public static function form(Form $form): Form {
        return $form->schema([
            Forms\Components\Section::make('Contenu')->schema([
                Forms\Components\TextInput::make('titre')->label('Titre')->required(),
                Forms\Components\Textarea::make('texte')->label('Description')->rows(3)->required(),
                Forms\Components\Textarea::make('icone_path')->label('SVG icon path (d="...")')->rows(3)->required(),
                Forms\Components\TextInput::make('icone_bg')->label('Fond icône (CSS)')->default('bg-dst-blue/20'),
                Forms\Components\TextInput::make('icone_color')->label('Couleur icône (CSS)')->default('text-dst-blue'),
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
            Tables\Columns\TextColumn::make('icone_bg')->label('Style'),
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
            'index'  => Pages\ListAvantages::route('/'),
            'create' => Pages\CreateAvantage::route('/create'),
            'edit'   => Pages\EditAvantage::route('/{record}/edit'),
        ];
    }
}
