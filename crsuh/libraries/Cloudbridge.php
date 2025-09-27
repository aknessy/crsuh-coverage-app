<?php
require_once FCPATH . 'vendor/autoload.php';

use CloudBridge\CloudBridgeClient;

defined('BASEPATH') or exit('No direct script access allowed');

class Cloudbridge
{
    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->config->load('s3', true);
        $s3_config         = $this->CI->config->item('s3');
        $this->access_key  = $s3_config['access_key'];
        $this->secret_key  = $s3_config['secret_key'];
        $this->bucket_name = $s3_config['bucket_name'];
        $this->s3_url      = $s3_config['s3_url'];
        $this->client      = new CloudBridgeClient($this->access_key, $this->secret_key);
    }
    
    
//     function upload_file($file_path,$file_name,$folder_name)
//     {
      
//          $name = $this->rename_file($file_path, $file_name);
//          echo '<pre>'; var_dump($name); die;
//         return $this->client->uploadFile($name, $folder_name);
//     }

//     function upload_files($file_paths, $folder_name)
//     {
//         return $this->client->uploadFiles($file_paths, $folder_name);
//     }
    
    
//     function rename_file($file_name, $new_file_name)
//     {
//                // Your existing variables
//           $file_name = $file_name;  // The desired new filename
//           $file = pathinfo($file_name);
//           $mime_type = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $file_path);
//           // To rename the file from $file_path to $file_name:
//          return  $new_file_path = dirname($file_path) . '/' . $file_name.$mime_type;

//     }
    
    
    public function upload_file($file_path, $file_name, $folder_name)
    {
      
        $new_file_path = $this->rename_file($file_path, $file_name);
        return $this->client->uploadFile($new_file_path, $folder_name);
    }
    
    /**
     * Upload multiple files
     */
    public function upload_files($file_paths, $folder_name)
    {
        // Validate all files exist before uploading
        foreach ($file_paths as $file_path) {
            if (!file_exists($file_path)) {
                throw new Exception("File does not exist: " . $file_path);
            }
        }
        
        return $this->client->uploadFiles($file_paths, $folder_name);
    }
    
    /**
     * Rename/copy a file to a new location with new name
     */
    private function rename_file($file_path, $new_file_name)
    {
        // Get file extension from original file
        $file_info = pathinfo($file_path);
        $original_extension = isset($file_info['extension']) ? '.' . $file_info['extension'] : '';
        
        // Alternative: Get MIME type and convert to extension
        if (function_exists('finfo_open')) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($finfo, $file_path);
            finfo_close($finfo);
            
            // Convert MIME type to extension (basic mapping)
            $extension = $this->mime_to_extension($mime_type);
            if ($extension) {
                $original_extension = $extension;
            }
        }
        
        // Create new file path
        $directory = dirname($file_path);
        $new_file_path = $directory . DIRECTORY_SEPARATOR . $new_file_name . $original_extension;
        
        // Copy the file to new location (or rename if you want to move it)
        if (copy($file_path, $new_file_path)) {
            return $new_file_path;
        } else {
            throw new Exception("Failed to copy file to: " . $new_file_path);
        }
    }
    
    /**
     * Convert MIME type to file extension
     */
    private function mime_to_extension($mime_type)
    {
        $mime_map = [
            'image/jpeg' => '.jpg',
            'image/png' => '.png',
            'image/gif' => '.gif',
            'image/webp' => '.webp',
            'application/pdf' => '.pdf',
            'text/plain' => '.txt',
            'application/zip' => '.zip',
            'application/msword' => '.doc',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => '.docx',
            // Add more as needed
        ];
        
        return isset($mime_map[$mime_type]) ? $mime_map[$mime_type] : '';
    }
    
    

}