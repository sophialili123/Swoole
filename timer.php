<?php
//ÿ��2000ms����һ��
swoole_timer_tick(2000, function($timer_id){
	echo "tick-2000ms\n";
});

//3000ms��ִ�д˺���
swoole_timer_after(3000, function(){
	echo "after 3000\n";
});
