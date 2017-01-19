<?php
$client = new swoole_client(SWOOLE_SOCK_TCP);

//���ӵ�������
if (!$client->connect('127.0.0.1', 9501, 0.5))
{
    die("connect failed.");
}
//���������������
if (!$client->send("hello world"))
{
    die("send failed.");
}
//�ӷ�������������
$data = $client->recv();
if (!$data)
{
    die("recv failed.");
}
echo $data;
//�ر�����
$client->close();