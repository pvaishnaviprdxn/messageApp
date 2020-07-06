<?php 
require_once('db.php');

class Chats extends Dbc
{
    private $id;
    private $recieverId;
    private $message;
    private $time;

    public function __construct($id,$recieverId,$message,$time)
    {
        $this->id = $id;
        $this->recieverId = $recieverId;
        $this->message=$message;
        $this->time=$time;
    }

    public function sendingMsg()
    {
        $dbc = new Dbc();
        $sql = "INSERT INTO messages(id,reciever_id,texts,time) VALUES (".$this->id.",".$this->recieverId.",'".$this->message."','".$this->time."')";
        $dbc->con->query($sql);
    }

    
}


?>