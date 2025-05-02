<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManajemenResource\Pages;
use App\Filament\Resources\ManajemenResource\RelationManagers;
use App\Models\Manajemen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManajemenResource extends Resource
{
    protected static ?string $model = Manajemen::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Karyawan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->minLength(3),
                Forms\Components\TextInput::make('no_hp')
                    ->required()
                    ->tel()
                    ->unique(ignoreRecord: true)
                    ->label('Nomer Handphone'),
                Forms\Components\TextInput::make('alamat'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('no_hp')->label('Nomer Handphone')->searchable(),
                Tables\Columns\TextColumn::make('alamat')->searchable(),
            ])
            ->filters([
                // 
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListManajemens::route('/'),
            'create' => Pages\CreateManajemen::route('/create'),
            'edit' => Pages\EditManajemen::route('/{record}/edit'),
        ];
    }
}
