<?php
namespace App\Filament\Resources;
use App\Filament\Resources\PartenaireResource\Pages;
use App\Models\Partenaire;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PartenaireResource extends Resource {
    protected static ?string $model = Partenaire::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Partenaires';
    protected static ?string $navigationGroup = 'Contenu';
    protected static ?int $navigationSort = 20;
    protected static ?string $modelLabel = 'Partenaire';
    protected static ?string $pluralModelLabel = 'Partenaires';

    public static function form(Form $form): Form {
        return $form->schema([
            Forms\Components\Section::make('Informations')->columns(2)->schema([
                Forms\Components\TextInput::make('nom')->label('Nom du partenaire')->required(),
                Forms\Components\TextInput::make('site_url')->label('Site web')->url()->placeholder('https://example.com'),
            ]),
            Forms\Components\Section::make('Logo')->schema([
                Forms\Components\FileUpload::make('logo_path')
                    ->label('Logo du partenaire')
                    ->image()
                    ->disk('public')
                    ->directory('partenaires')
                    ->visibility('public')
                    ->imagePreviewHeight('80')
                    ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/svg+xml', 'image/webp'])
                    ->maxSize(2048)
                    ->helperText('PNG, JPG, SVG ou WebP — max 2 Mo. Le logo sera affiché sur la page d\'accueil.')
                    ->columnSpanFull(),
            ]),
            Forms\Components\Section::make('Affichage')->columns(2)->schema([
                Forms\Components\Toggle::make('actif')->label('Visible sur le site')->default(true),
                Forms\Components\TextInput::make('ordre')->label('Ordre')->numeric()->default(0),
            ]),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->defaultSort('ordre')->columns([
            Tables\Columns\TextColumn::make('ordre')->label('#')->sortable(),
            Tables\Columns\TextColumn::make('nom')->label('Nom')->searchable()->sortable(),
            Tables\Columns\ImageColumn::make('logo_path')
                ->label('Logo')
                ->disk('public')
                ->height(36)
                ->width(80)
                ->extraImgAttributes(['style' => 'object-fit:contain']),
            Tables\Columns\TextColumn::make('site_url')->label('Site')->limit(35),
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
            'index'  => Pages\ListPartenaires::route('/'),
            'create' => Pages\CreatePartenaire::route('/create'),
            'edit'   => Pages\EditPartenaire::route('/{record}/edit'),
        ];
    }
}
