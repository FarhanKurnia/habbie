<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class OrderTable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    public string $primaryKey = 'orders.id_order';
    public string $sortField = 'orders.id_order';

    public $colorStatus = [
        "paid" => "bg-green text-white",
        "unpaid" => "bg-danger text-white",
        "pending" => "bg-grey-secondary",
        "done" => "bg-green text-white",
        "failed" => "bg-danger text-white",
        "cancel" => "bg-danger text-white bg-opacity-50",
        "order" => "bg-grey-secondary ",
        "process" => "bg-green text-white bg-opacity-40"
    ];

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
        return Order::query()->whereNull('deleted_at')->orderBy('created_at', 'DESC');
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
            ->addColumn('invoice', function ($model){
                return '
                    <a href="'.route('editOrders', $model->invoice).'">
                    <p>'. $model->name .'</p>
                    <p class="font-bold text-lg text-primary">#'.$model->invoice.'</p>
                    </a>
                ';
            })
            ->addColumn('status_payment', function ($model){
                return '<p class="text-sm px-2 text-center rounded py-1 '. $this->colorStatus[$model->status_payment].' ">'.$model->status_payment.'</p>';
            })
            ->addColumn('status_order', function ($model){
                return '<p class="text-sm px-2 text-center rounded py-1 '. $this->colorStatus[$model->status_order].' ">'.$model->status_order.'</p>';
            })
            ->addColumn('total', function ($model){
                return '<p class="text-lg px-2  rounded py-1">'.\App\Helpers\CurrencyFormat::data($model->total).'</p>';
            })
            ->addColumn('resi', function ($model) {
                return '<pre class="text-pink-primary">'. $model->resi .'</pre>';
            })
            ->addColumn('created_at', function ($model) {
                return $model->created_at;
            })
            ->addColumn('inv', function ($model) {
                return $model->invoice;
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
            Column::make('Invoice', 'invoice')->searchable(),
            Column::make('Total', 'total'),
            Column::make('Status Payment', 'status_payment')->searchable(),
            Column::make('Status Order', 'status_order')->searchable(),
            Column::make('Resi', 'resi')->searchable(),
            Column::make('Date', 'created_at')->searchable(),

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
                 ->caption('Update')
                 ->class('btn bg-teal-shadow hover:bg-teal-shadow  bg-opacity-75')
                 ->route('editOrders', ['invoice' => 'inv'])
                 ->target('_self')
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

    // public function header(): array
    // {
    //     return [
    //         Button::add('add-new-discount')
    //             ->caption('Add New Discount')
    //             ->class('btn bg-pink-primary text-white hover:bg-pink-primary bg-opacity-75')
    //             ->route('createDiscounts', [])
    //             ->target('_self'),
    //     ];
    // }
}
