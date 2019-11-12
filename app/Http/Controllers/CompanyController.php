<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    protected $per_page = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Company::paginate($this->per_page);
        return view('company.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $this->storeOrUpdate($request);
        return redirect()->route('company.index')->with('alert_success', 'Company has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $this->storeOrUpdate($request, $company);
        return redirect()->route('company.index')->with('alert_success', 'Company has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index')->with('alert_success', 'Company has been deleted.');
    }

    protected function storeOrUpdate($request, $company = null) {
        if($request->logo) {
            $file_info = pathinfo($request->logo->getClientOriginalName());
            $filename = $file_info['filename'].'-'.rand(11111,99999).'.'.$file_info['extension'];
            $request->file('logo')->storeAs('public/logos', $filename);
        }
        
        if(!$company) {
            $company = new Company;
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $request->logo ? $filename : $company->logo;
        $company->website = $request->website;
        $company->save();
    }
}
