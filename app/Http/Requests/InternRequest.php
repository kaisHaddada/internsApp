<?php

namespace App\Http\Requests;

use App\Models\Intern;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InternRequest extends FormRequest
{
    /**
     * @var mixed
     */

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
    public function rules(Intern $intern)
    {
        if ($this->isMethod('PUT')) {
            return  [
                'first_name' => 'required|string|max:20',
                'last_name' => 'required|string|max:20',
              'email' =>[ 'required|string|unique:interns,email', Rule::unique('interns')],
                'university' => 'required|string|max:20',
                'level' => 'required|integer',
            ];
        } else {
            // create
            return  [
                'first_name' => 'required|string|max:20',
                'last_name' => 'required|string|max:20',
                'email' => 'required|string|unique:interns,email',
                'university' => 'required|string|max:20',
                'level' => 'required|integer',
            ];
        }

    }
}
