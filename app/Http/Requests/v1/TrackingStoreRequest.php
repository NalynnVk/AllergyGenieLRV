<?php

namespace App\Http\Requests\v1;

use App\Enums\SymptomSeverityEnum;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

class TrackingStoreRequest extends FormRequest
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
            //BASED ON v1/TrackingResource and tukaq data type according to migration table database
            // // 'user_id'=> 'required|numeric|exists:users,id',
            // 'name' => 'required|string',
            // 'location' => 'required|string',
            // 'planted_at' => 'required|string',
            // 'notes' => 'required|string',
            // 'stage' => ['required', new EnumRule(ScheduleStageEnum::class)],
            // 'seed' => 'required|numeric',
            // 'photo_path' => ['file|mimes:png,jpg,jpeg', 'max:1000', 'nullable'],

            'symptom.id' => 'required|numeric',
            'allergen.id' => 'required|numeric',
            'severity' => ['required', new EnumRule(SymptomSeverityEnum::class)],
            'notes' => 'required|string',
        ];
    }
}
