<?php

namespace App\Filament\Resources;

use App\Models\PesananMakeUp;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use App\Filament\Resources\PesananMakeUpResource\Pages;

class PesananMakeUpResource extends Resource
{
    protected static ?string $model = PesananMakeUp::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group'; // Icon untuk menu
    protected static ?string $navigationGroup = 'Manajemen Pesanan'; // Grup menu
    protected static ?string $navigationLabel = 'Pesanan Makeup'; // Nama menu

    // Menampilkan tabel data
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('user.name')->label('Nama User')->sortable(),
                Tables\Columns\TextColumn::make('make_ups.kategory')->label('Kategory')->sortable(),
                Tables\Columns\TextColumn::make('tanggal_pesanan')->label('Tanggal Pesanan')->dateTime(),
                Tables\Columns\TextColumn::make('lokasi_pemesanan')->label('Lokasi Pemesanan'),
                Tables\Columns\TextColumn::make('total_harga')->label('Total Harga')->money('IDR'),
                Tables\Columns\TextColumn::make('status_pesanan')->label('Status Pesanan')->sortable(),
            ])
            ->filters([
                SelectFilter::make('status_pesanan')
                    ->options([
                        'pending' => 'Pending',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ])
                    ->label('Status'),
            ]);
    }

    // Form untuk input data
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('tanggal_pesanan')->label('Tanggal Pesanan')->required(),
                TextInput::make('lokasi_pemesanan')->label('Lokasi Pemesanan')->required(),
                TextInput::make('latitude')->label('Latitude')->numeric()->required(),
                TextInput::make('longitude')->label('Longitude')->numeric()->required(),
                TextInput::make('total_harga')->label('Total Harga')->numeric()->required(),

                Select::make('status_pesanan')
                    ->options([
                        'pending' => 'Pending',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ])
                    ->label('Status Pesanan')
                    ->required(),
            ]);
    }

    // Halaman-halaman untuk resource
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesananMakeUps::route('/'),
            'create' => Pages\CreatePesananMakeUp::route('/create'),
            'edit' => Pages\EditPesananMakeUp::route('/{record}/edit'),
        ];
    }
}