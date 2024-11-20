<?php

namespace App\Http\Controllers;

use App\Models\Member_refun;
use Illuminate\Http\Request;

class MemberController extends Controller
{
       // Create Index
       public function index() {
        $data['member_refuns'] = Member_refun::orderBy('id', 'asc')->paginate(7);
        return view('member_refuns.index', $data);
    }

        // Create resource
        public function create() {
            return view('member_refuns.create');
        }
    
// Store resource
    public function store(Request $request) {
        $request->validate([
            'phone_no' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'level' => 'required|integer',
            'current_points' => 'required|integer'
        ]);

        // บันทึกข้อมูล
        $member_refuns = new Member_refun();
        $member_refuns->phone_no = $request->phone_no;
        $member_refuns->name = $request->name;
        $member_refuns->email = $request->email;
        $member_refuns->level = $request->level;
        $member_refuns->current_points = $request->current_points;
        $member_refuns->save();
        
        return redirect()->route('member_refuns.index')
            ->with('success', 'Member has been added successfully.');
    }

    public function edit($id)
    {
        $member_refuns = Member_Refun::findOrFail($id);
        return view('member_refuns.edit', compact('member_refuns'));
    }
    

    public function update(Request $request, $id) {
        $request->validate([
            'phone_no' => 'required',
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'current_points' => 'required'
        ]);

        $member_refuns = Member_refun::find($id);
        $member_refuns->phone_no = $request->phone_no;
        $member_refuns->name = $request->name;
        $member_refuns->email = $request->email;
        $member_refuns->level = $request->level;
        $member_refuns->current_points = $request->current_points;
        $member_refuns->save();
        
        return redirect()->route('member_refuns.index')
            ->with('success', 'Member has been update successfully.');
    }

    public function destroy(Member_refun $member_refun) {
        $member_refun->delete();
        return redirect()->route('member_refuns.index')->with('success', 'Member has been deleted successfully.');
    }
}
