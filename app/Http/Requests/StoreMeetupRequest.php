<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\MeetupType;

class StoreMeetupRequest extends FormRequest
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
            'gig_id' => 'required|int',
            'venue_id' => 'required|int',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'type' => [new Enum(MeetupType::class)],
        ];
    }
}
