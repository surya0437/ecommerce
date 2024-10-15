<?php

namespace App\Filament\Vendor\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Vendor\Resources\ProductResource\Pages;
use App\Filament\Vendor\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Product';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('vendor_id')
                    ->default(Auth::User()->id)
                    ->readOnly()
                    ->label('Vendor ID')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Product Name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->label('Product Price')
                    ->numeric()
                    ->prefix('NRs.'),
                Forms\Components\TextInput::make('discount_percentage')
                    ->label('Discount Percentage')
                    ->required()
                    ->numeric()
                    ->suffix('%')
                    ->default(0),

                Forms\Components\FileUpload::make('image')
                    ->label('Product Image')
                    ->imageEditor()
                    ->image(),
                Forms\Components\Toggle::make('status')
                    ->required()
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Product::query()->where('vendor_id', Auth::user()->id))
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Product Image'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Product Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Product Price')
                    ->money('NRs.', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('discount_percentage')
                    ->label('Discount')
                    ->numeric()
                    ->suffix('%')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('status'),
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
                // Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            // 'create' => Pages\CreateProduct::route('/create'),
            // 'view' => Pages\ViewProduct::route('/{record}'),
            // 'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
