<?php
namespace App\Filament\Resources;
use App\Filament\Resources\MembreEquipeResource\Pages;
use App\Models\MembreEquipe;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MembreEquipeResource extends Resource {
    protected static ?string $model = MembreEquipe::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Équipe';
    protected static ?string $navigationGroup = 'Contenu';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form {
        return $form->schema([
            Forms\Components\Section::make()->columns(2)->schema([
                Forms\Components\TextInput::make('nom')->label('Nom complet')->required(),
                Forms\Components\TextInput::make('initiales')->label('Initiales (ex: DG)')->required()->maxLength(5),
                Forms\Components\TextInput::make('poste')->label('Poste / Fonction')->required(),
                Forms\Components\TextInput::make('avatar_bg')->label('Couleur avatar (CSS)')->default('bg-dst-blue'),
                Forms\Components\Textarea::make('bio')->label('Biographie courte')->rows(3)->columnSpanFull(),
                Forms\Components\TagsInput::make('competences')->label('Compétences (tags)')->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')->label('Actif')->default(true),
                Forms\Components\TextInput::make('ordre')->label('Ordre')->numeric()->default(0),
            ]),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->defaultSort('ordre')->columns([
            Tables\Columns\TextColumn::make('ordre')->label('#')->sortable(),
            Tables\Columns\TextColumn::make('nom')->label('Nom')->searchable(),
            Tables\Columns\TextColumn::make('poste')->label('Poste'),
            Tables\Columns\IconColumn::make('is_active')->label('Actif')->boolean(),
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([
            Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()]),
        ]);
    }

    public static function getPages(): array {
        return [
            'index'  => Pages\ListMembresEquipe::route('/'),
            'create' => Pages\CreateMembreEquipe::route('/create'),
            'edit'   => Pages\EditMembreEquipe::route('/{record}/edit'),
        ];
    }
}
