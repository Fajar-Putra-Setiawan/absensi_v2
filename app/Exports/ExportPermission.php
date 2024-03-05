<?php

namespace App\Exports;

use App\Models\Permission;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPermission implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $allPermission = Permission::all();
        $allpms = $allPermission->map(function ($item) {
            return [
                'Nama Guru' => $item->teacher_p,
                'Tanggal' => $item->date_p, // Ganti 'tanggal' dengan atribut yang sesuai
                'Kehadiran' => $item->attend_p, // Ganti 'attend_p' dengan atribut yang sesuai
                'Kelas' => $item->class_p,
                'Pertemuan' => $item->meet_p,
                'Mapel' => $item->subject_p,
                'Topik Bahasan' => $item->topic_p,
                'Jumlah Murid' => $item->student_p,
                'Total Sakit' => $item->student_s_p,
                'Total Izin' => $item->student_i_p,
                'Total Alfa' => $item->student_a_p,
                'Murid Sakit' => $item->student_s_k_p,
                'Murid Izin' => $item->student_i_k_p,
                'Murid Alfa' => $item->student_a_k_p,
                'Waktu Presensi' => $item->created_at
            ];
        });
    }
}
