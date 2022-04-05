<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function launch_site()
    {
        $payment_plans = Plan::where('service', 'launch-site')->get();
        return view('launch_site.index', compact('payment_plans'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentPlans  $paymentPlans
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $paymentPlans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentPlans  $paymentPlans
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $paymentPlans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentPlans  $paymentPlans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $paymentPlans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentPlans  $paymentPlans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $paymentPlans)
    {
        //
    }
}
