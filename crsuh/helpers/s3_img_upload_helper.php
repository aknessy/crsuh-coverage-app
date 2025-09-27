<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function upload_img($file_path,$file_name,$folder_name,$old_file, $title_no = NULL)
{
    $CI =& get_instance();
    $CI->load->library('Cloudbridge');

    if(isset($file_path) && $file_path != ''){
        if($file_path['type'] != "application/docx" && $file_path['type'] != "application/doc" && $file_path['type'] != "application/pdf" && $file_path['type'] != "image/jpg" && $file_path['type'] != "image/png" && $file_path['type'] != "image/jpeg" && $file_path['type'] != "image/JPEG" && $file_path['type'] != "image/PNG"){
            $res['file'] = 'Invalid file type. Only JPG, jpeg and PNG types are accepted';
            $res['status'] = FALSE;
        }
        else if(($file_path['size'] > 2097152)){
            $res['file'] = 'File too large. File must be less than 2 MB.';
            $res['status'] = FALSE;
        }else{
            $CI->load->helper('string');
            // $fileName = str_replace(' ', '_', $file_name)."_".date("Ymd")."_".date("His")."_".random_string('alnum',8).str_replace('image/','.',$file_path['type']);

            if($title_no){
                $fileName = $title_no."_".date("Ymd")."_".date("His")."_".str_replace(' ', '_', $file_name);
            }else{
                $fileName = date("Ymd")."_".date("His")."_".str_replace(' ', '_', $file_name);
            }

            $file =$CI->cloudbridge->upload_file($file_path['tmp_name'],$fileName,$folder_name);
            $data = (object) $file['data']['files'][0];
            // echo '<pre>'; var_dump($data); die;
            if(isset($old_file) && $old_file != '' && $file['status'] == 'success'){
                // $CI->cloudbridge->delete_file($folder_name.'/'.$old_file);
                $res['file'] = $data->filename;
                $res['status'] = TRUE;
            }else if($file['status'] == 'success'){
                $res['file'] = $data->filename;
                $res['status'] = TRUE;
            }else {
                $res['file'] = 'Error!! upload file';
                $res['status'] = FALSE;
            }
        }
    }else{
        $res['file'] = 'Please select a file to upload';
        $res['status'] = FALSE;
    }
    return $res;
}

function uploadDispatcherImage($file_path,$id, $folder_name,$name)
{
    $CI =& get_instance();
    $CI->load->library('Cloudbridge');

    if(isset($file_path) && $file_path != ''){
        if($file_path['type'] != "image/jpg" && $file_path['type'] != "image/png" && $file_path['type'] != "image/jpeg" && $file_path['type'] != "image/JPEG" && $file_path['type'] != "image/PNG"){
            $res['file'] = 'Invalid file type. Only JPG, jpeg and PNG types are accepted';
            $res['status'] = FALSE;
        }
        else if(($file_path['size'] > 2097152)){
            $res['file'] = 'File too large. File must be less than 2 MB.';
            $res['status'] = FALSE;
        }else{
            $fileName = $id.$name;
            $file =$CI->cloudbridge->upload_file($file_path['tmp_name'],$fileName,$folder_name);
             if($file['status'] == TRUE){
                $res['file'] = $file['file'];
                $res['status'] = TRUE;
            }else {
                $res['file'] = 'Error!! upload file';
                $res['status'] = FALSE;
            }
        }
    }else{
        $res['file'] = 'Please select a file to upload';
        $res['status'] = FALSE;
    }
    return $res;
}

function delete_file($uri)
{
    $CI =& get_instance();
    $CI->load->library('Cloudbridge');
    return $res=$CI->cloudbridge->delete_file($uri);
}

function getImg($folder,$img){
    error_reporting(0);
    $CI =& get_instance();
        $CI->load->library('Cloudbridge');
    $res = $CI->cloudbridge->getImg($img);

    // var_dump($res); die;
    return (isset($res->body)) ? 'data:image/jpeg;base64,'.base64_encode($res->body).'' : base_url('assets/common_icon/no-img.png');
}

?>