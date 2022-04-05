<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $reports = Report::with(['reporter', 'video'])->get();
        return view('admin_panel.reports', compact(['reports']));
    }
}