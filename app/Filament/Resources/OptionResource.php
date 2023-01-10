<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Option;
use App\Models\Category;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MultiSelect;
use App\Filament\Resources\OptionResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OptionResource\RelationManagers;


class OptionResource extends Resource
{
    protected static ?string $model = Option::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('footer_title')->label('Title')->required(),
                Textarea::make('footer_desc')->label('Description')->required(),
                TextInput::make('footer_social_fb')->label('Facebook')->required(),
                TextInput::make('footer_social_twt')->label('Tweeter')->required(),
                TextInput::make('footer_social_you')->label('Youtube')->required(),
                TextInput::make('footer_social_link')->label('Linkedin')->required(),
                TextInput::make('footer_nav')->label('Navbar-Title')->required(),
                MultiSelect::make('footer_category')->options(Category::pluck('cat_name','id')->all())->label('Product Category')->required(),
                TextInput::make('news_title')->label('Newsletter Title')->required(),
                Textarea::make('news_desc')->label('Newsletter Description')->required(),
                TextInput::make('footer_copy')->label('Copyright')->required(),
                TextInput::make('footer_logo')->label('Logo')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('footer_title'),
                Tables\Columns\TextColumn::make('footer_desc')->limit(length:20),
                Tables\Columns\TextColumn::make('footer_social_fb'),
                Tables\Columns\TextColumn::make('footer_social_twt'),
                Tables\Columns\TextColumn::make('footer_social_you'),
                Tables\Columns\TextColumn::make('footer_social_link'),
                Tables\Columns\TextColumn::make('footer_nav'),
                Tables\Columns\TextColumn::make('footer_category'),
                Tables\Columns\TextColumn::make('news_title'),
                Tables\Columns\TextColumn::make('news_desc')->limit(length:20),
                Tables\Columns\TextColumn::make('footer_copy'),
                Tables\Columns\TextColumn::make('footer_logo')
            ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListOptions::route('/'),
            'create' => Pages\CreateOption::route('/create'),
            'edit' => Pages\EditOption::route('/{record}/edit'),
        ];
    }    
}
