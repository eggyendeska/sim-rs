<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class StoreObat extends FormRequest
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
		switch($this->method())
		{
			case 'GET':
			case 'DELETE':
			{
				return [];
			}
			case 'POST':
			{
				return [
					'nama' 			=> 'required|string|max:255',
					'kode' 			=> 'required|string|max:255|unique:obats',
					'harga'			=> 'required|integer',
					'harga'			=> 'required|string',
				];
				
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					'nama' 			=> 'required|string|max:255',
					'kode' 			=> 'required|string|max:255|unique:obats,id,'. $this->id,
					'harga'			=> 'required|integer',
					'harga'			=> 'required|string',
				];
				
			}
			default:break;
		}
    }
}
