<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn; // Tambahkan import untuk TextColumn

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('description')
                ->label('Description')
                ->required()
                ->maxLength(255),

            FileUpload::make('image')
                ->label('Image')
                ->image()
                ->required()
                ->disk('public')
                ->directory('gallery_images')
                ->maxSize(1024)
                ->imagePreviewHeight(150)
                ->helperText('Upload image from the gallery')
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('image')
                ->label('Image')
                ->disk('public')
                ->width(150)
                ->height(100),

            // Menambahkan kolom untuk deskripsi
            TextColumn::make('description')
                ->label('Description')
                ->limit(50) // Menampilkan maksimum 50 karakter (bisa diubah)
                ->searchable(), // Menambahkan fitur pencarian pada kolom description
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            //
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
