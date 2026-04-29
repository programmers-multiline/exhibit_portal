<?php

namespace App\Imports;

use App\Models\Participants; // ✅ IMPORTANT
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class ParticipantsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        //
         $this->rowsCount = $rows->count() - 1; // minus header

        foreach ($rows->skip(1) as $row) {

            Participants::updateOrCreate(
                ['participant_email' => $row[6]], //Skip duplicate email
                [
                    'exhibit_name'         => 'WorldBex' ?? null,
                    'entry_by'             => $row[1] ?? null,
                    'agent_company'        => $row[2] ?? null,
                    'sales_manager'        => $row[3] ?? null,
                    'day_num'              => $row[4] ?? null,
                    'participant_name'     => $row[5] ?? null,
                    'participant_email'    => $row[6] ?? null,
                    'participant_company'  => $row[7] ?? null,
                    'participant_position' => $row[8] ?? null,
                    'participant_contact'  => $row[9] ?? null,
                    'participant_source'   => $row[10] ?? null,
                    'participant_address'  => $row[11] ?? null,
                    'participant_remarks'  => $row[12] ?? null,
                ]
            );
        }
    }
}
