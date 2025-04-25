<?php

namespace App\Filament\Resources;

use App\Models\PenyewaanJasaTari;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Filament\Resources\PenyewaanjasatariResource\Pages;


class PenyewaanjasatariResource extends Resource
{
    protected static ?string $model = PenyewaanJasaTari::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Menentukan halaman-halaman untuk resource ini
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenyewaanJasaTaris::route('/'),
            'create' => Pages\CreatePenyewaanJasaTari::route('/create'),
            'edit' => Pages\EditPenyewaanJasaTari::route('/{record}/edit'),
        ];
    }

    // Form input untuk menambah atau mengedit penyewaan jasa tari
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Field untuk jumlah penari
                TextInput::make('jumlah_penari')
                    ->label('Jumlah Penari')
                    ->numeric()
                    ->required(),

                // Field untuk jenis tarian
                TextInput::make('jenis_tarian')
                    ->label('Jenis Tarian')
                    ->required(),

                // Field untuk gambar
                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->required()
                    ->disk('public') // Pastikan disk 'public' sudah terkonfigurasi
                    ->directory('penyewaan_jasa_taris/images'), // Tempat penyimpanan gambar

                // Field untuk deskripsi acara
                Textarea::make('deskripsi_acara')
                    ->label('Deskripsi Acara')
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

    // Tabel untuk menampilkan data penyewaan jasa tari
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom Jumlah Penari
                TextColumn::make('jumlah_penari')
                    ->label('Jumlah Penari')
                    ->sortable(),

                // Kolom Jenis Tarian
                TextColumn::make('jenis_tarian')
                    ->label('Jenis Tarian')
                    ->sortable(),

                // Kolom Gambar
                ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public') // Pastikan gambar diambil dari disk 'public'
                    // ->directory('penyewaan_jasa_taris/images')
                    ->width(100)
                    ->height(100),

                // Kolom Deskripsi Acara
                TextColumn::make('deskripsi_acara')
                    ->label('Deskripsi Acara')
                    ->sortable(),

                // Kolom Harga
                TextColumn::make('harga')
                    ->label('Harga')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
            ])
            ->filters([
                // Anda dapat menambahkan filter berdasarkan kategori atau harga jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(), // Tombol untuk edit data penyewaan jasa tari
            ])
            ->bulkActions([
                // Aksi bulk seperti delete
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // Relasi dengan model lain (jika diperlukan)
    public static function getRelations(): array
    {
        return [
            // Misalnya, relasi dengan kategori atau model lainnya
        ];
    }
}