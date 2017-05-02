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
    if ($dh = opendir($basedir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..'){
                $dirname = $basedir. DIRECTORY_SEPARATOR . $file;
                if (!is_dir($dirname)) {
                     echo "filename: " . $dirname .  "<br>";
                     // deal filename function here;
                     // deal filename function end ;
                }else{
                    loopfile($dirname);
                }
            }
        }
        closedir($dh);
    }
}

function loopdir($basedir){
    if (is_dir($basedir) && $dh = opendir($basedir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..'){
                $dirname = $basedir. DIRECTORY_SEPARATOR . $file;
                if (is_dir($dirname)) {
                    echo "dirname: " . $dirname .  "<br>";
                    // deal dir function here;
                    // deal dir function end ;
                    loopdir($dirname);
                } 
            }
        }
        closedir($dh);
    }
}
