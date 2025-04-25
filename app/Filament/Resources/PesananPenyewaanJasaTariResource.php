<?php

namespace App\Filament\Resources;

use App\Models\PesananPenyewaanJasaTari;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Filament\Resources\PesananPenyewaanJasaTariResource\Pages;

class PesananPenyewaanJasaTariResource extends Resource
{
    protected static ?string $model = PesananPenyewaanJasaTari::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group'; // Ikon menu
    protected static ?string $navigationGroup = 'Manajemen Pesanan'; // Grup menu
    protected static ?string $navigationLabel = 'Pesanan Penyewaan Jasa Tari'; // Nama menu

    // Menampilkan tabel data
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable(),
                TextColumn::make('user.name')->label('Nama User')->sortable(),
                TextColumn::make('penyewaan_jasa_tari_id')->label('Nama Produk')->sortable(),
                TextColumn::make('jumlah_penari')->label('Jumlah Penari')->sortable(),
                TextColumn::make('tanggal')->label('Tanggal Pemesanan')->dateTime(),
                TextColumn::make('jenis_tarian')->label('Jenis Tarian')->sortable(),
                TextColumn::make('jam_pemakaian')->label('Jam Pemakaian')->sortable(),
                TextColumn::make('total_harga')->label('Total Harga')->money('IDR'),
                TextColumn::make('status_pesanan')->label('Status Pesanan')->sortable(),
            ])
            ->filters([
                SelectFilter::make('status_pesanan')
                    ->options([
                        'pending' => 'Pending',
                        'diproses' => 'Diproses',
                        'selesai' => 'Selesai',
                        'dibatalkan' => 'Dibatalkan',
                    ])
                    ->label('Status Pesanan'),
            ]);
    }

    // Form untuk input data
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('tanggal')->label('Tanggal Pemesanan')->required(),
                TextInput::make('jam_pemakaian')->label('Jam Pemakaian')->numeric()->required(),
                TextInput::make('lokasi')->label('Lokasi')->required(),
                TextInput::make('latitude')->label('Latitude')->numeric()->required(),
                TextInput::make('longitude')->label('Longitude')->numeric()->required(),
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

    // Halaman-halaman untuk resource ini
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesananPenyewaanJasaTaris::route('/'),
            'create' => Pages\CreatePesananPenyewaanJasaTari::route('/create'),
            'edit' => Pages\EditPesananPenyewaanJasaTari::route('/{record}/edit'),
        ];
    }
}