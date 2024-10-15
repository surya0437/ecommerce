<?php

namespace App\Filament\Vendor\Widgets;

use Filament\Tables;
use App\Models\Order;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Widgets\TableWidget as BaseWidget;

class NewOrder extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn() => Order::query()
                    ->where('vendor_id', Auth::guard('vendor')->user()->id)
                    ->where('status', 'Pending')
            )
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->copyable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Customer Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shipping_address.phone')
                    ->copyable()
                    ->label('Customer Phone')
                    ->searchable(),

                Tables\Columns\TextColumn::make('shipping_address.address_note')
                    ->label('Customer Address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_amount')
                ->money('NRs.')
                ->suffix ('/-')
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
                    ]),

            ]);
    }
}
