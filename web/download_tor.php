<?php
$hash = $_GET['hash'];
$name = $_GET['name'];

//$file_dir = "http://bt.box.n0808.com/".substr($hash,0,2)."/".substr($hash,-2)."/".$hash.".torrent";
$file_dir = "http://torcache.net/torrent/".strtoupper($hash).".torrent";
$name = "[www.sougaoqing.com]".$name;
//echo $file_dir;
$file = @file_get_contents($file_dir); 
//echo($file);

if (!$file) { 
	echo "<script>alert('��Ϊ���������⣬��ʱ����������ͣ����ʹ��Ѹ�����������ļ�!');</script>"; 
} else { 
		Header("Content-type: application/octet-stream");
		Header("Content-Disposition: attachment; filename=" . $name .".torrent"); 
	
		try{
			echo(gzdecode($file));
		}catch(Exception $e){
			echo 'error: ' .$e->getMessage();
		}	
}

?>