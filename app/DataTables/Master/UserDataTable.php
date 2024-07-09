<?php

namespace App\DataTables\Master;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use App\Models\Master\Currency;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
            ->eloquent($query)
            ->rawColumns(['id','action'])
            ->editColumn('id', function (User $model) {
                return $model->id;
            }) 

            ->addColumn('role_id', function (User $model) {
                return $model->roleName->name;
            })          
           
            ->editColumn('created_at', function (User $model) {
                return $model->created_at->format('d M, Y H:i:s');
            })

             ->editColumn('updated_at', function (User $model) {
                return $model->updated_at->format('d M, Y H:i:s');
            })
            

            ->addColumn('action', function (User $model) {
                return view('master_data.user._action-menu', compact('model'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery(); //->where('id', '!=', Auth::user()->id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('Id')->addClass('text-center')->addClass('custom_padding')->addClass('cus_table_bg'), 
            Column::make('first_name')->title(__('First Name'))->addClass('text-center')->addClass('custom_padding'),
            Column::make('last_name')->title(__('Last Name'))->addClass('text-center')->addClass('custom_padding'), 
            Column::make('email')->title(__('Email'))->addClass('text-center')->addClass('custom_padding'),   
            Column::make('role_id')->title(__('Role'))->addClass('text-center')->addClass('custom_padding'),            
            Column::make('created_at')->title(__('Created At'))->addClass('custom_padding')->addClass('text-center'),
            //Column::make('updated_at')->title(__('Updated At'))->addClass('custom_padding')->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('custom_padding')
                ->addClass('text-center')
                ->responsivePriority(-1),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
