<?php
class Upload
{
    private $name;
    private $type;
    private $tmp_name;
    private $error;
    private $size;
    private $uploadOk = true;
    private $target_dir = "E:/Xampp/htdocs/dokan/upload/";
    private $result = [];
 
    public function uploadFile($file)
    {
        $this->name = $file['name'];
        $this->type = $file['type'];
        $this->tmp_name = $file['tmp_name'];
        $this->error = $file['error'];
        $this->size = $file['size'];
        $this->checkFile();
    }

    private function checkFile()
    {
        $target_file = $this->target_dir . basename($this->name);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an actual image
        $check = getimagesize($this->tmp_name);
        if ($check === false) {
            $this->result[] = "File is not an image.";
            $this->uploadOk = false;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $this->result[] = "Sorry, file already exists.";
            $this->uploadOk = false;
        }

        // Check file size
        if ($this->size > 50000000) {
            $this->result[] = "Sorry, your file is too large.";
            $this->uploadOk = false;
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $this->result[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $this->uploadOk = false;
        }

        // Check if $uploadOk is set to false by an error
        if ($this->uploadOk === false) {
            $this->result[] = "Sorry, your file was not uploaded.";
        } else {
            // If everything is ok, try to upload file
            if (move_uploaded_file($this->tmp_name, $target_file)) {
                $this->result['fileName'] =  $this->name;
                $this->result[] = "The file " . htmlspecialchars(basename($this->name)) . " has been uploaded.";
            } else {
                $this->result[] = "Sorry, there was an error uploading your file.";
            }
        }
    }

    public function deleteFile($fileName)
    {
        $target_file = $this->target_dir . $fileName;
         // Check if file already exists
         if (file_exists($target_file)) {
            unlink($target_file);
            return true;
        } else{
            $this->result['fileNotEXit'] = "Your File not exit";
            return false;
        }
    }

    public function getFileResult()
    {
        $val = $this->result;
        $this->result = [];
        return $val;
    }
}
