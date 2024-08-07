<?php

namespace App\Filament\Resources;

use App\Enums\Tech;
use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //BROKEN
                CheckboxList::make('enum_checkboxlist_with_descriptions')
                        ->options(Tech::class),

                //WORKS
                CheckboxList::make('regular_checkboxlist_with_descriptions')
                    ->columnSpan('full')
                    ->options([
                        'tailwind' => 'Tailwind CSS',
                        'alpine' => 'Alpine.js',
                        'laravel' => 'Laravel',
                        'livewire' => 'Laravel Livewire',
                    ])
                    ->descriptions([
                        'tailwind' => 'A utility-first CSS framework for rapidly building modern websites without ever leaving your HTML.',
                        'alpine' => new HtmlString('A rugged, minimal tool for composing behavior <strong>directly in your markup</strong>.'),
                        'laravel' => str('A **web application** framework with expressive, elegant syntax.')->inlineMarkdown()->toHtmlString(),
                        'livewire' => 'A full-stack framework for Laravel building dynamic interfaces simple, without leaving the comfort of Laravel.',
                    ]),
            ]);
                
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
