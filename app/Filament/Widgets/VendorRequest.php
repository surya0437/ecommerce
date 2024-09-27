<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Vendor;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Widgets\TableWidget as BaseWidget;

class VendorRequest extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn() => Vendor::query()->where('status', 'pending')
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('phone')
                    ->copyable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('vendor_stores.name')
                    ->label('Store Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vendor_stores.phone')
                    ->label('Store Phone')
                    ->copyable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('vendor_stores.address')
                    ->label('Store Address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Approved' => 'success',
                        'Rejected' => 'danger',
                    })
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->Form([
                        Select::make('status')
                            ->options([
                                "Pending" => "Pending",
                                "Approved" => "Approved",
                                "Rejected" => "Rejected",
                            ])
                            ->required()
                    ])
            ]);
    }
}
