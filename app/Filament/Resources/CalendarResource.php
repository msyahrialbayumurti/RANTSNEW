<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CalendarResource\Pages;
use App\Models\Calendar;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CalendarResource extends Resource
{
    protected static ?string $model = Calendar::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationLabel = 'Kalender Acara';

    protected static ?string $navigationGroup = 'Manajemen Pesanan';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Acara')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('date')
                    ->label('Tanggal Acara')
                    ->required(),

                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->nullable()
                    ->maxLength(1000),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Acara')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('date')
                    ->label('Tanggal Acara')
                    ->sortable()
                    ->date('d/m/Y'),

                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCalendars::route('/'),
            'create' => Pages\CreateCalendar::route('/create'),
            'edit' => Pages\EditCalendar::route('/{record}/edit'),
        ];
    }
}