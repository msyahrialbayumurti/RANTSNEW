<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarPenggunaResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DaftarPenggunaResource extends Resource
{
    // Menentukan model yang digunakan
    protected static ?string $model = User::class;

    // Menentukan icon pada menu navigasi
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    // Form untuk input atau edit data pengguna
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->maxLength(255),
                // Forms\Components\TextInput::make('password')
                //     ->label('Password')
                //     ->password()
                //     ->minLength(8)
                //     ->required(fn ($state) => is_null($state) ? true : false), // hanya wajib saat menambahkan pengguna baru
            ]);
    }

    // Menentukan kolom tabel yang akan ditampilkan pada daftar pengguna
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pengguna')
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email Pengguna')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Bergabung')
                    ->sortable()
                    ->date(),
                Tables\Columns\TextColumn::make('role')
                    ->label('role')
                    ->sortable(),
            ])
            ->filters([
                // Anda dapat menambahkan filter jika diperlukan, misalnya berdasarkan status pengguna atau lainnya
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()]),
            ]);
    }

    // Menambahkan relasi jika diperlukan, misalnya jika pengguna memiliki relasi dengan model lain
    public static function getRelations(): array
    {
        return [
            // Tambahkan relasi jika diperlukan, contoh jika ada relasi dengan model lain
            // RelationManagers\PesananRelationManager::class,
        ];
    }

    // Halaman yang akan ditampilkan pada resource
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDaftarPenggunas::route('/'),
            'create' => Pages\CreateDaftarPengguna::route('/create'),
            'edit' => Pages\EditDaftarPengguna::route('/{record}/edit'),
        ];
    }
}
