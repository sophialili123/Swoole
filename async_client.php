<?php
$client = new swoole_client(SWOOLE_SOCK_TCP,SWOOLE_SOCK_ASYNC);

//ע�����ӳɹ��ص�
$client->on("connect", function($cli){
	$cli->send("ruo han hao mei a !\n");
});

//ע�����ݽ��ܻص�
$client->on("receive", function($cli, $data){
	echo "Received: ".$data."\n";
});

//ע������ʧ�ܻص�
$client->on("error", function($cli){
	echo "Connect failed \n";
});

//ע�����ӹرջص�
$client->on("close", function($cli){
	echo "Connection close\n";
});

//��������
$client->connect('127.0.0.1', 9501, 0.5);