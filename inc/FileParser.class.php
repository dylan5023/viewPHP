<?php

class FileParser {

    public static function convertToObject(string $fileContent):array {
        $departList = [];
        try {
            if(! is_string($fileContent)){
                throw new Exception("The current file is not a string. Please try another");
                
            }
            $fileRow = explode("\n", $fileContent);
            for($i = 1; $i < count($fileRow); $i++) {
                $departData = explode(",", $fileRow[$i]);

                if(count($departData) === 6) {
                    $departList[] = new Dependent(
                        $departData[0],
                        $departData[1],
                        $departData[2],
                        $departData[3],
                        $departData[4],
                        $departData[5],
                    );
                }
            }
        } catch (Exception $error) {
            echo $error->getMessage();
        }
        return $departList;
    }
}