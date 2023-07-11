<?php

namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\MasterModel;
use Myth\Auth\Entities\User;
use Myth\Auth\Password;
use Hermawan\DataTables\DataTable;
use App\Libraries\TemplateLib;

class UtilController extends BaseController
{
    public function moveUserAvatar($photo_name){
        if($this->request->isAJAX()){
            $result = false;
            $avatar_dir = str_replace("\\","/",ROOTPATH)."public/assets/media/avatars/";
            if (!file_exists($avatar_dir)) {
                mkdir($avatar_dir, 0777, true);
            }
            if($photo_name){
                $temp_dir = str_replace("\\","/",ROOTPATH)."public/assets/media/avatars/temp/";
                $result = rename( $temp_dir.$photo_name, $avatar_dir.$photo_name);
            }
            return $result;
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    public function uploadUserAvatar($id){
        if($this->request->isAJAX()){
            $dataURL = $_POST["dataURL"];
            $file = file_get_contents($dataURL) or die('File too large or inacessible');
            $filename = $id.'-photo'.'.jpeg';
            $dir = str_replace("\\","/",ROOTPATH)."public/assets/media/avatars/temp/";
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            $fp = fopen($dir.$filename,"w");
            $result = fwrite($fp, $file);
            fclose($fp);
            if($result){    
                $this->deleteOldTempAvatars($id, $filename);
                echo $filename;
            }else{
                echo $result;
            }
        }else{throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();}
    }

    /**
     * It deletes all files in the temp folder that start with the user's id.
     * 
     * @param id the id of the user
     */
    public function deleteOldTempAvatars($id, $exception){
        $dir = str_replace("\\","/",ROOTPATH)."public/assets/media/avatars/temp/";
        $files = scandir($dir);
        if(is_array($files)){
            foreach($files as $file){
                if(is_file($dir.$file) && explode("-", $file)[0]==$id){
                    if($file == $exception){continue;}
                    unlink($dir.$file);
                }
            }
        }
    }

    /**
     * It deletes all files in the avatars folder that start with the user's id
     * 
     * @param id the id of the user
     */
    public function deleteOldUserAvatars($id){
        $dir = str_replace("\\","/",ROOTPATH)."public/assets/media/avatars/";
        $files = scandir($dir);
        if(is_array($files)){
            foreach($files as $file){
                if(is_file($dir.$file) && explode("-", $file)[0]==$id){
                    unlink($dir.$file);
                }
            }
        }
    }

    /**
     * The function `barangaysCitiesAndProvinces` retrieves barangays, cities, and provinces from a
     * database and returns them as JSON or an array.
     * 
     * @param barangay_id The `barangay_id` parameter is an optional parameter that represents the ID
     * of a specific barangay. If provided, the function will return the details of that specific
     * barangay. If not provided, the function will return the details of all barangays, cities, and
     * provinces.
     * @param is_json A boolean parameter that determines whether the function should return the result
     * as a JSON string or as an associative array. If set to true, the function will return the result
     * as a JSON string. If set to false, the function will return the result as an associative array.
     * 
     * @return an array or JSON object containing the barangays, cities, and provinces.
     */
    public static function barangaysCitiesAndPronvinces($barangay_id = false, $is_json = true){
        if($barangay_id){
            return userBarangaysCitiesAndPronvinces($barangay_id);
        }
        $master_model = new MasterModel();

        $barangays = $master_model->get("refbrgy", "*");
        $cities = $master_model->get("refcitymun", "*");
        $provinces = $master_model->get("refprovince", "*");
        if($is_json){
            return json_encode([
                "barangays" => $barangays["result"],
                "cities" => $cities["result"],
                "provinces" => $provinces["result"],
            ]);
        }
        return [
            "barangays" => $barangays["result"],
            "cities" => $cities["result"],
            "provinces" => $provinces["result"],
        ];
    }

    public static function userBarangaysCitiesAndProvinces($barangay_id){
        $master_model = new MasterModel();

        $barangay = $master_model->get("refbrgy", "*", ["id" => $barangay_id]);

        if(!$barangay['status']){ return false; }

        $citymunCode = $barangay['result'][0]->citymunCode;

        $barangays = $master_model->get("refbrgy", "*", ["citymunCode" => $citymunCode]);

        $city = $master_model->get("refcitymun", "*", ["citymunCode" => $citymunCode]);

        if(!$city['status']){ return false; }

        $provCode = $city['result'][0]->provCode;

        $cities = $master_model->get("refcitymun", "*", ["provCode" => $provCode]);
        
        $provinces = $master_model->get("refprovince", "*");
        return json_encode([
            "barangays" => $barangays["result"],
            "cities" => $cities["result"],
            "provinces" => $provinces["result"],
            "selected_barangay" => $barangay_id,
            "selected_city" => $citymunCode,
            "selected_province" => $provCode,
        ]);
    }

    public static function userBirthPlace($city_mun_id){
        $master_model = new MasterModel();

        $city = $master_model->get("refcitymun", "*", ["id" => $city_mun_id]);
        
        if(!$city['status']){ return false; }

        $citymunCode = $city['result'][0]->citymunCode;
        
        $provCode = $city['result'][0]->provCode;

        $cities = $master_model->get("refcitymun", "*", ["provCode" => $provCode]);
        
        $provinces = $master_model->get("refprovince", "*");

        return json_encode([
            "cities" => $cities["result"],
            "provinces" => $provinces["result"],
            "selected_city" => $citymunCode,
            "selected_province" => $provCode,
        ]);
    }

    public static function getCityMun($province_code = false, $barangay_id = false){
        $master_model = new MasterModel();

        if($province_code){
            $cities = $master_model->get("refcitymun", "*", ["provCode"=>$province_code]);
            if($cities["status"]){
                return json_encode($cities["result"]);
            }else{
                return false;
            }
        }
    }

    public static function getBarangay($citymun_code){
        $master_model = new MasterModel();

        $cities = $master_model->get("refbrgy", "*", ["citymunCode"=>$citymun_code]);
        if($cities["status"]){
            return json_encode($cities["result"]);
        }else{
            return false;
        }
    }

    public static function isUserFilled($userId){
        $masterModel = new MasterModel();

        $result = $masterModel->get("public_user_info", "*", ['user_id'=> $userId]);
        if($result["status"]){
            $joins = [
                [
                    'public_user_info',
                    'public_user_info.user_id = users.id',
                    'left',
                ]
            ];
    
            $result = $masterModel->get(
                'users', //tableName
                'user_id, firstname, middlename, lastname, email, username, user_photo, role, birthdate', //select field
                [
                    'users.id' => $userId
                ], //where conditions
                $joins, // join Conditions
                FALSE,
                FALSE
            );
    
            $user_info = $result["result"][0];
            return $user_info->firstname && $user_info->lastname && $user_info->birthdate;
        }
        return false;
    }

    public static function doesUserHaveResume($userId){
        $masterModel = new MasterModel();

        $result = $masterModel->get("public_user_info", "*", ['user_id'=> $userId]);
        if($result["status"]){
            $result = $result["result"][0]->resume;
            return $result ? true : false;
        }
        return false;
    }

    /**
     * It checks if the user is a public user or not. If it is, it returns 3, else it returns the role
     * of the user.
     * </code>
     * 
     * @param userId The user id of the user whose role is to be fetched.
     * 
     * @return <code>{
     *     "status": true,
     *     "result": [
     *         {
     *             "pui_id": "1"
     *         }
     *     ]
     * }
     * </code>
     */
    public static function getUserRole($userId){
        $masterModel = new MasterModel();

        $joins = [
            [
                'user_info',
                'user_info.user_id = users.id',
                'inner',
            ]
        ];

        $fetched = $masterModel->get('users', 'user_info.role', [ 'id' => $userId ], $joins);

        if($fetched['status']){
            return $fetched['result'][0]->role;
        }else{
            $joins = [
                [
                    'public_user_info',
                    'public_user_info.user_id = users.id',
                    'inner',
                ]
            ];
            $fetched = $masterModel->get( 'users', 'public_user_info.pui_id', [ 'id' => $userId ], $joins );
            // return $fetched;
            if($fetched['status']){
                return "3";
            }else{
                return FALSE;
            }
        }
    }

    /**
     * It takes a dataURL, and saves it to a file
     * 
     * @param dataURL The dataURL of the image you want to upload.
     * @param directory The directory where you want to save the image.
     * @param file_name The name of the file you want to save it as.
     * @param file_extension The file extension of the image.
     * 
     * @return The result of the fwrite function.
     */
    public function uploadImageTo($dataURL, $directory = "public/assets/media/temp", $file_name = FALSE, $file_extension = "jpeg"){
        $file_name = $file_name ? $file_name : date("YmdHis");
        $filename = $file_name.'.'.$file_extension;
        $dir = str_replace("\\","/",ROOTPATH).$directory."/";
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        $fp = fopen($dir.$filename,"w");
        $result = fwrite($fp, file_get_contents($dataURL));
        fclose($fp);

        return $result;
    }

    /**
     * It deletes all files in a directory that match the conditions passed to it
     * 
     * @param directory The directory where the files are located.
     * @param conditions 
     * @param is_folder If you want to delete a folder, set this to TRUE.
     */
    public function deleteFilesOn($directory, $conditions = [], $is_folder = FALSE){
        $dir = str_replace("\\","/",ROOTPATH).$directory;
        if (!file_exists($dir)) {
            return TRUE;
        }
        $files = scandir($dir);
        $result = TRUE;
        if(!$is_folder){
            $file_names = [];
            if(!empty($conditions)){
                $starts_with = $conditions["starts_with"] ? $conditions["starts_with"] : "*" ;
                $ends_with = $conditions["ends_with"] ? $conditions["ends_with"] : "*" ;
                $file_extension = $conditions["file_extension"] ? $conditions["file_extension"] : "*" ;
                $path = $dir.'/'.$starts_with.$ends_with.'.'.$file_extension;
                $file_names = glob($path);
            }

            if(is_array($files)){
                foreach($files as $file){
                    if(is_file($dir.$file)){
                        if(!empty($conditions) && !in_array($file_names, $file)){
                            continue;
                        }

                        if(!unlink($dir.$file)){
                            $result = FALSE;
                            break;
                        }
                    }
                }
            }

            return $result;
        }else{
            return rmdir($directory);
        }
    }

    /**
     * It moves a file from one directory to another.
     * 
     * @param from the directory where the file is currently located
     * @param to the directory you want to move the file to
     * @param file_name The name of the file to be moved.
     * 
     * @return The result of the rename function.
     */
    public function moveFileTo($from, $to, $file_name = TRUE){
        $slash = gettype($file_name)!=="string" ? "" : "/" ;
        $to_dir = str_replace("\\","/",ROOTPATH).$to.$slash;
        $from_dir = str_replace("\\","/",ROOTPATH).$from.$slash;
        if (!file_exists($to_dir)) {
            mkdir($to_dir, 0777, true);
        }

        if(gettype($file_name)=="string"){
            $to_dir = $to_dir.$file_name;
            $from_dir = $from_dir.$file_name;
        }

        $result = rename( $from_dir, $to_dir);
        return $result;
    }

    public function uploadCkImage(){
        $target_dir = str_replace("\\","/",ROOTPATH)."public/assets/media/ckeditor/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo json_encode(["error" => ["message" => "File is not an image."]]);
            die();
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo json_encode(["error" => ["message" => "Sorry, file already exists."]]);
            die();
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            echo json_encode(["error" => ["message" => "Sorry, your file size is too large.<br> File size :" . $_FILES["fileToUpload"]["size"]]]);
            die();
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo json_encode(["error" => ["message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."]]);
            die();
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo json_encode(["error" => ["message" => "Sorry, your file was not uploaded."]]);
            die();

        // if everything is ok, try to upload file
        } else {
            $temp = explode(".", $_FILES["fileToUpload"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename)) {
                echo json_encode(["url" => base_url() . "/public/assets/media/ckeditor/" . $newfilename]);
                die();
            } else {
                echo json_encode(["error" => ["message" => "Sorry, there was an error uploading your file."]]);
                die();
            }
        }
    }

    public function uploadUserResume($user_id){
        $target_dir = str_replace("\\","/",ROOTPATH)."public/assets/files/resumes/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 9000000) {
            echo json_encode(["error" => ["message" => "Sorry, your file size is too large.<br> File size :" . $_FILES["fileToUpload"]["size"]]]);
            die();
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo json_encode(["error" => ["message" => "Sorry, your file was not uploaded."]]);
            die();

        // if everything is ok, try to upload file
        } else {
            $temp = explode(".", $_FILES["fileToUpload"]["name"]);
            $newfilename = $user_id . '-resume.' . end($temp);
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename)) {
                echo json_encode(["url" => base_url() . "/public/assets/files/resumes/" . $newfilename, "file_name"=>$newfilename]);
                die();
            } else {
                echo json_encode(["error" => ["message" => "Sorry, there was an error uploading your file."]]);
                die();
            }
        }
    }

}
?>