<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return '
                    <a href="https://wa.me/' . $row->phone_number . '" class="btn icon btn-sm btn-success">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                      <a href="' . route('mahasiswa.show', $row->id) . '" class="btn icon btn-sm btn-warning"
                        ><i class="fas fa-eye"></i
                      ></a>
                      <a href="' . route('mahasiswa.edit', $row->id) . '" class="btn icon btn-sm btn-primary"
                        ><i class="fas fa-pencil-alt"></i
                      ></a>
                      <div class="btn icon btn-sm btn-danger" id="delete-button" data-id="' . $row->id . '"
                        ><i class="fas fa-trash"></i
                      ></div>
                    ';
            })
            ->addIndexColumn()
            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('d-m-Y H:i:s');
            })
            ->editColumn('updated_at', function ($row) {
                return $row->updated_at->format('d-m-Y H:i:s');
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->responsive(true)
            ->autoWidth(false)
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
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

            Column::make('DT_RowIndex')->title('No')->searchable(false),
            Column::make('name')->title('Nama'),
            Column::make('nim'),
            Column::make('email'),
            Column::make('address')->title('Alamat'),
            Column::make('phone_number')->title('No. Telepon'),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
            ,
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
