<?php
namespace App\Filament\Resources;
use App\Filament\Resources\ProduitResource\Pages;
use App\Models\Produit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProduitResource extends Resource {
    protected static ?string $model = Produit::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Produits / Réalisations';
    protected static ?string $navigationGroup = 'Contenu';
    protected static ?int $navigationSort = 1;
    protected static ?string $pluralModelLabel = 'Produits';
    protected static ?string $modelLabel = 'Produit';

    public static function form(Form $form): Form {
        return $form->schema([
            Forms\Components\Section::make('Informations principales')->columns(2)->schema([
                Forms\Components\TextInput::make('nom')->label('Nom')->required(),
                Forms\Components\TextInput::make('tagline')->label('Tagline')->required(),
                Forms\Components\TextInput::make('secteur')->label('Secteur (Santé, Commerce, Administration, Archivage…)')->required(),
                Forms\Components\TextInput::make('type')->label('Type (ex: Logiciel métier, ERP…)')->default('Logiciel métier'),
                Forms\Components\TextInput::make('href')->label('Lien')->default('/realisations'),
                Forms\Components\Textarea::make('description')->label('Description')->rows(3)->columnSpanFull()->required(),
            ]),
            Forms\Components\Section::make('Données techniques')->columns(2)->schema([
                Forms\Components\TagsInput::make('techs')->label('Technologies (tags)')->columnSpanFull(),
                Forms\Components\TagsInput::make('features')->label('Fonctionnalités (tags)')->columnSpanFull(),
                Forms\Components\Textarea::make('icon_path')->label('SVG icon path (d="...")')->rows(3)->columnSpanFull(),
                Forms\Components\TextInput::make('accent_color')->label('Couleur accent texte (text-xxx)')->default('text-dst-blue')
                    ->helperText('ex: text-dst-blue, text-dst-orange, text-green-600'),
                Forms\Components\TextInput::make('badge_class')->label('Badge classe CSS')->default('bg-blue-50 text-blue-700')
                    ->helperText('ex: bg-blue-50 text-blue-700'),
                Forms\Components\TextInput::make('btn_bg')->label('Bouton couleur (bg-xxx hover:bg-xxx)')->default('bg-dst-blue hover:bg-blue-700'),
                Forms\Components\TextInput::make('bg_gradient')->label('Gradient Tailwind (bg-gradient-to-br from-xxx to-xxx)')->default('bg-gradient-to-br from-blue-700 to-dst-blue')
                    ->helperText('Classes Tailwind, pas de style inline'),
            ]),
            Forms\Components\Section::make('Statistiques produit')->schema([
                Forms\Components\Repeater::make('produit_stats')->label('Statistiques affichées')
                    ->schema([
                        Forms\Components\TextInput::make('value')->label('Valeur')->required()->placeholder('15+'),
                        Forms\Components\TextInput::make('label')->label('Label')->required()->placeholder('Pharmacies clientes'),
                    ])
                    ->columns(2)
                    ->defaultItems(0)
                    ->addActionLabel('Ajouter une statistique'),
            ]),
            Forms\Components\Section::make('Affichage')->columns(2)->schema([
                Forms\Components\Toggle::make('is_active')->label('Actif')->default(true),
                Forms\Components\TextInput::make('ordre')->label('Ordre')->numeric()->default(0),
            ]),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->defaultSort('ordre')->columns([
            Tables\Columns\TextColumn::make('ordre')->label('#')->sortable(),
            Tables\Columns\TextColumn::make('nom')->label('Nom')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('secteur')->label('Secteur')->badge(),
            Tables\Columns\IconColumn::make('is_active')->label('Actif')->boolean(),
            Tables\Columns\TextColumn::make('updated_at')->label('Modifié le')->date('d/m/Y')->sortable(),
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])->bulkActions([
            Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()]),
        ]);
    }

    public static function getPages(): array {
        return [
            'index'  => Pages\ListProduits::route('/'),
            'create' => Pages\CreateProduit::route('/create'),
            'edit'   => Pages\EditProduit::route('/{record}/edit'),
        ];
    }
}
