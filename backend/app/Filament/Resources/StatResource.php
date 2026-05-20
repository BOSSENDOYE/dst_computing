<?php
namespace App\Filament\Resources;
use App\Filament\Resources\StatResource\Pages;
use App\Models\Stat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StatResource extends Resource {
    protected static ?string $model = Stat::class;
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'Statistiques';
    protected static ?string $navigationGroup = 'Paramètres';
    protected static ?int $navigationSort = 10;
    protected static ?string $modelLabel = 'Statistique';
    protected static ?string $pluralModelLabel = 'Statistiques';

    public static function form(Form $form): Form {
        return $form->schema([
            Forms\Components\Section::make('Contenu')->columns(2)->schema([
                Forms\Components\TextInput::make('valeur')->label('Valeur affichée')->required()->placeholder('6+'),
                Forms\Components\TextInput::make('label')->label('Label')->required()->placeholder("Ans d'expérience"),
                Forms\Components\TextInput::make('couleur')->label('Couleur CSS (text-xxx)')->default('text-white')->placeholder('text-dst-orange'),
                Forms\Components\Select::make('contexte')->label('Section de la page')->required()->options([
                    'hero'    => "Page d'accueil — Hero",
                    'cta'     => 'Bannière CTA',
                    'produits'=> 'Section Produits',
                    'about'   => 'Qui sommes-nous',
                ]),
            ]),
            Forms\Components\Section::make('Affichage')->columns(2)->schema([
                Forms\Components\Toggle::make('actif')->label('Actif')->default(true),
                Forms\Components\TextInput::make('ordre')->label('Ordre')->numeric()->default(0),
            ]),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->defaultSort('contexte')->columns([
            Tables\Columns\TextColumn::make('contexte')->label('Section')->badge()->sortable(),
            Tables\Columns\TextColumn::make('valeur')->label('Valeur')->sortable(),
            Tables\Columns\TextColumn::make('label')->label('Label'),
            Tables\Columns\TextColumn::make('couleur')->label('Couleur'),
            Tables\Columns\IconColumn::make('actif')->label('Actif')->boolean(),
            Tables\Columns\TextColumn::make('ordre')->label('#')->sortable(),
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([
            Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()]),
        ]);
    }

    public static function getPages(): array {
        return [
            'index'  => Pages\ListStats::route('/'),
            'create' => Pages\CreateStat::route('/create'),
            'edit'   => Pages\EditStat::route('/{record}/edit'),
        ];
    }
}
