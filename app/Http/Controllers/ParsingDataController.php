<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParsingDataController extends Controller
{
    public function parseData($nama_lengkap, $email, $jenis_kelamin) {
        // Tampilkan data yang diparse
        return view('parse-data', [
            'title' => 'Parse Data',
            'nama_lengkap' => $nama_lengkap,
            'email' => $email,
            'jenis_kelamin' => $jenis_kelamin,
        ]);
    }
}
