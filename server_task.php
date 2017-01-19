<?php
$serv = new swoole_server("127.0.0.1", 9501);

//�����첽����Ĺ�����������
$serv->set(array('task_worker_num' => 4));

$serv->on('receive', function($serv, $fd, $from_id, $data) {
    //Ͷ���첽����
    $task_id = $serv->task($data);
    echo "Dispath AsyncTask: id=$task_id\n";
});

//�����첽����
$serv->on('task', function ($serv, $task_id, $from_id, $data) {
    echo "New AsyncTask[id=$task_id]".PHP_EOL;
    //��������ִ�еĽ��
    $serv->finish("$data -> OK");
});

//�����첽����Ľ��
$serv->on('finish', function ($serv, $task_id, $data) {
    echo "AsyncTask[$task_id] Finish: $data".PHP_EOL;
});

$serv->start();