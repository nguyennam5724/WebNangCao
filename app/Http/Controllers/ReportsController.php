<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\book_issue;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function date_wise()
    {
        return view('report.dateWise', ['books' => '']);
    }

    public function generate_date_wise_report(Request $request)
    {
        $request->validate(['date' => "required|date"]);

        return view('report.dateWise', [
            'books' => book_issue::whereDate('issue_date', $request->date)->latest()->get(),
            'date' => $request->date
        ]);
    }

    public function month_wise()
    {
        return view('report.monthWise', ['books' => '']);
    }

    public function generate_month_wise_report(Request $request)
    {
        $request->validate(['month' => "required|date"]);

        $month = Carbon::parse($request->month)->format('Y-m');

        return view('report.monthWise', [
            'books' => book_issue::where('issue_date', 'LIKE', $month . '%')->latest()->get(),
            'month' => $month
        ]);
    }

    public function not_returned()
    {
        return view('report.notReturned', [
            'books' => book_issue::where('issue_status', 'N')
                ->orWhereNull('return_day')
                ->latest()
                ->get()
        ]);
    }
}
