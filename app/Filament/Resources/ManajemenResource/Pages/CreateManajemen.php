<?php

namespace App\Filament\Resources\ManajemenResource\Pages;

use App\Filament\Resources\ManajemenResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateManajemen extends CreateRecord
{
    protected static string $resource = ManajemenResource::class;

    protected function getRedirectUrl(): string
    {   
        return $this->getResource()::getUrl('index');
        //alamak
    }   #bocah kontol
}


