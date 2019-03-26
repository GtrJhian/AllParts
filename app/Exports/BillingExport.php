<?php

namespace App\Exports;

use App\BillingPost;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BillingExport implements FromQuery, WithHeadings, ShouldAutoSize
{
    use Exportable;

    private $month, $archived;

    public function __construct(String $month, String $archived){
        $this->month = $month;
        $this->archived = $archived;
    }

    public function query()
    {   
        if($this->month=="All"){
            return BillingPost::billingQueryAll($this->archived);
        }else{
            return BillingPost::billingQuery($this->month, $this->archived);
        }
    }

    public function headings(): array
    {
        return [
            'Invoice No',
            'FirstName',
            'LastName',
            'Company',
            'Address',
            'Date',
            'Debit',
            'Credit',
            'Term of Payment',
            'Vat Sales',
        ];
    }
}
