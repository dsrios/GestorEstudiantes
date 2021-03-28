<?php
/**
 * Description of File
 *
 */
class File {
    private $_archivo;
    private $_handle;
    private $_msg;
    
    public function __construct($strNameFile='') {
        $this->_archivo = $strNameFile;
    }
  
    public function Open($strMode){
        $this->_handle = fopen($this->_archivo,$strMode);
     error_reporting(null);
    }

    public function Read(){
        return fread($this->_handle, filesize($this->_archivo));
    }

    public function Write(){        
        return fwrite($this->_handle,PHP_EOL.$this->_msg);
    }
    public function Write2(){
        return fwrite($this->_handle, $this->_msg);
    }


    public function Close(){
        return fclose($this->_handle);
    }
    
    public function get_msg() {
        return $this->_msg;
    }

    public function set_msg($_msg) {
        $this->_msg = $_msg;
    }
    
    
    
}

?>