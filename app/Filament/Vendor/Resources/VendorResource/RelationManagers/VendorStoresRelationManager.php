<?php

namespace App\Filament\Vendor\Resources\VendorResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendorStoresRelationManager extends RelationManager
{
    protected static string $relationship = 'vendor_stores';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('phone')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\FileUpload::make('featured_image')
                    ->required()
                    ->image(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                ->label('Image'),
                Tables\Columns\TextColumn::make('name')
                ->label('Store Name'),
                Tables\Columns\TextColumn::make('phone')
                ->label('Store Phone'),
                Tables\Columns\TextColumn::make('address')
                ->label('Store Address'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
