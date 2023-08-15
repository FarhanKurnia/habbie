<?php

namespace App\Http\Livewire\Admin;

use App\Models\Discount;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class ProductsDiscountTable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    public string $primaryKey = 'discounts.id_discount';
    public string $sortField = 'discounts.id_discount';

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
     * @return Builder<\App\Models\Discount>
     */
    public function datasource(): Builder
    {
        return Discount::query()->whereNull('deleted_at')->orderBy('updated_at', 'DESC');
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
            ->addColumn('name', function ($model){
                return '
                    <a href="'.route('editDiscounts', $model->slug).'">
                        <p class="font-bold text-lg text-primary">'.$model->name.'</p>
                    </a>
                ';
            })
            ->addColumn('rule', function ($model){
                return '<p class="text-lg px-2">'.$model->rule.'%</p>';
            })
            ->addColumn('status');
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
            Column::make('Name', 'name')->searchable(),
            Column::make('Rule', 'rule'),
            Column::make('Status', 'status')->searchable(),
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
     * PowerGrid Discount Action Buttons.
     *
     * @return array<int, Button>
     */

     public function actions(): array
     {
 
         return [
             Button::add('edit')
                 ->caption('Edit')
                 ->class('btn bg-teal-shadow hover:bg-teal-shadow  bg-opacity-75')
                 ->route('editDiscounts', ['slug' => 'slug'])
                 ->target('_self')
             ,
             Button::add('delete')
                 ->bladeComponent('admin.partials.modal', [
                         'slug' => 'slug',
                         'title' => 'Delete Discount',
                         'routeName' => 'deleteDiscounts',
                         'description' => 'Are you sure want to delete this discount?',
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
     * PowerGrid Discount Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($discount) => $discount->id === 1)
                ->hide(),
        ];
    }
    */

    public function header(): array
    {
        return [
            Button::add('add-new-discount')
                ->caption('Add New Discount')
                ->class('btn bg-pink-primary text-white hover:bg-pink-primary bg-opacity-75')
                ->route('createDiscounts', [])
                ->target('_self'),
        ];
    }
}
