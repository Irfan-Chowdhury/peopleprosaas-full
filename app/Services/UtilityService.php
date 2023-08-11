<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class UtilityService
{
    public function timeZoneData() : array
    {
        $zones_array = array();
        $timestamp = time();
        foreach (timezone_identifiers_list() as $key => $zone)
        {
            date_default_timezone_set($zone);
            $zones_array[$key]['zone'] = $zone;
            $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
        }
        return $zones_array;
    }

    public function dateFormat()
    {
        return [
            'd-m-Y' => 'dd-mm-yyyy(23-05-2020)',
            'Y-m-d' => 'yyyy-mm-dd(2020-05-23)',
            'm/d/Y' => 'mm/dd/yyyy(05/23/2020)',
            'Y/m/d' => 'yyyy/mm/dd(2020/05/23)',
            'Y-M-d' => 'yyyy-MM-dd(2020-May-23)',
            'M-d-Y' => 'MM-dd-yyyy(May-23-2020)',
            'd-M-Y' => 'dd-MM-yyyy(23-May-2020)',
        ];
    }

    public function setEnv($key, $value) : void
    {
        $path = app()->environmentFilePath();
        $searchArray = array($key.'='.env($key));
        $replaceArray= array($key.'='.$value);

        file_put_contents($path, str_replace($searchArray, $replaceArray, file_get_contents($path)));
    }


    public function imageFileHandle($imageFile, $expectedDirectory, $isPrevImgFileDelete=true)
    {
        $imageName = null;

        if ($imageFile) {
            $image = $imageFile;
            $imagesDirectory = public_path($expectedDirectory);

            if ($isPrevImgFileDelete && File::isDirectory($imagesDirectory)) {
                File::cleanDirectory($imagesDirectory);
            }

            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = date("Ymdhis") . 1;
            $imageName = $imageName . '.' . $ext;

            $image->move($imagesDirectory, $imageName);
        }
        return $imageName;
    }

    public function fileDelete($filePath, $fileName)
    {
        if ($fileName && !config('database.connections.peopleprosaas_landlord') && File::exists(public_path().$filePath.$fileName))
           File::delete(public_path().$filePath.$fileName);
        else if($fileName && File::exists($filePath.$fileName))
           File::delete($filePath.$fileName);


        // if($fileName && !config('database.connections.peopleprosaas_landlord') && file_exists('public/'.$filePath.$fileName))
        //     unlink('public/'.$filePath.$fileName);
        // elseif($fileName && file_exists($filePath.$fileName))
        //     unlink($filePath.$fileName);

    }
}
