<?php
if (isset($_GET['dir'])){ //设置文件目录
$basedir=$_GET['dir'];
}else{
$basedir = '.';
}
loopfile($basedir);
//loopdir($basedir);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function loopfile($basedir){
    $arr=array();
    if (is_dir($basedir) && $dh = opendir($basedir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..'){
                $filename = $basedir. DIRECTORY_SEPARATOR . $file;
                if (!is_dir($filename)) {
                      $arr[]=$filename;
                }else{
                    loopfile($filename);
                }
            }
        }
        closedir($dh);
    }
}

function loopdir($basedir){
    $arr=array();
    if (is_dir($basedir) && $dh = opendir($basedir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..'){
                $dirname = $basedir. DIRECTORY_SEPARATOR . $file;
                if (is_dir($dirname)) {
                    $arr[]=$dirname;
                    loopdir($dirname);
                } 
            }
        }
        closedir($dh);
    }
}
