<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MakeupResource\Pages;
use App\Models\Makeup;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class MakeupResource extends Resource
{
    protected static ?string $model = Makeup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Menentukan halaman-halaman untuk resource ini
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMakeups::route('/'),
            'create' => Pages\CreateMakeup::route('/create'),
            'edit' => Pages\EditMakeup::route('/{record}/edit'),
        ];
    }

    // Form input untuk menambah atau mengedit makeup
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Field untuk Kategory (Enum)
                Select::make('Kategory')
                    ->label('Kategori')
                    ->options([
                        'SD' => 'SD',
                        'SMP' => 'SMP',
                        'SMA' => 'SMA',
                        'Umum' => 'Umum',
                    ])
                    ->required(),

                // Field untuk image
                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->required()
                    ->disk('public') // Pastikan disk 'public' sudah terkonfigurasi
                    ->directory('make_ups/images'), // Tempat penyimpanan gambar

                // Field untuk harga
                TextInput::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->step(1000), // Langkah harga per seribu
            ]);
    }

    // Tabel untuk menampilkan data makeup
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom Kategory
                TextColumn::make('Kategory')
                    ->label('Kategori')
                    ->sortable(),

                // Kolom Gambar
                ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public') // Pastikan gambar diambil dari disk 'public'
                    // ->directory('make_ups/images')
                    ->width(100)
                    ->height(100),

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
                Tables\Actions\EditAction::make(), // Tombol untuk edit data makeup
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
            // Menambahkan relasi jika ada
            // RelationManagers\CategoryRelationManager::class,
        ];
    }
}