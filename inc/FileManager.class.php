<?php

/**
 * clss FileManager
 */

class FileManager {

    /**
     * @param string $filePath
     * @return string $fileContent
     */
    public static function readCsvFile(string $filePath):string {
        $fileContent = "";
        try {
            $fileHandle = fopen($filePath, 'r');
            if(!$fileHandle) {
                throw new Exception("we could not open file .$filePath");
            }

            $fileContent = fread($fileHandle, filesize($filePath));

            fclose($fileHandle);
        } catch (Exception $error) {
            echo $error->getMessage();
        }

        return $fileContent;
    }
    public static function writeCsvFile($fileContent){
        try {
            $fileHandle = fopen("../data/orioles.csv", 'w');
            if(!fileHandle) {
                throw new Exception("Error trying to write the file.");
                
            }
            fwrite($fileHandle, $fileContent);
            fclose($fileHandle);
        } catch (Exception $error) {
            
        }
    } 
}