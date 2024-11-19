<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClienteResource\Pages;
use App\Filament\Resources\ClienteResource\RelationManagers;
use App\Models\Cliente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Tabs;
use Filament\Forms\FormsComponent;

class ClienteResource extends Resource
{
    protected static ?string $model = Cliente::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\components\group::make()

                    ->schema([
                        Forms\components\section::make('Datos Personales')
                            ->schema([
                                Forms\components\TextInput::make('cedula')
                                    ->required()
                                    ->name('Documento de Identidad'),
                                Forms\components\TextInput::make('nombre_cli')
                                    ->required()
                                    ->name('Nombre Completo'),
                                Forms\components\TextInput::make('celu_cli')
                                    ->required()
                                    ->name('Número Celular'),
                                Forms\components\TextInput::make('email_cli')
                                    ->required()
                                    ->name('Correo Electrónico')
                                    ->email(),
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nombre_cli')
                    ->searchable()
                    ->sortable()
                    ->label('Nombre Completo'),
                Tables\Columns\TextColumn::make('cedula')
                    ->searchable()
                    ->sortable()
                    ->label('Documento de Identidad'),
                Tables\Columns\TextColumn::make('celu_cli')
                    ->searchable()
                    ->sortable()
                    ->label('Número Celular'),
                Tables\Columns\TextColumn::make('email_cli')
                    ->searchable()
                    ->sortable()
                    ->label('Correo Electrónico'),

            ])

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClientes::route('/'),
            'create' => Pages\CreateCliente::route('/create'),
            'edit' => Pages\EditCliente::route('/{record}/edit'),
        ];
    }
}
