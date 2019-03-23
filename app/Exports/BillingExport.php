<?php

namespace App\Exports;

use App\BillingPost;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class BillingExport implements FromQuery
{
    use Exportable;

    public function query()
    {
        return BillingPost::billingQuery();
    }
}
