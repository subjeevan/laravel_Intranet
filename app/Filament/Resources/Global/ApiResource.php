<?php

namespace App\Filament\Resources\Global;

use App\Filament\Resources\Global\ApiResource\Pages;
use App\Filament\Resources\Global\ApiResource\RelationManagers;
use App\Models\Global\Api;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApiResource extends Resource
{
    protected static ?string $model = Api::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('servicename')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('username')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('remoteuser')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('partnerid')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('locationid')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('path1')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('path2')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('servicename')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('remoteuser')
                    ->searchable(),
                Tables\Columns\TextColumn::make('partnerid')
                    ->searchable(),
                Tables\Columns\TextColumn::make('locationid')
                    ->searchable(),
                Tables\Columns\TextColumn::make('path1')
                    ->searchable(),
                Tables\Columns\TextColumn::make('path2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApis::route('/'),
            'create' => Pages\CreateApi::route('/create'),
            'edit' => Pages\EditApi::route('/{record}/edit'),
        ];
    }
}
