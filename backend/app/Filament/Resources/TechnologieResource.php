<?php
namespace App\Filament\Resources;
use App\Filament\Resources\TechnologieResource\Pages;
use App\Models\Technologie;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TechnologieResource extends Resource {
    protected static ?string $model = Technologie::class;
    protected static ?string $navigationIcon = 'heroicon-o-code-bracket';
    protected static ?string $navigationLabel = 'Technologies';
    protected static ?string $navigationGroup = 'Paramètres';
    protected static ?int $navigationSort = 14;
    protected static ?string $modelLabel = 'Technologie';
    protected static ?string $pluralModelLabel = 'Technologies';

    public static function form(Form $form): Form {
        return $form->schema([
            Forms\Components\Section::make('Contenu')->columns(2)->schema([
                Forms\Components\TextInput::make('nom')->label('Nom (ex: Laravel)')->required()->columnSpanFull(),
                Forms\Components\Toggle::make('actif')->label('Actif')->default(true),
                Forms\Components\TextInput::make('ordre')->label('Ordre')->numeric()->default(0),
            ]),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->defaultSort('ordre')->columns([
            Tables\Columns\TextColumn::make('ordre')->label('#')->sortable(),
            Tables\Columns\TextColumn::make('nom')->label('Nom')->searchable()->sortable(),
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
            'index'  => Pages\ListTechnologies::route('/'),
            'create' => Pages\CreateTechnologie::route('/create'),
            'edit'   => Pages\EditTechnologie::route('/{record}/edit'),
        ];
    }
}
