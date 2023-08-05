<?php

namespace App\Services;

use App\Contracts\LanguageContract;
use App\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\File;
use JoeDixon\Translation\Drivers\Translation;

class LanguageService
{
    private $languageContract;

    private $translation;

    public function __construct(LanguageContract $languageContract, Translation $translation)
    {
        $this->languageContract = $languageContract;
        $this->translation = $translation;
    }

    public function getAll()
    {
        return $this->languageContract->all();
    }

    public function yajraDataTable()
    {
        if (request()->ajax()) {
            $languages = $this->getAll();

            return datatables()->of($languages)
                ->setRowId(function ($row) {
                    return $row->id;
                })
                ->addColumn('name', function ($row) {
                    return $row->name ?? '';
                })
                ->addColumn('locale', function ($row) {
                    return $row->locale ?? '';
                })
                ->addColumn('is_default', function ($row) {
                    if ($row->is_default) {
                        return "<div class='p-2 badge badge-success'>Yes</div>";
                    }

                    return "<div class='p-2 badge badge-warning'>No</div>";
                })
                ->addColumn('action', function ($row) {
                    $button = '<button type="button" data-id="'.$row->id.'" class="edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';

                    return $button;
                })
                ->rawColumns(['is_default', 'action'])
                ->make(true);
        }
    }

    public function storeLanguage($request)
    {
        try {
            $path = base_path('resources/lang/'.$request->locale);
            if (File::exists($path)) {
                throw new Exception('A file name with the locale "'.$request->locale.'" already exists.', 1);
            }

            if ($request->is_default) {
                $this->languageContract->setDefaultZeroToAll();
            }

            $data = $this->requestHandle($request);
            $this->languageContract->create($data);
            $this->translation->addLanguage($request->locale, $request->name);


            return Alert::successMessage('Data Saved Successfully');

        } catch (Exception $exception) {
            return Alert::errorMessage($exception->getMessage());
        }
    }

    public function updateLanguage($request, $language)
    {
        try {

            $path = base_path('resources/lang/'.$request->locale);
            if (File::exists($path) && ($language->locale !== $request->locale)) {
                throw new Exception('A file name with the locale "'.$request->locale.'" already exists.', 1);
            }

            $languageCount = $this->languageContract->defaultLanguagesCount();

            if ($request->is_default) {
                $this->languageContract->setDefaultZeroToAll();
            } else {
                $languageCount--;
                if ($languageCount < 0) {
                    throw new Exception('At least one language should be default');
                }
            }

            $this->langFileUpdate($request, $language);

            $data = $this->requestHandle($request);
            $this->languageContract->update($language->id, $data);

            return Alert::successMessage('Data Updated Successfully');

        } catch (Exception $exception) {
            return Alert::errorMessage($exception->getMessage());
        }
    }

    public function deleteLanguage($language)
    {
        try {
            $this->languageContract->delete($language->id);

            $this->langFileDelete($language);

            return Alert::successMessage('Data Saved Successfully');

        } catch (Exception $exception) {
            return Alert::errorMessage($exception->getMessage());
        }
    }

    protected function langFileDelete($language): void
    {
        $path = base_path('resources/lang/'.$language->locale);
        if (File::exists($path)) {
            File::deleteDirectory($path);
        }
    }

    protected function langFileUpdate($request, $language): void
    {
        if ($language->locale != $request->locale) {
            $oldDirectory = base_path('resources/lang/'.$language->locale);
            $newDirectory = base_path('resources/lang/'.$request->locale);
            File::copyDirectory($oldDirectory, $newDirectory);
            File::deleteDirectory($oldDirectory);
        }
    }

    private function requestHandle($request)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['locale'] = $request->locale;
        $data['is_default'] = $request->is_default ?? 0;

        return $data;
    }

    // protected static function success($message): array
    // {
    //     return [
    //         'alertMsg' => ['success' => $message],
    //         'statusCode' => 202,
    //     ];
    // }

    // protected static function errorMessage($message): array
    // {
    //     return [
    //         'alertMsg' => ['errorMsg' => $message],
    //         'statusCode' => 422,
    //     ];
    // }
}
