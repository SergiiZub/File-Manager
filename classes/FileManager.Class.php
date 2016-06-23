<?php


class FileManager
{
    private $dir_handle;
    private $path;
    private $dir_list = [];
    private $file_list = [];
    
    public function __construct($path){
        $this->path = $path;
        $this->dir_handle = $this->openDir();
        $this->setList();
    }
    
    public function __destruct()
    {
        $this->closeDir();
    }

    private function openDir(){
        return opendir($this->path);
    }
    
    private function closeDir(){
        closedir($this->dir_handle);
    }
    
    private function setList(){
        while ($file = readdir($this->dir_handle)){
            $path = $this->path . DIRECTORY_SEPARATOR . $file;
            if(is_dir($file)){
                $dir_info = [
                    'name' => $file,
                    'path' => $path
                ];
                $this->dir_list[$file] = $dir_info;
            } else {
                $file_info = [
                    'name' => $file,
                    'path' => $path,
                    'size' => filesize($file)
                ];
                $this->file_list[$file] = $file_info;
            }
        }
    }
    
    public function getDirList(){
        return $this->dir_list;
    }
    
    public function getFileList(){
        return $this->file_list;
    }

    public function getDir($name){
        return $this->dir_list[$name];
    }

    public function getFile($name){
        return $this->file_list[$name];
    }
}

