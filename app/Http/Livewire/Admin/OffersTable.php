<?php

namespace App\Http\Livewire\Admin;

use App\Models\Offer;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class OffersTable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    public string $primaryKey = 'offers.id_offer ';
    public string $sortField = 'offers.id_offer';

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
     * @return Builder<\App\Models\Product_Category>
     */
    public function datasource(): Builder
    {
        return Offer::query()->whereNull('deleted_at')->orderBy('updated_at', 'DESC');
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
            ->addColumn('image', function ($model) {
                    return '<img class="h-24 my-4 mx-auto" src="'.url($model->image).'">';
            })
            ->addColumn('name', function($model){
                return '
                    <a href="'.route('editOffers', $model->slug).'">
                        <p class="font-bold text-lg text-primary">'.$model->name.'</p>
                    </a>
                ';
            });
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
            Column::make('IMage', 'image'),
            Column::make('Name', 'name')->searchable(),
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
     * PowerGrid Product_Category Action Buttons.
     *
     * @return array<int, Button>
     */

    
    public function actions(): array
    {
        return [
            Button::add('edit')
                ->caption('Edit')
                ->class('btn bg-teal-shadow hover:bg-teal-shadow  bg-opacity-75')
                ->route('editOffers', ['slug' => 'slug'])
                ->target('_self')
            ,
            Button::add('delete')
                ->bladeComponent('admin.partials.modal', [
                        'slug' => 'slug',
                        'title' => 'Delete Offer',
                        'routeName' => 'deleteOffers',
                        'description' => 'Are you sure want to delete this offer?',
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
     * PowerGrid Product_Category Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($product_-category) => $product_-category->id === 1)
                ->hide(),
        ];
    }
    */

    public function header(): array
    {
        return [
            Button::add('add-new-offer')
                ->caption('Add New Offer')
                ->class('btn bg-pink-primary text-white hover:bg-pink-primary bg-opacity-75')
                ->route('createOffers', [])
                ->target('_self'),
        ];
    }
}
