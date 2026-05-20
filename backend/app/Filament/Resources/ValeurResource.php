<?php
namespace App\Filament\Resources;
use App\Filament\Resources\ValeurResource\Pages;
use App\Models\Valeur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ValeurResource extends Resource {
    protected static ?string $model = Valeur::class;
    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $navigationLabel = 'Valeurs DST';
    protected static ?string $navigationGroup = 'Paramètres';
    protected static ?int $navigationSort = 13;
    protected static ?string $modelLabel = 'Valeur';
    protected static ?string $pluralModelLabel = 'Valeurs';

    public static function form(Form $form): Form {
        return $form->schema([
            Forms\Components\Section::make('Contenu')->schema([
                Forms\Components\TextInput::make('titre')->label('Titre (ex: Excellence)')->required(),
                Forms\Components\Textarea::make('texte')->label('Description')->rows(3)->required(),
                Forms\Components\TextInput::make('num_bg')->label('Style numéro (CSS)')->default('bg-dst-blue/20 text-dst-blue')
                    ->helperText('ex: bg-dst-orange/20 text-dst-orange'),
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
            Tables\Columns\TextColumn::make('num_bg')->label('Style'),
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
            'index'  => Pages\ListValeurs::route('/'),
            'create' => Pages\CreateValeur::route('/create'),
            'edit'   => Pages\EditValeur::route('/{record}/edit'),
        ];
    }
}
