<?php

namespace App\Http\Controllers;

use App\Hardware;
use App\Locker;
use App\Member;
use App\Order;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class HardwareController extends Controller
{

    public function lock(Request $request)
    {
      try {
        error_log("LOCK!!");
        error_log($request->Hardware_id);
        error_log($request->Uid);
        $locker = Locker::where('locker_code', $request->Hardware_id)->first();
        $member = Member::where('card_id', $request->Uid)->first();

        if ($locker == null) { throw new Exception('Locker Id is invalid!'); };
        if ($locker->available == true) { throw new Exception('Locker is available!'); };
        if ($member == null) { throw new Exception('Card Id is invalid!'); };

        $order = Order::where('locker_id', $locker->id)->where('member_id', $member->id)->where('ended_at', null)->first();

        if ($order == null) { throw new Exception('Card Id does not match!'); };

        $locker->available = true;
        $locker->save();

        $order->ended_at = Carbon::now('Asia/Phnom_Penh');
        $order->save();
        
        return response()->json([
            "status" => true,
            "message" => 'Successfully locked!'
        ]);
      } catch (Exception $e) {
        return response()->json([
          "status" => false,
          "message" => $e->getMessage()
        ]);
      }
    }

    public function unlock(Request $request)
    {
      try {
        error_log("UNLOCK!!");
        error_log($request->Hardware_id);
        error_log($request->Uid);
        $locker = Locker::where('locker_code', $request->Hardware_id)->first();
        $member = Member::where('card_id', $request->Uid)->first();
        
        if ($member == null) { throw new Exception('Student Id has not been registered!'); };
        $order = Order::where('member_id', $member->id)->where('ended_at', null)->first();
        if ($locker == null) { $locker = Locker::create([ 'locker_code' => $request->Hardware_id, 'available' => true ]); };
        if ($locker->available == false) { throw new Exception('Locker is busy!'); };
        if ($order != null) { throw new Exception('Card Id in used!'); };

        $locker->available = false;
        $locker->save();

        Order::create([
          'member_id' => $member->id,
          'locker_id' => $locker->id,
          'started_at' => Carbon::now('Asia/Phnom_Penh'),
          'ended_at' => null,
        ]);
        
        return response()->json([
            "status" => true,
            "message" => 'Successfully unlocked!'
        ]);
      } catch (Exception $e) {
        return response()->json([
          "status" => false,
          "message" => $e->getMessage()
        ]);
      }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
      return Locker::create([
        'locker_code' => $data['locker_code'],
        'available' => true,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hardware  $hardware
     * @return \Illuminate\Http\Response
     */
    public function show(Hardware $hardware)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hardware  $hardware
     * @return \Illuminate\Http\Response
     */
    public function edit(Hardware $hardware)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hardware  $hardware
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hardware $hardware)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hardware  $hardware
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hardware $hardware)
    {
        //
    }
}
