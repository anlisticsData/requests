<?php

namespace AnalisticsData\Requests;


/**
 *  HttpRequests.php
 */
class HttpRequests
{
	private $_buffer = [];
    public function __construct(){
        $data = json_decode(file_get_contents('php://input'),true);
        if(!is_null( $data)){
            foreach ($data as $key => $value) {
                $this->_buffer[strtoupper($key)]=$value;
            }
        }
    
        if(isset($_SESSION)){
            foreach($_SESSION as $key => $value){
                $this->_buffer[strtoupper($key)]=$value;
            }
        }
        foreach (getallheaders() as $key => $value) {
            $this->_buffer[strtoupper($key)]=$value;
        }
     

        foreach($_GET as $key => $value){
            $this->_buffer[strtoupper($key)]=$value;
        }
        foreach($_POST as $key => $value){
            $this->_buffer[strtoupper($key)]=$value;
        }

        foreach($_FILES as $key => $value){
            $this->_buffer[strtoupper($key)]=$value;
        }

        foreach($_SERVER as $key => $value){
            $this->_buffer[strtoupper($key)]=$value;
        }
        
    }

    public function get($key){
        return $this->_buffer[strtoupper($key)];
    }
    public function all(){
        return $this->_buffer;
    }

    public function getArray($keys=[]){

        if(!is_array($keys)){
            throw new Exception("not array Valid.!");
        }

        $buffer=[];
        foreach($keys as $index =>$value){
            if(isset($this->_buffer[strtoupper($value)])){
                $buffer[strtoupper($value)]=$this->_buffer[strtoupper($value)];
            }
        }
        return $buffer;
    }
    




}