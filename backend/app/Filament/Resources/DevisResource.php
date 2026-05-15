<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DevisResource\Pages;
use App\Models\Devi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\BadgeColumn;

class DevisResource extends Resource
{
    protected static ?string $model = Devi::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Demandes de devis';
    protected static ?string $navigationGroup = 'CRM';
    protected static ?int $navigationSort = 1;
    protected static ?string $pluralModelLabel = 'Devis';
    protected static ?string $modelLabel = 'Demande de devis';

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make('Informations client')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('nom_complet')->label('Nom complet')->required(),
                    Forms\Components\TextInput::make('structure')->label('Structure / Entreprise'),
                    Forms\Components\TextInput::make('telephone')->label('Téléphone')->required(),
                    Forms\Components\TextInput::make('email')->label('Email')->email()->required(),
                    Forms\Components\TextInput::make('localisation')->label('Localisation')->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Projet')
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make('type_projet')
                        ->label('Type de projet')
                        ->options([
                            'logiciel'       => 'Logiciel métier',
                            'web'            => 'Application web',
                            'mobile'         => 'Application mobile',
                            'infrastructure' => 'Infrastructure IT',
                            'ia'             => 'Agent IA / Automatisation',
                            'formation'      => 'Formation',
                            'autre'          => 'Autre',
                        ]),
                    Forms\Components\Select::make('secteur')
                        ->label('Secteur d\'activité')
                        ->options([
                            'sante'          => 'Santé / Pharmacie',
                            'commerce'       => 'Commerce / Retail',
                            'douanes'        => 'Douanes / Export',
                            'education'      => 'Éducation',
                            'services'       => 'Services',
                            'administration' => 'Administration publique',
                            'autre'          => 'Autre',
                        ]),
                    Forms\Components\Textarea::make('description_besoin')
                        ->label('Description du besoin')
                        ->rows(4)
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Budget & Délai')
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make('budget_estimatif')
                        ->label('Budget estimatif')
                        ->options([
                            '<500k'  => 'Moins de 500 000 FCFA',
                            '500k-2M'=> '500 000 – 2 000 000 FCFA',
                            '2M-10M' => '2 000 000 – 10 000 000 FCFA',
                            '>10M'   => 'Plus de 10 000 000 FCFA',
                        ]),
                    Forms\Components\Select::make('delai_souhaite')
                        ->label('Délai souhaité')
                        ->options([
                            'urgent'  => 'Urgent (< 1 mois)',
                            '1-3mois' => '1 à 3 mois',
                            '3-6mois' => '3 à 6 mois',
                        ]),
                    Forms\Components\TextInput::make('source_contact')->label('Source de contact'),
                ]),

            Forms\Components\Section::make('Suivi CRM')
                ->columns(2)
                ->schema([
                    Forms\Components\Select::make('statut')
                        ->label('Statut')
                        ->options([
                            'nouveau'   => 'Nouveau',
                            'en_cours'  => 'En cours de traitement',
                            'qualifie'  => 'Qualifié',
                            'gagne'     => 'Gagné',
                            'perdu'     => 'Perdu',
                        ])
                        ->default('nouveau'),
                    Forms\Components\Textarea::make('notes_internes')
                        ->label('Notes internes')
                        ->rows(3),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('nom_complet')->label('Client')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('telephone')->label('Téléphone'),
                Tables\Columns\TextColumn::make('email')->label('Email')->searchable(),
                Tables\Columns\TextColumn::make('type_projet')->label('Projet')->badge(),
                Tables\Columns\TextColumn::make('budget_estimatif')->label('Budget'),
                Tables\Columns\TextColumn::make('statut')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'nouveau'  => 'info',
                        'en_cours' => 'warning',
                        'qualifie' => 'primary',
                        'gagne'    => 'success',
                        'perdu'    => 'danger',
                        default    => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')->label('Reçu le')->date('d/m/Y H:i')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('statut')
                    ->options([
                        'nouveau'  => 'Nouveau',
                        'en_cours' => 'En cours',
                        'qualifie' => 'Qualifié',
                        'gagne'    => 'Gagné',
                        'perdu'    => 'Perdu',
                    ]),
                Tables\Filters\SelectFilter::make('type_projet')
                    ->label('Type de projet')
                    ->options([
                        'logiciel'       => 'Logiciel métier',
                        'web'            => 'Application web',
                        'mobile'         => 'Application mobile',
                        'infrastructure' => 'Infrastructure IT',
                        'ia'             => 'IA / Automatisation',
                        'formation'      => 'Formation',
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
            'index'  => Pages\ListDevis::route('/'),
            'create' => Pages\CreateDevis::route('/create'),
            'edit'   => Pages\EditDevis::route('/{record}/edit'),
            'view'   => Pages\ViewDevis::route('/{record}'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('statut', 'nouveau')->count() ?: null;
    }
}
