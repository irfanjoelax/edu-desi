<?php

namespace Database\Seeders;

use App\Models\Peneliti;
use Illuminate\Database\Seeder;

class PenelitiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Peneliti::create([
            'nim'         => '17802241006',
            'nama'        => 'Desi Wulansari',
            'dospem'      => 'Muslikhah Dwihartanti, S.I.P., M.Pd.',
            'ahli_materi' => 'Nurnawati, S.Pd.',
            'ahli_media'  => 'Dr. Sutirman, M.Pd',
        ]);
    }
}
