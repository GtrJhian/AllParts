<?php

namespace App\Exports;

use App\AccountingPost;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AccountingExport implements FromQuery, WithHeadings, ShouldAutoSize
{
    use Exportable;

    private $month;

    public function __construct(String $month){
        $this->month = $month;
    }

    public function query()
    {   
        if($this->month=="All"){
            return AccountingPost::accountingQueryAll();
        }else{
            return AccountingPost::accountingQuery($this->month);
        }
    }

    public function headings(): array
    {
        return [
            'Invoice No',
            'Date',
            'Term of Payment',
        ];
    }
}
