<?php

namespace App\Http\Controllers\ResturantManager;

use DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PurchaseManager;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PurchaseManagerController extends Controller
{
    public function list(Request $req)
    {
        $list = PurchaseManager::orderBy("id", "DESC");

        if ($req->ajax()) {
            return Datatables::of($list)
                ->addColumn('name', function($row) {
                    return $row->name;
                })
                ->filterColumn('name', function ($query, $keyword) {
                    $keywords = trim($keyword);
                    $query->whereRaw("CONCAT(first_name, last_name) like ?", ["%{$keywords}%"]);
                })
                ->editColumn('visibility_status', function($row) {
                    $html = '';
                    if ($row->visibility_status) {
                        $html .= '
                            <div class="switchbox-outer">
                                <label class="switch">
                                    <input type="checkbox" data-url="'.route('resturant.manager.purchase.manager.status', $row->id).'" class="status" name="status" id="status_'.$row->id.'" checked>
                                    <span class="slider round"></span>
                                    <span class="title"></span>
                                </label>
                            </div>
                        ';
                    } else {
                        $html .= '
                            <div class="switchbox-outer">
                                <label class="switch">
                                    <input type="checkbox" data-url="'.route('resturant.manager.purchase.manager.status', $row->id).'" class="status" name="status" id="status_'.$row->id.'">
                                    <span class="slider round"></span>
                                    <span class="title"></span>
                                </label>
                            </div>
                        ';
                    }
                    return $html;
                })
                ->addColumn('action', function($row){
                    $html = '';
                    $html .= '

                    ';
                    return $html;
                })
                ->rawColumns(['visibility_status', 'action'])
                ->make(true);
        } else {
            return view('resturant_manager.purchase_manaager.list', get_defined_vars());
        }
    }

    public function add()
    {
        return view('resturant_manager.purchase_manaager.add', get_defined_vars());
    }

    public function edit($id = null)
    {
        return view('resturant_manager.purchase_manaager.edit', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        // dd($req);
        if (is_null($id)) {
            try {
                $resturant_manager = resturantManager();
                $password = Str::random(8);

                Mail::send('email.resturant_manager.purchase_manager_add', get_defined_vars(), function ($message) use($req) {
                    $message->to($req->email, $req->first_name.' '.$req->last_name);
                    $message->subject('Purchase Manager Login Credentials');
                });

                $purchase_manager = PurchaseManager::create([
                    'resturant_manager_id' => $resturant_manager->id,
                    'first_name' => $req->first_name,
                    'last_name' => $req->last_name,
                    'email' => $req->email,
                    'password' => Hash::make($password),
                    'mobile_no' => trim($req->mobile_no),
                ]);

                return redirect()->route('resturant.manager.purchase.manager.list')->with('success', 'Purchase Manager registerd successfully!');

            } catch (\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        } else {
            # code...
        }

    }

    public function delete($id = null)
    {
        PurchaseManager::find($id)->delete();

        return redirect()->back()->with('success', 'Purchase Manager successfully removed from the system.');
    }

    public function status($id = null)
    {
        $purchase_manager = PurchaseManager::find($id);

        if ($purchase_manager->visibility_status == 1) {
            $purchase_manager->visibility_status = 0;

            $msg = 'Purchase Manager access to dashboard temporarily disabled successfully!';
        } else {
            $purchase_manager->visibility_status = 1;

            $msg = 'Purchase Manager access to dashboard successfully restored!';
        }
        $purchase_manager->save();

        return response()->json([
            'status' => 200,
            'message' => $msg,
        ]);
    }
}
