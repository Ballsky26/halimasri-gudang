<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Bot_model;

class Bot extends Controller
{
    public function index(){
        $content = file_get_contents("php://input");
        if($content){
            $token = '5202399096:AAFBUZ0b4R51WFSkskXXoSm3pUcJ_G6UeeU';
            
            $apiLink = "https://api.telegram.org/bot$token/";
            
            echo '<pre>content = '; print_r($content); echo '</pre>';
            $update = json_decode($content, true);
            if(!@$update["message"]) $val = $update['callback_query'];
            else $val = $update;
            
            $chat_id = $val['message']['chat']['id'];
            $text = $val['message']['text'];
            $update_id = $val['update_id'];
            $sender = $val['message']['from'];
            ?>
            <b>There is a message :</b>
            <br /><br />
            <b>Username : </b> <?php echo $sender['username']; ?> <br />
            <b>Sender's Name : </b> <?php echo $sender['first_name'].' '.$sender['last_name']; ?> <br />
            <b>Text Message : </b> <?php echo $text; ?> <br /><br />
            <?php 

            // cek siapa dan apa yang dia inginkan
            
            $this->response_save($sender,$text);
            $model = new Bot_model();
            $data = array(
                'id_client' => "assender",
                'command' => "astext"
            );
            $model->saveProduct($data);

            // end cek

            if ($text == '/help'){
                $output = urlencode("List Command : \n 1. /reqAO (spasi) #keterangan ");
                file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=You just sent ".$text);
            } else if ($text == '/reqAO'){

                // $output = urlencode("  ");
                // file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=You just sent ".$text);
            }
            
            file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=You just sent ".$text);
            echo 'Response sent.<br /><br />';
        } else echo 'Only telegram can access this url.';       
    }


    public function response_save($id_client,$command){
        $model = new Bot_model();
        $data = array(
            'id_client' => $id_client,
            'command' => $command
        );
        $model->saveProduct($data);
    }    
}


?>