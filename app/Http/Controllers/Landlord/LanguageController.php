<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Http\Requests\Language\UpdateRequest;
use App\Http\Requests\Language\StoreRequest;
use App\Models\Landlord\Language;
use App\Services\LanguageService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use JoeDixon\Translation\Drivers\Translation;

class LanguageController extends Controller
{
    private $translation;
    private $languageService;
    public function __construct(Translation $translation, LanguageService $languageService)
    {
        $this->translation = $translation;
        $this->languageService = $languageService;
    }

    public function index()
    {
        $languages = $this->languageService->getAll();

        if (request()->ajax()) {
            return datatables()->of($languages)
                ->setRowId(function ($row)
                {
                    return $row->id;
                })
                ->addColumn('name',function ($row)
                {
                    return $row->name ?? "" ;
                })
                ->addColumn('locale',function ($row)
                {
                    return $row->locale ?? "" ;
                })
                ->addColumn('is_default',function ($row)
                {
                    if ($row->is_default) {
                        return "<div class='p-2 badge badge-success'>Yes</div>";
                    }
                    return "<div class='p-2 badge badge-warning'>No</div>";
                })
                ->addColumn('action', function ($row)
                {
                    $button = '<button type="button" data-id="' . $row->id . '" class="edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" data-id="' . $row->id . '" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';
                    return $button;
                })
                ->rawColumns(['is_default','action'])
                ->make(true);
        }
        return view('landlord.super-admin.pages.languages.index');
    }

    public function store(StoreRequest $request)
    {
        try {
            if($request->is_default)
                Language::where('is_default',1)->update(['is_default'=> 0]);

            Language::create([
                'name' =>  $request->name,
                'locale' =>  $request->locale,
                'is_default' =>  $request->is_default ?? 0,
            ]);
            $this->translation->addLanguage($request->locale, $request->name);

            return response()->json(['success'=>'Data Saved Successfully']);
        } catch (Exception $exception) {
            return response()->json(['errorMsg' => $exception->getMessage()], 422);
        }
    }

    public function edit(Language $language)
    {
        return response()->json($language);
    }

    public function update(UpdateRequest $request, Language $language)
    {
        try {
            $languageCount = Language::where('is_default',1)->count();
            if($request->is_default)
                Language::where('is_default',1)->update(['is_default'=> 0]);
            else {
                $languageCount--;
                if($languageCount < 0)
                    throw new Exception("At least one language should be default");
            }
            $language = Language::find($language->id);
            if ($language->locale != $request->locale) {
                $oldDirectory = base_path('resources/lang/'.$language->locale);
                $newDirectory = base_path('resources/lang/'.$request->locale);
                File::copyDirectory($oldDirectory,$newDirectory);
                File::deleteDirectory($oldDirectory);
            }

            $language->name = $request->name;
            $language->locale = $request->locale;
            $language->is_default = $request->is_default ?? 0; //This process work
            $language->update();

            // $language->update([
            //     'name' =>  $request->name,
            //     'locale' =>  $request->locale,
            //     'is_default' => $request->is_default ?? 0, //This process not work
            // ]);

            return response()->json(['success'=>'Data Updated Successfully']);
        } catch (Exception $exception) {
            return response()->json(['errorMsg' => $exception->getMessage()], 422);
        }
    }

    public function destroy(Language $language)
    {
        try {
            $language->delete();
            $oldDirectory = base_path('resources/lang/'.$language->locale);
            File::deleteDirectory($oldDirectory);
            return response()->json(['success'=>'Data Deleted Successfully']);
        } catch (Exception $exception) {
            return response()->json(['errorMsg' => $exception->getMessage()], 422);
        }
    }
}
