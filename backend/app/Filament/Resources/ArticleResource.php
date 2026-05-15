<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    protected static ?string $navigationLabel = 'Articles & Blog';
    protected static ?string $navigationGroup = 'Contenu';
    protected static ?int $navigationSort = 3;
    protected static ?string $pluralModelLabel = 'Articles';
    protected static ?string $modelLabel = 'Article';

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make('Contenu principal')
                ->schema([
                    Forms\Components\TextInput::make('titre')
                        ->label('Titre')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Forms\Set $set, ?string $state) =>
                            $set('slug', Str::slug($state ?? ''))
                        ),
                    Forms\Components\TextInput::make('slug')
                        ->label('Slug URL')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),
                    Forms\Components\Textarea::make('extrait')
                        ->label('Extrait / Résumé')
                        ->rows(3)
                        ->maxLength(500),
                    Forms\Components\RichEditor::make('contenu')
                        ->label('Contenu')
                        ->required()
                        ->columnSpanFull()
                        ->toolbarButtons([
                            'bold', 'italic', 'underline', 'strike',
                            'h2', 'h3', 'bulletList', 'orderedList',
                            'blockquote', 'link', 'undo', 'redo',
                        ]),
                ]),

            Forms\Components\Section::make('Métadonnées')
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make('categorie')
                        ->label('Catégorie')
                        ->options([
                            'Développement'  => 'Développement',
                            'Infrastructure' => 'Infrastructure',
                            'IA & Data'      => 'IA & Data',
                            'Secteur Santé'  => 'Secteur Santé',
                            'Conseils IT'    => 'Conseils IT',
                            'Actualités'     => 'Actualités',
                        ]),
                    Forms\Components\Select::make('statut')
                        ->label('Statut')
                        ->options([
                            'brouillon' => 'Brouillon',
                            'publie'    => 'Publié',
                            'archive'   => 'Archivé',
                        ])
                        ->default('brouillon'),
                    Forms\Components\TextInput::make('image_couverture')
                        ->label('URL image de couverture')
                        ->url(),
                    Forms\Components\DateTimePicker::make('publie_le')
                        ->label('Date de publication')
                        ->native(false),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('titre')->label('Titre')->searchable()->limit(60)->sortable(),
                Tables\Columns\TextColumn::make('categorie')->label('Catégorie')->badge(),
                Tables\Columns\TextColumn::make('statut')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'publie'    => 'success',
                        'brouillon' => 'warning',
                        'archive'   => 'danger',
                        default     => 'gray',
                    }),
                Tables\Columns\TextColumn::make('publie_le')->label('Publié le')->date('d/m/Y')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Créé le')->date('d/m/Y')->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('statut')
                    ->options([
                        'brouillon' => 'Brouillon',
                        'publie'    => 'Publié',
                        'archive'   => 'Archivé',
                    ]),
                Tables\Filters\SelectFilter::make('categorie')
                    ->options([
                        'Développement'  => 'Développement',
                        'Infrastructure' => 'Infrastructure',
                        'IA & Data'      => 'IA & Data',
                        'Secteur Santé'  => 'Secteur Santé',
                        'Conseils IT'    => 'Conseils IT',
                        'Actualités'     => 'Actualités',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit'   => Pages\EditArticle::route('/{record}/edit'),
            'view'   => Pages\ViewArticle::route('/{record}'),
        ];
    }
}
