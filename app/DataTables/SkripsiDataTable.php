<?php

namespace App\DataTables;

use App\Models\Skripsi;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SkripsiDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'skripsi.action')
            ->addIndexColumn()
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Skripsi $model): QueryBuilder
    {
        $skripsi = $model->newQuery();
        return $skripsi->with(['user'])->where('status', 'PENDING');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('skripsi-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->responsive(true)
            ->autoWidth(false)
            ->buttons([
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
            Column::make('user.name')->title('Nama Mahasiswa'),
            Column::make('user.nim')->title('NIM'),
            Column::make('judul_1')->title('Judul TA 1'),
            Column::make('deskripsi_1')->title('Deskripsi TA 1'),
            Column::make('output_1')->title('Output TA 1'),
            Column::make('judul_2')->title('Judul TA 2'),
            Column::make('deskripsi_2')->title('Deskripsi TA 2'),
            Column::make('output_2')->title('Output TA 2'),
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
        return 'Skripsi_' . date('YmdHis');
    }
}
