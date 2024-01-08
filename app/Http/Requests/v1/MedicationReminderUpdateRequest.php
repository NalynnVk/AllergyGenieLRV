<?php

namespace App\Http\Requests\v1;

use App\Enums\DosageEnum;
use App\Enums\ReminderRepetitionEnum;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

class MedicationReminderUpdateRequest extends FormRequest
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
            'medication_id' => 'required|numeric', //TODO
            'dosage' => ['required', new EnumRule(DosageEnum::class)],
            'time_reminder' => 'required|string',
            'repititon' => ['required', new EnumRule(ReminderRepetitionEnum::class)],
        ];
    }
}
