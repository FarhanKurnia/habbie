<?php

namespace App\Http\Livewire\Admin;

use App\Models\Article;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class ArticlesTable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    public string $primaryKey = 'articles.id_article';
    public string $sortField = 'articles.id_article';

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Article>
     */
    public function datasource(): Builder
    {
        return Article::query()->where('categories', 'article')->whereNull('deleted_at')->with('user')->orderBy('updated_at', 'DESC');;
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('title', function ($model) {
                return '<p class="text-lg px-2">'.$model->title.'</p>';
            })
            ->addColumn('image', function ($model) {
                return '<img class="h-36 mx-auto p-2" src="'.url($model->image).'">';
            })
            ->addColumn('user_id', function ($model) {
                return '<p class="text-lg px-2">'.$model->user?->name.'</p>';
            });
            // ->addColumn('image')
            // ->addColumn('categories')
            // ->addColumn('updated_at', function ($model) {
            //     // $date = Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            //     return '<p class="text-lg px-2">'.$model->updated_at.'</p>';

            // });
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
      * PowerGrid Columns.
      *
      * @return array<int, Column>
      */
    public function columns(): array
    {
        return [
            Column::make('Image', 'image'),
            Column::make('Title', 'title')->searchable(),
            Column::make('User', 'user_id'),
            // Column::make('Categories', 'categories')->searchable(),
            // Column::make('Update at', 'created_at_formatted', 'updated_at')->sortable(),
        ];
    }

    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
    public function filters(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Article Action Buttons.
     *
     * @return array<int, Button>
     */

     public function actions(): array
     {
         return [
             Button::add('edit')
                 ->caption('Edit')
                 ->class('btn bg-teal-shadow hover:bg-teal-shadow  bg-opacity-75')
                 ->route('editArticles', ['slug' => 'slug'])
                 ->target('_self')
             ,
             Button::add('delete')
                 ->bladeComponent('admin.partials.modal', [
                         'slug' => 'slug',
                         'title' => 'Delete Articles',
                         'routeName' => 'deleteArticles',
                         'description' => 'Are you sure want to delete this article?',
                         'action' => 'Delete'
                     ])
             ,
         ];
     }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Article Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($article) => $article->id === 1)
                ->hide(),
        ];
    }
    */

    public function header(): array
    {
        return [
            Button::add('add-new-article')
                ->caption('Add New Article')
                ->class('btn bg-pink-primary text-white hover:bg-pink-primary bg-opacity-75')
                ->route('createArticles', [])
                ->target('_self'),
        ];
    }
}
