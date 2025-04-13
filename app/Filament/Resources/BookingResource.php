<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('room_id')
                    ->label('Nama Kamar')
                    ->relationship('room', 'name')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Nama Pemesan')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->label('No. Telepon')
                    ->required(),
                Forms\Components\DatePicker::make('check_in')
                    ->label('Check-in')
                    ->required(),
                Forms\Components\DatePicker::make('check_out')
                    ->label('Check-out')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('room.name')
                    ->label('Kamar'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pemesan'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Telepon'),
                Tables\Columns\TextColumn::make('check_in')
                    ->label('Check-in')
                    ->date(),
                Tables\Columns\TextColumn::make('check_out')
                    ->label('Check-out')
                    ->date(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Booking')
                    ->since(), // tampilkan waktu relatif, seperti "2 hari lalu"
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

    // ✅ Tambahkan eager loading di sini
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('room');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
