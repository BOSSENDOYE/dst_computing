<?php
namespace App\Filament\Resources;
use App\Filament\Resources\TemoignageResource\Pages;
use App\Models\Temoignage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TemoignageResource extends Resource {
    protected static ?string $model = Temoignage::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Témoignages';
    protected static ?string $navigationGroup = 'Contenu';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form {
        return $form->schema([
            Forms\Components\Section::make()->columns(2)->schema([
                Forms\Components\TextInput::make('name')->label('Nom')->required(),
                Forms\Components\TextInput::make('role')->label('Poste / Rôle')->required(),
                Forms\Components\TextInput::make('company')->label('Entreprise')->required(),
                Forms\Components\TextInput::make('avatar_bg')->label('Couleur avatar (CSS)')->default('bg-dst-blue'),
                Forms\Components\Textarea::make('text')->label('Témoignage')->rows(4)->columnSpanFull()->required(),
                Forms\Components\Toggle::make('is_active')->label('Actif')->default(true),
                Forms\Components\TextInput::make('ordre')->label('Ordre')->numeric()->default(0),
            ]),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->defaultSort('ordre')->columns([
            Tables\Columns\TextColumn::make('ordre')->label('#')->sortable(),
            Tables\Columns\TextColumn::make('name')->label('Nom')->searchable(),
            Tables\Columns\TextColumn::make('company')->label('Entreprise'),
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
            'index'  => Pages\ListTemoignages::route('/'),
            'create' => Pages\CreateTemoignage::route('/create'),
            'edit'   => Pages\EditTemoignage::route('/{record}/edit'),
        ];
    }
}
