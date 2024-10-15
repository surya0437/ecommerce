<?php

namespace App\Filament\Vendor\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Vendor\Resources\OrderResource\Pages;
use App\Filament\Vendor\Resources\OrderResource\RelationManagers;
use App\Filament\Vendor\Resources\OrderResource\RelationManagers\OrderIdRelationManager;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::Where('status', 'Pending')->Where('vendor_id', Auth::guard('vendor')->user()->id)->count();
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('order_number')
                //     ->required()
                //     ->disabled()
                //     ->disabled()
                //     ->numeric(),
                // Forms\Components\Select::make('user_id')
                //     ->relationship('user', 'name')
                //     ->label('Customer Name')
                //     ->disabled()
                //     ->required(),
                // Forms\Components\Select::make('shipping_address_id')
                //     ->relationship('shipping_address', 'title')
                //     ->label('Customer Address')
                //     ->disabled()
                //     ->required(),
                // Forms\Components\Select::make('status')
                //     ->required()
                //     ->options([
                //         "Pending" => "Pending",
                //         "Approved" => "Approved",
                //         "Rejected" => "Rejected",
                //     ])
                //     ->default('Pending'),
                // Forms\Components\TextInput::make('total_amount')
                //     ->required()
                //     ->label('Total Amount')
                //     ->disabled()
                //     ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                fn() => Order::query()
                    ->where('vendor_id', Auth::guard('vendor')->user()->id)
                // ->where('status', 'Pending')
            )
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                ->label('Order Number')
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
                    ->suffix('/-')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Approved' => 'success',
                        'Rejected' => 'danger',
                        'Received' => 'success',
                    })
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->form([
                        Forms\Components\Select::make('status')
                            ->required()
                            ->options([
                                "Pending" => "Pending",
                                "Approved" => "Approved",
                                "Rejected" => "Rejected",
                            ])
                    ]),
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
            OrderIdRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            // 'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            // 'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
