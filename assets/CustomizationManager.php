<?php
  require('configurations 1/Colors1.php');
  require('configurations 1/Images1.php');
  class CustomizationManager{
    public static $currentConfigName;   // saves the current configuration name
    public static $colors;  // an object that stores the colors
    public static $images;

    // Load the respective configurations based on configName:
    //  "configurations 1" for Ted's team;
    //  "configurations 2" for Neil's team; or
    //  "default" for default configurations.
    public static function SetTheme($configName){
        self::$currentConfigName = $configName;
        self::LoadColors($configName);
        self::LoadImages($configName);
    }

    // Load the colors from the Colors1.php file in the selected configuration.
    // Call this from within SetTheme method.
    public static function LoadColors($configName){
        if("configurations 1" == $configName){
            self::$colors = new Colors1;
        }else if("configurations 2" == $configName){
            //config 2 color class instantiation
        }else{
            //for default color class instantiation
        }
    }

    // Call this from within SetTheme method.
    public static function LoadImages($configName){
        if($configName == "configurations 1"){
          self::$images = new Images1;
        }else if($configName == "configurations 2"){

        }
    }

    // Call this from within SetTheme method.
    public function LoadLanguages($configName){

    }
  }
?>
