<?php

$host = "api.klikbca.com";
$port = 47259;
// $host = 'vabtn-dev.btn.co.id';
// $port = 9021;
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$connection =  @socket_connect($socket, $host, $port);

if( $connection ){
  echo 'ONLINE';
}
else {
  $errorcode = socket_last_error();
  $errormsg = socket_strerror($errorcode);
  $hasil = date('d/m/Y H:i:s').' ' . $errorcode.' '.$errormsg;

  $this->load->model('general_model');
  $this->general_model->save('z_status_auto_generate',array('type'=>$hasil.' '.$_SERVER['SERVER_ADDR'].'_'.$_SERVER['REMOTE_ADDR'],'status'=>0,'datetime'=>date('Y-m-d H:i:s')));

  echo $hasil;
}

?>
