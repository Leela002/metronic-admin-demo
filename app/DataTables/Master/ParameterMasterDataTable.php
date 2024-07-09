<?php
namespace App\DataTables\Master;
use App\Models\ParameterMaster;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\WithExportQueue;

class ParameterMasterDataTable extends DataTable
{

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function (ParameterMaster $parameter_master) {
            return view('master_data.parameter_master._action-menu', compact('model'));
        })
        
        ->editColumn('created_at', function (ParameterMaster $parameter_master) {
            return $parameter_master->created_at->format('d-m-Y, h:i:s');
        })
        ->editColumn('updated_at', function (ParameterMaster $parameter_master) {
            return $parameter_master->updated_at->format('d-m-Y, h:i:s');
        })
        
        // ->editColumn('fund_category', function (Fund $fund) {
        //     return $fund->category->name;
        // })
        // ->editColumn('type', function (Fund $fund) {
        //     return $fund->fund_type->name;
        // })
        ->editColumn('created_by', function (ParameterMaster $parameter_master) {
            return optional($parameter_master->createdBy)->name ?? 'N/A';
        })
        ->editColumn('updated_by', function (ParameterMaster $parameter_master) {
            return optional($parameter_master->updatedBy)->name ?? 'N/A';
        })
        ->filterColumn('created_at', function ($query, $keyword) {
            // Apply DATE_FORMAT in the SQL query to format the date for searching
            $query->whereRaw("DATE_FORMAT(created_at, '%d-%m-%Y') LIKE ?", ["%$keyword%"]);
        })
        // ->filterColumn('value', function ($query, $keyword) {
        //     // Check if the provided keyword is numeric
        //     if (is_numeric($keyword)) {
        //         $query->where('value', '=', $keyword);
        //     }
        // })
        
        
          ->setRowId('id');
    }
    /**
     * Get the query source of dataTable.
     */
    public function query(ParameterMaster $model): QueryBuilder
    {
        return $model->newQuery();
    }
    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('parameter_master-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
                    // ->addTableClass('table align-middle table-striped1 table-row-dashed fs-6 gy-5 dataTable no-footer  fw-semibold')
                    // ->setTableHeadClass('text-start tabel-D text-white fw-semibold fs-7 text-uppercase gs-0')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    // ->drawCallback("function() {" . file_get_contents(resource_path('views/pages//apps/setting/parameters/columns/_draw-scripts.js')) . "}")
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
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->addClass('text-center px-5'),
            Column::make('parameter_name')->addClass('text-center'),
            Column::make('slug')->addClass('text-center'),
            Column::make('type')->addClass('text-center'),
            Column::make('value')->addClass('text-center'),
            Column::make('help_text')->addClass('text-center'),
            // Column::make('created_by')->addClass('text-center'),
            // Column::make('updated_by')->addClass('text-center'),
            //Column::make('created_at')->addClass('text-center'),
            // Column::make('updated_at')->addClass('text-center'),
        ];
    }
    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ClientMasters_' . date('YmdHis');
    }
}