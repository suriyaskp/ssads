<?php

class subscriber_update {
	private $token;

	private function open_url($url, $method="GET", $data=null) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		return curl_exec($ch);
		
	}


	private function control_api($action, $data=NULL) {
		$token = $this->token;
		$response = json_decode($this->open_url("https://api.telegram.org/bot$token$action", "POST", $data));
		return $response;
	}

	function __construct($token) {
		$this->token=$token;
	}



	public function get_chat_member_count($to)
	{
		$data = array();
		$data["chat_id"]=$to;
		$response = $this->control_api("/getChatMembersCount", $data);
		return $response;
	}


	public function read_post_message(){
		return json_decode(file_get_contents('php://input'));
	}

}
?>
