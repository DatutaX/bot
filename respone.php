<?php

	if (isset($_POST['text']))
	{
		$mess = $_POST['text'];

		//$path = 'http://api.simsimi.com/request.p?key=your_paid_key&lc=vi&ft=1.0&text='.$mess;
        $path = 'http://sandbox.api.simsimi.com/request.p?key=61a58c29-d2aa-493e-a69d-c08e58b90016&lc=vi&ft=1.0&text='.$mess; 
		$text = curl_get_contents($path);
		$data = json_decode($text, true);
echo $data;
		$code = $data['result'];

		if ($code == '100'){
			echo $data['response'];
		}
		else if ($code == '404'){
			echo 'Em chưa được dạy câu này!';
		}
		else{
			echo 'Em không hiểu!';
		}
	}
	else
	{
		echo 'Vui lòng nhập thông tin để hoạt động!';
	}
?>
<?php
function curl_get_contents($url)
{
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
?>