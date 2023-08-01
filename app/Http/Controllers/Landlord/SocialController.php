<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Landlord\Social;
use Exception;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::all();

        if (request()->ajax()) {
            return datatables()->of($socials)
                ->setRowId(function ($row)
                {
                    return $row->id;
                })
                ->addColumn('icon',function ($row)
                {
                    return $row->icon ?? "" ;
                })
                ->addColumn('name',function ($row)
                {
                    return $row->name ?? "" ;
                })
                ->addColumn('action', function ($row)
                {
                    $button = '<button type="button" data-id="' . $row->id . '" class="edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" data-id="' . $row->id . '" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('landlord.super-admin.pages.socials.index');
    }

    public function store(Request $request)
    {
        try {
            Social::create([
                'name' =>  $request->name,
                'icon' =>  $request->icon,
                'link' =>  $request->link,
                'order' => 1,
            ]);

            return response()->json(['success'=>'Data Saved Successfully']);
        } catch (Exception $exception) {
            return response()->json(['errorMsg' => $exception->getMessage()], 422);
        }
    }
}
