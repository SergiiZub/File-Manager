<?php


class File
{
    const READ_MODE = 'r';
    const WRIGHT_MODE = 'w';
    const LANG_PART_FILE = '1024';
    private $filename;
    private $file_handle;

    public function __construct($filename){
        $this->filename = $filename;
    }

    private function openFile($mode){
        if (!file_exists($this->filename) && $mode == self::READ_MODE){
            throw new Exception('Can not read undefined file ' . $this->filename);
        }
        $this->file_handle = fopen($this->filename, $mode);
    }
    
    private function closeFile(){
        fclose($this->file_handle);
    }

    public function readFile(){
        $this->openFile(self::READ_MODE);
        $number_part = 0;
        while (!feof($this->file_handle)){
            $number_part++;
            if (($data = fread($this->file_handle, self::LANG_PART_FILE)) !== false) {
                yield $number_part => $data;
            } else {
                // Error read file
            }
        }
        $this->closeFile();
    }

    public function wrightToFile(){
        $this->openFile(self::WRIGHT_MODE);
        $this->closeFile();
    }
}
