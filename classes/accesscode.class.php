<?php
class AccessCode{
    private $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    private $code;
    public function __construct( $length ){
        $arr = str_split($this -> letters);
        for( $i = 0; $i < $length; $i++ ){
            $selector = mt_rand(0, ( count($arr)-1 ));
            $this -> code = $this -> code . $arr[$selector];
        }
    }
    public function __toString(){
        return $this -> code;
    }
}
?>