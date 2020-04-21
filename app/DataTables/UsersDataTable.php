<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'backend.users.addons.actions')
            ->addColumn('full_name', 'backend.users.addons.full_name')
            ->addIndexColumn()
            ->rawColumns([
                'action',
                'full_name',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param User $model
     * @return Builder
     */
    public function query(User $model)
    {
        return $model->withTrashed()->get();
    }
    public static function lang()
    {
        return [
            'sProcessing'=>__('backend\datatabels.sProcessing'),
            'sInfo'=>__('backend\datatabels.sInfo'),
            'sSearch'=>__('backend\datatabels.sSearch'),
            'sZeroRecords'=>__('backend\datatabels.sZeroRecords'),
            'sLengthMenu'=>__('backend\datatabels.sLengthMenu'),
        ];
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->parameters($this->getBuilderParameters());
            ->parameters([
                'dom'=>"<'row'<'col-sm-6'l><'col-sm-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
                'lengthMenu'=>[[5,10,50,100,-1],[5,10,50,100,"All"]],
                'initComplete'=> "function () {
                            this.api().columns([1,2,3]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                    .on('keyup', function () {
                                        column.search($(this).val()).draw();
                                    });
                            });
                        }",
                "language"=>self::lang(),

            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['name'=>'DT_RowIndex','data'=>'DT_RowIndex','title'=>__('backend\users.id')],
            ['name'=>'full_name','data'=>'full_name','title'=>__('backend\users.full_name')],
            ['name'=>'email','data'=>'email','title'=>__('backend\users.email')],
            ['name'=>'created_at','data'=>'created_at','title'=>__('backend\users.created_at')],
            [
                'name'        => 'action',
                'data'        => 'action',
                'title'       => __('backend\users.action'),
                'exportable'  => false,
                'printable'   => false,
                'orderable'   => false,
                'searchable'  => false,

            ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
