<?php

namespace App\Http\Controllers;

use App\Shipment;
use Auth;
use Illuminate\Http\Request;
// use App\Http\Requests\CategoryRequest;

class ShipmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipments = Shipment::get();
        return view('backend.viewall.shipments')->withShipments($shipments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.add.shipment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shipment = new Shipment;

        $shipment->name = $request->input('name');
        $shipment->description = $request->input('description');
        $shipment->code = rand(100,999999999);
        $shipment->status = $request->input('status');

        $shipment->save();


        session()->push('msg', 'success');
        session()->push('msg', 'Data has been added successfully');

        return redirect('sitebackend/shipment/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function show(Shipment $shipment)
    {
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipment $shipment)
    {
        $shipments = Shipment::find($id);
        if(!$shipments){abort('404');}
        return view('backend.viewall.shipments')->withShipments($shipment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $shipment = Shipment::find($id);
        $shipment->name = $request->input('name');
        $shipment->description = $request->input('description');
        $shipment->status = $request->input('status');
        $shipment->save();
        session()->push('msg', 'success');
        session()->push('msg', 'Data has been updated successfully.');
        return redirect('/sitebackend/shipments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipment $shipment ,$id)
    {
        $shipment = Shipment::find($id);
        Shipment::destroy($id);

        session()->push('msg', 'alert');
        session()->push('msg', 'Data has been deleted successfully.');
         
        return redirect('/sitebackend/shipments');
    }
}
