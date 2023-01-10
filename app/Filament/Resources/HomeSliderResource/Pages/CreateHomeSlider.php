<?php

namespace App\Filament\Resources\HomeSliderResource\Pages;

use App\Filament\Resources\HomeSliderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHomeSlider extends CreateRecord
{
    protected static string $resource = HomeSliderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
