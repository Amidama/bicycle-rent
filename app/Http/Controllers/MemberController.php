<?php

namespace App\Http\Controllers;

use App\Member;
use Exception;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
      $members = Member::all();
      return view('member.index', compact('members'));
    }

    public function create() {
      return view('member.create');
    }

    public function edit($id) {
      $member = Member::find($id);
      return view('member.edit', compact('member'));
    }
    
    public function update(Request $request) {
      $member = Member::find($request->id);
      $member->card_id = strtoupper($request->card_id);
      $member->student_id = $request->student_id;
      $member->first_name = $request->first_name;
      $member->last_name = $request->last_name;
      $member->phone_number = $request->phone_number;
      $member->save();
      return redirect(route('member'));
    }

    public function store(Request $request)
    {
      $member = Member::where('card_id', strtoupper($request->card_id))->first();
      if($member == null) {
        Member::create([
          'card_id' => strtoupper($request->card_id),
          'student_id' => $request->student_id,
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
          'phone_number' => $request->phone_number,
        ]);
      } else {
        $member->student_id = $request->student_id;
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->phone_number = $request->phone_number;
        $member->save();
      }
      
      return redirect(route('member'));
    }

    public function delete(Request $request)
    {
        Member::where('id', $request->id)->delete();
        return redirect(route('member'));
    }
}
