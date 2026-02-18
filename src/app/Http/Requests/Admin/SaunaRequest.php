<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SaunaRequest extends FormRequest
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
            'name'        => 'required|string|max:100',
            'postcode'    => 'required|digits:7',         // 7桁の数字
            'prefecture'  => 'required|string',
            'city'        => 'required|string',
            'address'     => 'required|string',
            'sauna_temp'  => 'nullable|integer|min:0|max:150',
            'water_temp'  => 'nullable|integer|min:0|max:50',
            'has_loyly' => 'required|in:0,1',
            'description' => 'nullable|string|max:1000',
        ];
    }

    public function attributes()
    {
        return [
            'name'        => '施設名',
            'postcode'    => '郵便番号',
            'prefecture'  => '都道府県',
            'city'        => '市区町村',
            'address'     => '番地以降',
            'sauna_temp'  => 'サウナ温度',
            'water_temp'  => '水風呂温度',
            'has_loyly'   => 'ロウリュの有無',
            'description' => '施設説明',
        ];
    }
}
