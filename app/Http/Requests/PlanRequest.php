<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'plan_title' => 'required|string',

            'plan_price' => 'required|string',
            'plan_earn_daily' => 'required|string',

            'Benefit_header' => 'required|string',
            'play_video' => 'required|string',

            'answer_quiz' => 'required|string',
            'play_music' => 'required|string',

            'countDown_engagement' => 'required|string',
            'countDown_engagement_warning' => 'required|string',
        ];
    }


}
