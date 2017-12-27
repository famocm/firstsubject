<?php
    //文件上传函数
function fileUpload($file, $allowtype, $allowsize, $updir)
{
    $res = array("error" => false , "info" => "");
    if($file['error'] > 0)
    {
        switch($file['error']) {
            case 1:
               $info = "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值";
            break;
            case 2:
               $info ="上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";
            break;
            case 3:
               $info ="文件只有部分被上传";
            break;
            case 4:
               $info ="没有文件被上传";
            break;
            case 6:
               $info ="找不到临时文件夹";
            break;
            case 7:
               $info ="文件写入失败";
            break;
        }
        $res["info"] = $info;
        return  $res;
    }
    // 验证类型
   
    if(!in_array($file["type"],$allowtype)) {
        $info = "您上传的文件不符合类型";
        $res["info"] = $info;
        return  $res;
    }
    // 文件的大小
    if($file["size"] > $allowsize) {
        $info = "您上传的文件太大了";
        $res["info"] = $info;
        return  $res;
    }
    // 为了避免覆盖做名字处理
    $houzui = pathinfo($file["name"],PATHINFO_EXTENSION);
    do{
      $filename = md5(time().rand(1,9999)).".".$houzui;
    }while(file_exists($filename));
    
    // 使用函数把中转仓（临时目录tmp）的文件上传到我们服务器上的文件夹就可以了
    $updir = rtrim($updir,"/")."/";
    move_uploaded_file($file['tmp_name'],$updir.$filename);
    $res["error"] = true;
    $res["info"] = $filename;
    return  $res;
    
}




//把five.php这个等比缩放的函数进行改变
     //图片缩放的函数  
    function tpsf($file,$bchdmz, $maxWidth, $maxHeight) {
        //GD库实现图片的缩放
        //第一步加载要缩放的图片
        $src = imagecreatefromjpeg($file);
        
        //得获取原来图片的高度和宽度
        $info = getimagesize($file);
        
        $width = $info[0];
        $height = $info[1];
        
        //宽高除2
        if($maxWidth/$width < $maxHeight/$height) {
            //胖子
            $w = $maxWidth;
            $h = ($maxWidth/$width) * $height;
        }else{
            //瘦子
            $w = ($maxHeight/$height) * $width;
            $h = $maxHeight;
        }
        
        //创建一个用来存放缩小之后的图片
        $dst = imagecreatetruecolor($w,$h);
        //通过函数进行缩放、
        imagecopyresampled($dst,$src,0,0,0,0,$w,$h,$width,$height);
         
        //输出就可以了
        // header("content-type:image/jpg");
        //输出到浏览器
        // imagejpeg($dst);
        //保存自己电脑上
        imagejpeg($dst,$bchdmz);
        imagedestroy($src);
        imagedestroy($dst);
    }