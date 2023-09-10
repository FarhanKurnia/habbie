<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class UsersTable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    public string $primaryKey = 'users.id_user';
    public string $sortField = 'users.id_user';

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
        return User::query()->whereNull('deleted_at')->orderBy('created_at', 'DESC');
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
            ->addColumn('name', function($model){
                return '
                    <span>
                        <p class="font-bold text-lg text-primary">'.$model->name.'</p>
                        <p class="">'.$model->email.'</p>
                    </span>
                ';
            })
            ->addColumn('role', function($model){
                return '<p class="">'.$model->role->name.'</p>';
            })
            ->addColumn('email_verified', function($model){
                $email =  $model->email_verified ? 'Yes' : 'No';
                return $email;
            })
            ->addColumn('email_verified_at', function($model){
                return $model->email_verified_at;
            })
            ;
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
            Column::make('Role', 'role')->searchable(),
            Column::make('Email Verified', 'email_verified')->searchable(),
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
            Button::add('detail')
                ->caption('Detail')
                ->class('btn bg-teal-shadow hover:bg-teal-shadow  bg-opacity-75')
                ->route('showUsers', ['customer_id' => 'customer_id'])
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

}
