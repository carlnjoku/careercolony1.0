<?php

abstract class SlimStatus {
    const FAILURE = 'failure';
    const SUCCESS = 'success';
}

class Slim {

    public static function getImages($inputName = 'slim') {

        $values = Slim::getPostData($inputName);

        // test for errors
        if ($values === false) {
            return false;
        }

        // determine if contains multiple input values, if is singular, put in array
        $data = array();
        if (!is_array($values)) {
            $values = array($values);
        }

        // handle all posted fields
        foreach ($values as $value) {
            $inputValue = Slim::parseInput($value);
            if ($inputValue) {
                array_push($data, $inputValue);
                
            }
        }

        // return the data collected from the fields
        return $data;

    }

    // $value should be in JSON format
    private static function parseInput($value) {

        // if no json received, exit, don't handle empty input values.
        if (empty($value)) {return null;}

        // The data is posted as a JSON String so to be used it needs to be deserialized first
        $data = json_decode($value);

        // shortcut
        $input = null;
        $actions = null;
        $output = null;
        $meta = null;

        if (isset ($data->input)) {
            $inputData = isset($data->input->image) ? Slim::getBase64Data($data->input->image) : null;
            $input = array(
                'data' => $inputData,
                'name' => $data->input->name,
                'type' => $data->input->type,
                'size' => $data->input->size,
                'width' => $data->input->width,
                'height' => $data->input->height,
            );
        }

        if (isset($data->output)) {
            $outputData = isset($data->output->image) ? Slim::getBase64Data($data->output->image) : null;
            $output = array(
                'data' => $outputData,
                'width' => $data->output->width,
                'height' => $data->output->height
            );
        }

        if (isset($data->actions)) {
            $actions = array(
                'crop' => $data->actions->crop ? array(
                    'x' => $data->actions->crop->x,
                    'y' => $data->actions->crop->y,
                    'width' => $data->actions->crop->width,
                    'height' => $data->actions->crop->height,
                    'type' => $data->actions->crop->type
                ) : null,
                'size' => $data->actions->size ? array(
                    'width' => $data->actions->size->width,
                    'height' => $data->actions->size->height
                ) : null
            );
        }

        if (isset($data->meta)) {
            $meta = $data->meta;
        }

        // We've sanitized the base64data and will now return the clean file object
        return array(
            'input' => $input,
            'output' => $output,
            'actions' => $actions,
            'meta' => $meta
        );
    }

    // $path should have trailing slash
    public static function saveFile($data, $name, $path = '../../../profile-images/', $uid = true) {

        // Add trailing slash if omitted
        if (substr($path, -1) !== '/profileBackground/') {
            $path .= '/profileBackground/';
        }
        
        // Test if directory already exists
        if(!is_dir($path)){
            mkdir($path, 0755, true);
        }

        // Let's put a unique id in front of the filename so we don't accidentally overwrite older files
        if ($uid) {
            $name = uniqid() . '_' . $name;
        }

        // Add name to path, we need the full path including the name to save the file
        $path = $path . $name;
        // store the file
       
        Slim::save($data, $path);

		// Send file name to database using curl
        $user_id = $_GET['user_id'];
    
        $data = array('user_id'=>$user_id, 'profile_background'=>$name);
        // Url encode the array data
                    $encoded = '';
                    foreach($data as $name => $value){
                    @$encoded .= urlencode($name).'='.urlencode($value).'&';
                    }
                    // chop off the last ampersand
                    $encoded = substr($encoded, 0, strlen($encoded)-1);
           
                    // This cvdump
                    $handle2 = curl_init();

                    curl_setopt_array(
                    $handle2,
                    array(
                    CURLOPT_URL => "http://localhost/neo4j-moviedb/web/profile_packground",
                    CURLOPT_POST => 1,
                		CURLOPT_POSTFIELDS => $encoded,
                		CURLOPT_RETURNTRANSFER => 1
                    )
           
                    );
           
                    echo $response2 = curl_exec($handle2);
                    
                    curl_close($handle2);

        // return the files new name and location
        return array(
            'name' => $name,
            'path' => $path
        );
        
        
                    
                   
        
        
    }

    public static function outputJSON($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    
    /**
     * Gets the posted data from the POST or FILES object. If was using Slim to upload it will be in POST (as posted with hidden field) if not enhanced with Slim it'll be in FILES.
     * @param $inputName
     * @return array|bool
     */
    private static function getPostData($inputName) {

        $values = array();

        if (isset($_POST[$inputName])) {
            $values = $_POST[$inputName];
        }
        else if (isset($_FILES[$inputName])) {
            // Slim was not used to upload this file
            return false;
        }

        return $values;
    }

    /**
     * Saves the data to a given location
     * @param $data
     * @param $path
     */
    private static function save($data, $path) {
        file_put_contents($path, $data);
    }

    /**
     * Strips the "data:image..." part of the base64 data string so PHP can save the string as a file
     * @param $data
     * @return string
     */
    private static function getBase64Data($data) {
        return base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
        
       
    }
    
    

}