<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
// use App\Models\Event;
use Hamcrest\Core\HasToString;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;




class CalendarController extends Controller
{
    public function schedule($tanggal)
    {
        $calendars = Calendar::all()->where("date", $tanggal);
        // Mengembalikan dalam format JSON
        return response()->json(
            $calendars,
            200
        );
    }



    public function getEventDetails(Request $request)
    {
        $date = $request->input('date');
        $calendars = Calendar::whereDate('event_date', $date)->first();

        if ($calendars) {
            return response()->json([
                'calendars$calendars' => $calendars,
                'message' => 'Ada acara pada tanggal ini.'
            ]);
        } else {
            return response()->json([
                'message' => 'Tanggal ini kosong.'
            ]);
        }
    }

    public function getAllCalenders()
    {
        // Log untuk memeriksa apakah fungsi dipanggil
        Log::info('getAllCalenders function called');

        // Ambil semua data kalender
        $calendars = Calendar::all();

        // Log untuk memeriksa jumlah data yang diambil
        Log::info('Number of calendars retrieved: ' . $calendars->count());

        // Log untuk memeriksa isi data kalender
        Log::info('Calendars data: ' . $calendars->toJson());

        // Kembalikan respons JSON dengan data kalender
        return response()->json($calendars, 200);
    }
    public function index(Request $request)
    {
        // Validasi request
        $request->validate([
            'date' => 'nullable|date',
        ]);

        // Ambil semua acara dari database
        $events = Calendar::all()->map(function ($event) {
            return [
                'title' => $event->title,
                'start' => $event->date, // Gunakan kolom `date` sesuai tabel Anda
                'description' => $event->description,
                'color' => '#3b82f6', // Warna default
            ];
        });

        // Ambil tanggal yang dipilih dari request
        $selectedDate = $request->input('date');

        // Cari acara pada tanggal yang dipilih (menggunakan koleksi untuk efisiensi)
        $eventOnSelectedDate = $events->firstWhere('start', $selectedDate);

        return view('pages.user.layanan', compact('events', 'selectedDate', 'eventOnSelectedDate'));
    }


    public function layanan()
    {
        $events = Calendar::all()->map(function ($event) {
            return [
                'title' => $event->title,
                'start' => $event->date,
                'description' => $event->description,
            ];
        });

        return view('pages.user.layanan', compact('events'));
    }



    public function getCalendarEvents()
    {
        $events = DB::table('calendar')->select('title', 'description', 'start_date as start', 'end_date as end', 'color')->get();
        return response()->json($events);
    }

    // public function getCalendarEvents()
    // {
    //     $events = [
    //         ['title' => 'Acara 1', 'start' => '2025-01-15', 'description' => 'Detail acara 1'],
    //         ['title' => 'Acara 2', 'start' => '2025-01-21', 'description' => 'Detail acara 2'],
    //     ];
    //     return response()->json($events);
    // }

}