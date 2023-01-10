<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Layout;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ColorPicker;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_id')
                    ->label('Category')
                    ->options(Category::pluck('cat_name','id')->all()),
                TextInput::make('product_name')->required()
                ->reactive()
                ->afterStateUpdated(function (Closure $set, $state) {
                    $set('slug', Str::slug($state));
                }),
                TextInput::make('slug')->required(),
                TextInput::make('price')->numeric()->required(),
                Select::make('color')
                    ->label('Color')
                    ->options(['black','white','red','blue','green']),
                Select::make('size')
                    ->label('Size')
                    ->options(['XS','S','M','L','XL']),
                Textarea::make('description')->required(),
                FileUpload::make('image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('category_id')->sortable(),
                Tables\Columns\TextColumn::make('product_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('slug')->sortable(),
                Tables\Columns\TextColumn::make('price')->sortable(),
                Tables\Columns\TextColumn::make('color'),
                Tables\Columns\TextColumn::make('size'),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('description')->limit(length:50)
            ])
            ->filters([
                //
            ],
            layout: Layout::AboveContent,)
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }    
}
