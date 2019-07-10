<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Audits;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audits = Audits::with('user')->OrderBy('id','DESC')->paginate(10);
        return view('audits.index', compact('audits'));
    }
}
