<?php

namespace App\Services;

use App\Contracts\SocialContract;
use App\Facades\Alert;
use Exception;

class SocialService
{
    private $socialContract;

    public function __construct(SocialContract $socialContract)
    {
        $this->socialContract = $socialContract;
    }

    public function getAll()
    {
        return $this->socialContract->getOrderByPosition();
    }

    // public function yajraDataTable()
    // {
    //     if (request()->ajax()) {
    //         $features = $this->getAll();

    //         return datatables()->of($features)
    //             ->setRowId(function ($row) {
    //                 return $row->id;
    //             })
    //             ->addColumn('icon', function ($row) {
    //                 return '<i class="'.$row->icon.' text-primary"></i>&nbsp;'.$row->icon;
    //             })
    //             ->addColumn('name', function ($row) {
    //                 return $row->name ?? '';
    //             })
    //             ->addColumn('action', function ($row) {
    //                 $button = '<button type="button" data-id="'.$row->id.'" class="edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i></button>';
    //                 $button .= '&nbsp;&nbsp;';
    //                 $button .= '<button type="button" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';

    //                 return $button;
    //             })
    //             ->rawColumns(['icon', 'action'])
    //             ->make(true);
    //     }
    // }

    // public function save($request)
    // {
    //     try {
    //         $maxPosition = $this->socialContract->getMaxPosition() + 1;

    //         $data = $this->requestHandle($request, $maxPosition);
    //         $this->socialContract->create($data);

    //         return Alert::successMessage('Data Saved Successfully');

    //     } catch (Exception $exception) {
    //         return Alert::errorMessage($exception->getMessage());
    //     }
    // }

    // public function showObject($id)
    // {
    //     return $this->socialContract->getById($id);
    // }

    // public function updateInfo($request, $id)
    // {
    //     try {
    //         $data = $this->requestHandle($request);
    //         $this->socialContract->update($id, $data);

    //         return Alert::successMessage('Data Updated Successfully');

    //     } catch (Exception $exception) {
    //         return Alert::errorMessage($exception->getMessage());
    //     }
    // }

    // public function remove($id)
    // {
    //     try {
    //         $this->socialContract->delete($id);

    //         return Alert::successMessage('Data Saved Successfully');

    //     } catch (Exception $exception) {
    //         return Alert::errorMessage($exception->getMessage());
    //     }
    // }

    // public function sortingDataTable($request)
    // {
    //     try {

    //         $socials = $this->getAll();
    //         foreach ($socials as $social) {
    //             $social->timestamps = false; // To disable update_at field updation
    //             foreach ($request->order as $order) {
    //                 if ($order['id'] == $social->id) {
    //                     $data['position'] = $order['position'];
    //                     $this->socialContract->update($social->id, $data);
    //                 }
    //             }
    //         }

    //         return Alert::successMessage('Order changed successfully');

    //     } catch (Exception $exception) {
    //         return Alert::errorMessage($exception->getMessage());
    //     }
    // }

    // private function requestHandle($request, $maxPosition = null)
    // {
    //     $data = [];
    //     $data['name'] = $request->name;
    //     $data['icon'] = $request->icon;
    //     if ($maxPosition) {
    //         $data['position'] = $maxPosition;
    //     }

    //     return $data;
    // }
}
