<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;

use Api;
use Validator;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\CompanyDomains;
use App\Companies;
use Response;


class ApiCompanyDomainsController extends Controller
{

	/**
	 * This is all data from table companiey_domains, click Send for view all data
	 *
	 * @return json
	 */
	
	public function getList()
	{
		$company_domains=CompanyDomains::all();
		return Response::json($company_domains,200);
	}

	/**
	 * find companydomains by id number
	 *
	 * @param id | id of Companydomains | required
	 * @return json
	 */
	public function getFind(Request $request)
	{
		$company_domains=CompanyDomains::find($request->id);
		if(is_null($company_domains))
		{
			return Api::responseFailed('Data not found');
		}
	
		return Api::responseSuccess('Data Company Domains id: '.$company_domains->id, $company_domains);
	}


	/**
	 * add new companydomains
	 *
	 * @param companies_id | id of Companies | required
	 * @param domain | lorem ipsum | required
	 * @return json
	 */
	public function postAdd(Request $request)
	{
			$validate = Validator::make($request->all(), [
    		'companies_id'	=> 'required',
    		'domain'		=> 'required',
    	]);
		
		if ($validate->fails())
		{
			return Response::json($validate->errors()->all());
		}
	
		$company_domains = new CompanyDomains;
		$company_domains->companies_id = $request->input('companies_id');
		$company_domains->domain = $request->input('domain');	
		$company_domains->save();

		return Api::responseSuccess("Success insert with id : ".$company_domains->id,200);
	}

	/**
	 * update companydomains by id
	 *
	 * @param id | id of Companydomains | required
	 * @param companies_id | id of Companies | required
	 * @param domain | domain of Companydomains | required
	 * @return json
	 */
	public function putUpdate(Request $request)
	{
		$company_domains=CompanyDomains::find($request->id);
		
		if ( ! is_null($company_domains)) {
			if($request->has('companies_id')) {
				$company_domains->companies_id = $request->input('companies_id');
			}
			
			if($request->has('domain'))
			{
				$company_domains->domain = $request->input('domain');
			}

			$company_domains->save();
			return Api::responseSuccess("Success Update id: ".$company_domains->id,200);
		}
	
		return Api::responseFailed("Company Domains not found",404);
	}

	/**
	 * delete companydomains by id
	 *
	 * @param id | id of Companydomains | required
	 * @return json
	 */
	public function deleteDelete(Request $request)
	{
		
		$company_domains=CompanyDomains::find($request->id);
		if(is_null($company_domains))
		{
			return Response::json("id not found",404);
		}
	
		$success=$company_domains->delete();
	
		if(!$success)
		{
			return Api::responseFailed("error deleting",500);
		}
	
		return Api::responseSuccess("Success delete id: ".$company_domains->id,200);
	}
}
