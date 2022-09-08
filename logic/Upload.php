<?php

class UploadFile
{

    private $pathImage;
    public function getPathImage(){
        return $this->pathImage;
    }
    public function __construct($path, $file)
    {
        $target_dir = $path;
        $target_file = $target_dir . basename($_FILES[$file]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;
        $check = getimagesize($_FILES[$file]["tmp_name"]);

        if ($check !== false) {
            echo "File is an Image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
            echo "Sorry , only JPG , JPEG , PNG , GIF  files are allowed .";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry ,your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)) {                 
                echo "The File " . htmlspecialchars(basename($_FILES[$file]["name"])) . " has been uploaded <br/>";
                $this->pathImage =  $target_dir ."".  htmlspecialchars(basename($_FILES[$file]["name"]));
            } else {
                echo "The File " . htmlspecialchars(basename($_FILES[$file]["name"])) . " it is't Upload . <br/>";
                $this->pathImage =  $target_dir ."".  htmlspecialchars(basename($_FILES[$file]["name"]));
            }
        }
    }
}
