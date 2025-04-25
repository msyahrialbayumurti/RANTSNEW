<?php

namespace App\Filament\Resources;

use App\Models\PesananKostum;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\PesananKostumResource\Pages;

class PesananKostumResource extends Resource
{
    protected static ?string $model = PesananKostum::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Manajemen Pesanan';
    protected static ?string $navigationLabel = 'Pesanan Kostum';

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('nama_kostum')->label('Nama Kostum')->sortable(),
                TextColumn::make('ukuran')->label('Ukuran')->sortable(),
                TextColumn::make('jumlah')->label('Jumlah')->sortable(),
                TextColumn::make('status_pesanan')->label('Status')->sortable(),
                TextColumn::make('total_harga')->label('Total Harga')->money('IDR'),
                TextColumn::make('waktu_pemakaian_mulai')->label('Waktu Mulai')->dateTime(),
                TextColumn::make('waktu_pemakaian_selesai')->label('Waktu Selesai')->dateTime(),
            ])
            ->filters([
                SelectFilter::make('status_pesanan')
                    ->options([
                        'pending' => 'Pending',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ]),
            ]);
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('nama_kostum')->label('Nama Kostum')->required(),
                TextInput::make('ukuran')->label('Ukuran')->required(),
                TextInput::make('jumlah')->label('Jumlah')->numeric()->required(),
                Select::make('status_pesanan')
                    ->options([
                        'pending' => 'Pending',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ])
                    ->label('Status')
                    ->required(),
                TextInput::make('total_harga')->label('Total Harga')->numeric()->required(),
                DatePicker::make('waktu_pemakaian_mulai')->label('Waktu Mulai')->required(),
                DatePicker::make('waktu_pemakaian_selesai')->label('Waktu Selesai')->required(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesananKosta::route('/'),
            'create' => Pages\CreatePesananKostum::route('/create'),
            'edit' => Pages\EditPesananKostum::route('/{record}/edit'),
        ];
    }
}