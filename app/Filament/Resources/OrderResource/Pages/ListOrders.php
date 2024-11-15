<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('All'),
            'pending' => Tab::make()->query(fn ($query) => $query->where('status', 'pending')),
            'completed' => Tab::make()->query(fn ($query) => $query->where('status', 'completed')),
            'cancelled' => Tab::make()->query(fn ($query) => $query->where('status', 'cancelled')),
            // 'delivered' => Tab::make()->query(fn ($query) => $query->where('status', 'delivered')),
            // 'cancelled' => Tab::make()->query(fn ($query) => $query->where('status', 'cancelled')),
        ];
    }
}
