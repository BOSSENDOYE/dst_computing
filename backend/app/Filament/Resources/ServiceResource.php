<?php
namespace App\Filament\Resources;
use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource {
    protected static ?string $model = Service::class;
    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationLabel = 'Services';
    protected static ?string $navigationGroup = 'Contenu';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form {
        return $form->schema([
            Forms\Components\Section::make('Contenu')->columns(2)->schema([
                Forms\Components\TextInput::make('titre')->label('Titre')->required()->columnSpanFull(),
                Forms\Components\Textarea::make('description')->label('Description')->rows(3)->columnSpanFull()->required(),
                Forms\Components\TagsInput::make('items')->label('Liste de fonctionnalités')->columnSpanFull(),
                Forms\Components\Textarea::make('icon_path')->label('SVG icon path')->rows(3)->columnSpanFull()->required(),
            ]),
            Forms\Components\Section::make('Style CSS')->columns(2)->schema([
                Forms\Components\TextInput::make('icon_bg')->label('Fond icône (CSS)')->default('bg-dst-blue/20'),
                Forms\Components\TextInput::make('icon_color')->label('Couleur icône (CSS)')->default('text-dst-blue'),
                Forms\Components\TextInput::make('accent_bar')->label('Barre accent (CSS)')->default('bg-dst-blue'),
                Forms\Components\TextInput::make('link_color')->label('Couleur lien (CSS)')->default('text-dst-blue hover:text-blue-700'),
                Forms\Components\TextInput::make('href')->label('Lien')->default('/services'),
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
            Tables\Columns\TextColumn::make('titre')->label('Titre')->searchable()->sortable(),
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
            'index'  => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit'   => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
