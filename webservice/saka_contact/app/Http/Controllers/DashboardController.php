<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dashboard;

class DashboardController extends Controller
{
    /**
	 * Handle process request index
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		return view('dashboard.index');
	}
}
