<?php namespace App\Http\Controllers\TiketAPI;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class APIController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public $token;

	public function __construct()
	{
		$this->getToken();
	}

	public function getToken()
	{
		if(session('token')==""){ // jika session kosong
			$URL = env(env('API_ENV'));
			$curl = new \Curl\Curl();
			$curl->setUserAgent('twh:22537281;SMKN 10 JAKARTA;');
			$curl->setopt(CURLOPT_SSL_VERIFYPEER, FALSE);
			$curl->get($URL."apiv1/payexpress",
							array(
								'method'=>'getToken',
								'secretkey'=>env(env('API_KEY')),
								'output'=>'json')
							);
			if ($curl->error) {
				// Print_r($curl);
				\Session::put('token',"");
				die("Error:".$curl->error_code);
			}
			else {
				$json = json_decode($curl->response);
				$this->token = $json->token;
				\Session::put('token', $json->token);
			}
		}else{
			$this->token = \Session::get('token');
		}
	}

	public function getCurl($endpoint, $data=array())
	{
		$this->getToken();
		$URL = env(env('API_ENV'));
		$curl = new \Curl\Curl();
		$curl->setUserAgent('twh:22523085;BaseCamp Software;');
		$curl->setopt(CURLOPT_SSL_VERIFYPEER, FALSE);
		$data+=array('output'=>'json','token'=>$this->token);
		$curl->get($URL.$endpoint, $data);
		if ($curl->error) {
			die("Error:".$curl->error_code);
		}
		else {
			$json = json_decode($curl->response);
			return $json;
		}
	}

}
