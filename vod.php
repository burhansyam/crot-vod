<?php
error_reporting(0);

$ctg = isset($_GET['c']) ? $_GET['c'] : 'horror';

$kat = ucfirst($ctg); 

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://geocities.ws/minibioskop13/MOVIES/$ctg.json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: geocities.ws';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
$headers[] = 'Accept-Language: en-US,en;q=0.9,id;q=0.8';
$headers[] = 'Cache-Control: max-age=0';
$headers[] = 'If-Modified-Since: Tue, 06 Dec 2022 03:34:11 GMT';
$headers[] = 'If-None-Match: W/\"407db-5ef207a319602;5ec58f2ee8210\"';
$headers[] = 'Sec-Ch-Ua: \"Not?A_Brand\";v=\"8\", \"Chromium\";v=\"108\", \"Google Chrome\";v=\"108\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: none';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$jalan = curl_exec($ch);

$pecah = json_decode($jalan, TRUE);

$siu= $pecah['channels'];

$x = -1;
 while($x<=1000)
 {
$x++;

$start ="1";
$akhir = '2';

$judul = $siu[$x]['name'];
$gbr = $siu[$x]['poster'];
$pelem = $siu[$x]['stream_url'][0]['episode'];

$kontlo = "#EXTINF:-1 tvg-id=\"vodcloud\" tvg-logo=\"$gbr\" group-title=\"Film $kat\", ".$judul. "\n". $pelem." \n";

$b1 = "#EXTINF:-1 tvg-id=\"vodcloud\" tvg-logo=\"\" group-title=\"Film $kat\",";
$b2 = "\n\n";
$gb = "$b1$b2";

$filter = str_replace("$b1","", $kontlo);
echo $filter = preg_replace('/^[ \t]*[\r\n]+/m', '', $filter);
     
     
 }


print_r($cenil);

?>
