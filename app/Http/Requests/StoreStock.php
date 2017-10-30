<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStock extends FormRequest
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
					'jumlah_awal'			=> 'required|integer',
					'tanggal_kadaluarsa'	=> 'required|date',
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					'jumlah_awal'			=> 'required|integer',
					'jumlah_sekarang'		=> 'required|integer',
					'tanggal_kadaluarsa'	=> 'required|date',
				];
			}
			default:break;
		}
    }
}
