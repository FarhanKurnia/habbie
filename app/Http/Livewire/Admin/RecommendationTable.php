<?php

namespace App\Http\Livewire\Admin;

use App\Models\Body_Recommendation;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\{ActionButton, WithExport};
use PowerComponents\LivewirePowerGrid\Filters\Filter;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridColumns};

final class RecommendationTable extends PowerGridComponent
{
    use ActionButton;
    use WithExport;

    public string $primaryKey = 'body_recommendations.id_body_recommendation';
    public string $sortField = 'body_recommendations.id_body_recommendation';

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
     * @return Builder<\App\Models\Product>
     */
    public function datasource(): Builder
    {
        return Body_Recommendation::query()->whereNull('deleted_at')->with('product')->orderBy('updated_at', 'DESC');
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
            ->addColumn('id_body_recommendation')
            // ->addColumn('name', function ($model){

            //     $fixPrice = $model->price;
            //     $discountRule = $model->discount?->rule;
            //     if ($discountRule){
            //         $discountPrice = ($discountRule / 100) * $fixPrice;
            //         $fixPrice -= $discountPrice;
            //     }

            //     return '
            //     <a href="'.route('editProducts', $model->slug).'">
            //         <span class="flex flex-col gap-1">
            //             <p class="font-bold text-lg text-primary">'.$model->name.'</p>
            //             <p class="text-sm text-grey text-opacity-70">'.$model->category->name.'</p>
            //             <p>'.( $discountRule ? \App\Helpers\CurrencyFormat::data($fixPrice) .' <s class="text-grey-secondary">'. \App\Helpers\CurrencyFormat::data($model->price). '</s>' : \App\Helpers\CurrencyFormat::data($model->price)).'</p>
            //         </span>
            //     </a>';
            // })

           /** Example of custom column using a closure **/
            // ->addColumn('name_lower', fn (Product $model) => strtolower(e($model->name)))

            ->addColumn('product_id')
            ->addColumn('image', function ($model) {
                return '<img class="h-24 mx-auto p-2" src="'.url($model->image).'">';
            })
            // ->addColumn('stock', function ($model){
            //     return '<p class="text-lg px-2">'.$model->stock.'</p>';
            // })
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
            Column::make('Image', 'image'),
            Column::make('Recommendation Name', 'name')->searchable(),
            // Column::make('Stock', 'stock'),
            // Column::make('Created at', 'created_at_formatted', 'created_at')
            //     ->sortable(),
        ];
    }

    /**
     * PowerGrid Filters.
     *
     * @return array<int, Filter>
     */
    public function filters(): array
    {
        return [
            // Filter::inputText('name')->operators(['contains']),
            // Filter::inputText('image')->operators(['contains']),
            // Filter::inputText('slug')->operators(['contains']),
            // Filter::datetimepicker('deleted_at'),
            // Filter::datetimepicker('created_at'),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Product Action Buttons.
     *
     * @return array<int, Button>
     */

    
    public function actions(): array
    {

        return [
            Button::add('edit')
                ->caption('Edit')
                ->class('btn bg-teal-shadow hover:bg-teal-shadow  bg-opacity-75')
                ->route('editRecommendations', ['slug' => 'slug'])
                ->target('_self')
            ,
            Button::add('delete')
                ->bladeComponent('admin.partials.modal', [
                        'slug' => 'slug',
                        'title' => 'Delete Recommendation',
                        'routeName' => 'deleteRecommendations',
                        'description' => 'Are you sure want to delete this recommendation product?',
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
     * PowerGrid Product Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($product) => $product->id === 1)
                ->hide(),
        ];
    }
    */

    public function header(): array
    {
        return [
            Button::add('add-new-recommendation')
                ->caption('Add New Recommendation')
                ->class('btn bg-pink-primary text-white hover:bg-pink-primary bg-opacity-75')
                ->route('createRecommendations', [])
                ->target('_self'),
        ];
    }
}
