<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Http\Requests;
use App\Companies;
use Response;

class CompaniesController extends Controller
{
	/**
	 * Handle process request index
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$companies = Companies::get();
		return view('company.index')->with(['data'=>$companies]);
	}

	/**
	 * Handle process request getAdd
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function getAdd(Request $request)
	{
		return view('company.company_add');
	}

	/**
	 * Handle process request postAdd
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function postAdd(Request $request)
	{
		$validate = Validator::make($request->all(), [
			'id' => 'required|numeric|unique:companies,id',
			'name' => 'required',
			'address' => 'required',
			'token' => 'required',
		]);

		if ($validate->fails())
		{
			//return Response::json($validate->errors()->all());
			return redirect('dashboard/companies/add')->withErrors($validate)->withInput($request->all());

		}

		$companies = new Companies;
		$companies->id = $request->id;
		$companies->name = $request->name;
		$companies->address = $request->address;
		$companies->token = $request->token;
		$companies->save();

		// return Response::json("success insert with id : ".$companies->id);
		return redirect('dashboard/companies/');
	}

	/**
	 * Handle process request getUpdate
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function getUpdate(Request $request, $id)
	{
		if (is_null($companies = Companies::find($id))) {
			die('Companies does not exists');
		}

		$request->merge($companies->toArray());
		$request->flash();
		return view('company.company_add');
	}

	/**
	 * Handle process request postUpdate
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function postUpdate(Request $request, $id)
	{
		if (is_null($companies = Companies::find($id))) {
			die('Companies does not exists');
		}

		$validate = Validator::make($request->all(), [
			'name' => 'required',
			'address' => 'required',
			'token' => 'required',
		]);

		if ($validate->fails())
		{
			//return Response::json($validate->errors()->all());
			return redirect('dashboard/companies/update/'.$id)->withErrors($validate)->withInput($request->all());
		}

		$companies->name = $request->name;
		$companies->address = $request->address;
		$companies->token = $request->token;
		$companies->save();

		//return Response::json("success update data with id : ".$companies->id);
		return redirect('dashboard/companies/');
	}

	/**
	 * Handle process request delete
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function delete(Request $request, $id)
	{
		if (is_null($companies = Companies::find($id))) {
			die('Companies does not exists');
		}

		$companies->delete();
	}
}
