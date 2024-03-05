<?php

namespace App\Exports;

use App\Models\Present;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPresent implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $allpresent = Present::orderBy('created_at', 'asc')
        ->get(['teacher_p', 'attend_p', 'class_p', 'meet_p', 'date_p', 'subject_p', 'topic_p', 'student_p','student_s_p', 'student_i_p', 'student_a_p', 'student_s_k_p', 'student_i_k_p', 'student_a_k_p', 'created_at']);

        $presentData = $allpresent->map(function ($item) {
            return [
                'Nama Guru' => $item->teacher_pms,
                'Tanggal' => $item->date_pms, // Ganti 'tanggal' dengan atribut yang sesuai
                'Waktu' => $item->time_pms, // Ganti 'attend_p' dengan atribut yang sesuai
                'Sifat Izin' => $item->purpose_pms,
                'Izin' => $item->subject_pms,
                'Detail Izin' => $item->desc_pms,
            ];
        });

        return collect([
            ['IZIN GURU'], // Baris kosong untuk pemisah
            ['===================================================='],
            ['Nama Guru', 'Tanggal', 'Waktu', 'Sifat Izin', 'Izin', 'Detail Izin'], // Header untuk data kehadiran
        ])->concat($presentData);
    }
}
