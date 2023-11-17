<?php

namespace App\Http\Requests\v1;

use App\Enums\SymptomSeverityEnum;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

class TrackingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'symptom.id' => 'required|numeric',
            'allergen.id' => 'required|numeric',
            'severity' => ['required', new EnumRule(SymptomSeverityEnum::class)],
            'notes' => 'required|string',
        ];
    }
}
