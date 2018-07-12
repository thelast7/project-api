<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
			'name_customer'      => 'required|min:3',
			'username'           => 'required|min:8',
			'gender'             => 'required',
			'email_customer'     => 'required|email',
			'phone_customer'     => 'required|numeric',
			'nik_customer'       => 'required|numeric|min:16|max:16',
			'kota_customer'      => 'required',
			'kecamatan_customer' => 'required',
			'addres_customer'    => 'required|max:255',
			'img_customer'       => 'required|mimes:jpg,png,jpeg|max:10240',
			'password'           => 'required|min:6|confirmed'
    	]);

		$name_customer      = $request->input( key:'name_customer' );
		$username           = $request->input( key:'username' );
		$gender             = $request->input( key:'gender' );
		$email_customer     = $request->input( key:'email_customer' );
		$phone_customer     = $request->input( key:'phone_customer' );
		$nik_customer       = $request->input( key:'nik_customer' );
		$kota_customer      = $request->input( key:'kota_customer' );
		$kecamatan_customer = $request->input( key:'kecamatan_customer' );
		$addres_customer    = $request->input( key:'addres_customer' );
		$img_customer       = $request->input( key:'img_customer' );
		$password           = $request->input( key:'password' );

		$user = new User([
			'name_customer'      => $name_customer,
			'username'           => $username,
			'gender'             => $gender,
			'email_customer'     => $email_customer,
			'phone_customer'     => $phone_customer,
			'nik_customer'       => $nik_customer,
			'kota_customer'      => $kota_customer,
			'kecamatan_customer' => $kecamatan_customer,
			'addres_customer'    => $addres_customer,
			'img_customer'       => $img_customer,
			'password'           => bcrypt($password)
		]);

		if ($user->save()) {
			$user->signin = [
				'href'   => 'api/v1/user/signin',
				'method' => 'POST',
				'params' => 'email, password'
			];
			$response = [
				'msg'  => 'User Berhasil Didaftarkan',
				'user' => $user
			];
			return response()->json($response, status: 201);
		}

		$response = [
			'msg' => 'Pendaftaran Gagal',
		];
		return response()->json($response, status: 404);
    }

    public function signin(Request $request)
    {
    	return 'It Works';
    }
}
