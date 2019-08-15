<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Franchise;

class FranchiseController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param  \App\Franchise  $model
     * @return \Illuminate\View\View
     */
    public function index(Franchise $model)
    {
        return view('admin.franchises.index', ['franchises' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.franchises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Franchise  $model
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'franchise_name' => 'required|unique:franchises',
            'address' => 'required'
        ]);

        $franchise = new Franchise([
            'franchise_name' => $request->post('franchise_name'),
            'address' => $request->post('address')
        ]);
        
        $franchise->save();

        return redirect()->route('franchises.index')->withStatus(__('Franchise successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $franchise = Franchise::findOrFail($id);

        return view('admin.franchises.edit', compact('franchise','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'franchise_name' => 'required',
            'address' => 'required'
        ]);

        $franchise = Franchise::findOrFail($id);
        $franchise->franchise_name = $request->get('franchise_name');
        $franchise->address = $request->get('address');

        $franchise->save();

        return redirect()->route('franchises.index')->withStatus(__('Franchise successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->delete();
        
        return redirect()->route('franchises.index')->withStatus(__('Franchise successfully deleted.'));
    }
}
