<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Http\Requests;
use Auth;
class StatusesController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
  public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);

        Auth::user()->statuses()->create([
            'content' => $request['content']
        ]);
        return redirect()->back();
    }
   public function destroy(Status $status)
    {
       error_log(print_r($status,true),3,"/tmp/xinjiahui.log");
        $this->authorize('destroy', $status);
        $status->delete();
        session()->flash('success', '微博已被成功删除！');
        return redirect()->back();
    }
}
