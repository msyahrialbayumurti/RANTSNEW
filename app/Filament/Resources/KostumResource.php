<?php

namespace App\Filament\Resources;

use App\Models\Kostum; // Model yang digunakan
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Filament\Resources\KostumResource\Pages;

class KostumResource extends Resource
{
    protected static ?string $model = Kostum::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Halaman untuk resource ini
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKosta::route('/'),
            'create' => Pages\CreateKostum::route('/create'),
            'edit' => Pages\EditKostum::route('/{record}/edit'),
        ];
    }

    // Form input untuk menambah atau mengedit data kostum
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Field untuk nama kostum
                TextInput::make('nama_kostum')
                    ->label('Nama Kostum')
                    ->required(),

                // Field untuk gambar
                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->required()
                    ->disk('public') // Pastikan disk 'public' sudah terkonfigurasi
                    ->directory('kosta/images'), // Tempat penyimpanan gambar

                // Field untuk jumlah
                TextInput::make('jumlah')
                    ->label('Jumlah')
                    ->numeric()
                    ->required()
                    ->minValue(1),

                // Field untuk warna
                TextInput::make('warna')
                    ->label('Warna')
                    ->required(),

                // Field untuk ukuran
                TextInput::make('ukuran')
                    ->label('Ukuran')
                    ->required(),

                // Field untuk harga
                TextInput::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->step(1000), // Langkah harga per seribu
            ]);
    }

    // Tabel untuk menampilkan data kostum
    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                // Kolom Nama Kostum
                TextColumn::make('nama_kostum')
                    ->label('Nama Kostum')
                    ->sortable(),

                // Kolom Gambar
                ImageColumn::make('image')
                    ->label('Gambar')
                    ->disk('public') // Pastikan gambar diambil dari disk 'public'
                    ->width(100) // Lebar gambar
                    ->height(100), // Tinggi gambar

                // Kolom Jumlah
                TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->sortable(),

                // Kolom Warna
                TextColumn::make('warna')
                    ->label('Warna')
                    ->sortable(),

                // Kolom Ukuran
                TextColumn::make('ukuran')
                    ->label('Ukuran')
                    ->sortable(),

                // Kolom Harga
                TextColumn::make('harga')
                    ->label('Harga')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    // Relasi dengan model lain (jika diperlukan)
    public static function getRelations(): array
    {
        return [];
    }
}
