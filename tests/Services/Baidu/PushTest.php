<?php
require_once str_replace(array('tests', 'Test.php'), array('src', '.php'), __FILE__);
class PushTest extends PHPUnit_Framework_TestCase
{
    public function testSimplePushToAndroid()
    {
        $c = new Services_Baidu_Push('xxxapiKeyxxx', 'xxxsecretKeyxxx');
        $msg = array(
            "description"=> "testSimplePushToAndroid群发",
            "notification_basic_style"=>1,
        );
        $r = $c->simplePushToAndroid($msg);
        var_dump($r);
    }
    
    public function testSimplePushToAndroidOneUser()
    {
        $c = new Services_Baidu_Push('xxxapiKeyxxx', 'xxxsecretKeyxxx');
        $msg = array(
            "description"=> "单发",
            "notification_basic_style"=>7,
        );
        $userId = '586678656659282268';
        $r = $c->simplePushToAndroid($msg, $userId);
        var_dump($r);
    }

    public function testPushMessage()
    {
        $channel = new Services_Baidu_Push('xxxapiKeyxxx', 'xxxsecretKeyxxx');
        if(!empty($user_id)) {
            $push_type = 1; //推送消息到某个user
            $optional[Services_Baidu_Push::USER_ID] = $user_id;
        } else {
            $push_type = 3; //推送消息到该app中的全部user
        }

        //指定发到android设备
        $optional[Services_Baidu_Push::DEVICE_TYPE] = 3;
        //指定消息类型为通知
        $optional[Services_Baidu_Push::MESSAGE_TYPE] = 1;
        //通知类型的内容必须按指定内容发送，示例如下：
                //"title": "爱抢购",
        $message = '{ 
            "description": "pushMessage新品上线",
            "notification_basic_style":1,
            "open_type":2
         }';

        $message_key = "msg_key";
        $ret = $channel->pushMessage ( $push_type, $message, $message_key, $optional ) ;
        if ( false === $ret )
        {
            echo 'WRONG, ' . __FUNCTION__ . ' ERROR!!!!!';
            echo 'ERROR NUMBER: ' . $channel->errno ( );
            echo 'ERROR MESSAGE: ' . $channel->errmsg ( );
            echo 'REQUEST ID: ' . $channel->getRequestId ( );
        }
        else
        {
            echo  'result: ' . print_r ( $ret, true );
        }
    }
}
?>
