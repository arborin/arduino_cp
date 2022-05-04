<?php

namespace App\Exports;

use App\Models\TruckRegistration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class TruckRegistrationExport implements FromCollection, WithHeadings
{

    protected $date_from;
    protected $data_to;

    function __construct($date_from, $data_to) {
            $this->date_from = date($date_from);
            $this->date_to = date($data_to);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {



        return TruckRegistration::select("id", "truck_number", "enter_date", "mobile", "sms_status", "company_name", "company_id", "status","payment","comment")
                                ->whereDate('enter_date', '>=', $this->date_from)
                                ->whereDate('enter_date', '<=', $this->date_to)
                                ->get();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["id", "truck_number", "enter_date", "mobile", "sms_status", "company_name", "company_id", "status","payment","comment"];
    }
}
