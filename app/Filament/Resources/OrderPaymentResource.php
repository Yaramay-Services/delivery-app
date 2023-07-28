<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Pages\Page;
use App\Models\OrderPayment;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderPaymentResource\Pages;
use App\Filament\Resources\OrderPaymentResource\RelationManagers;
use App\Filament\Resources\OrderPaymentResource\Pages\EditOrderPayment;
use App\Filament\Resources\OrderPaymentResource\Pages\ListOrderPayments;
use App\Filament\Resources\OrderPaymentResource\Pages\CreateOrderPayment;

class OrderPaymentResource extends Resource
{
    protected static ?string $model = OrderPayment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('is_confirmed')
                    ->disabled(fn ($record) => $record->is_confirmed)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')->sortable(),
                TextColumn::make('ref_no')->sortable(),
                TextColumn::make('payment_method')->sortable(),
                BadgeColumn::make('is_confirmed')
                    ->icons([
                        'heroicon-o-x' => 0,
                        'heroicon-o-check' => 1,
                    ])

            ])
            ->filters([
                TernaryFilter::make('is_confirmed')->default(),
                Filter::make('created_at')
                    ->form([
                        Forms\Components\TextInput::make('ref_no'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['ref_no'],
                                fn (Builder $query, $refNo): Builder => $query->where('ref_no', 'like', "$refNo%"),
                            );
                    })
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                //   Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListOrderPayments::route('/'),
            'create' => Pages\CreateOrderPayment::route('/create'),
            'edit' => Pages\EditOrderPayment::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
