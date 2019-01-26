<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\TarGzValidationRule;

class FileTrailUploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type_of_upload' => 'required',
            'csv_file_path' => 'required|mimes:csv,txt',
            'tar_file_path' => 'required|mimes:zip,mimetypes:application/zip',
        ];
    }
}
