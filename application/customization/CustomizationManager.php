<?php
  require_once('configurations 1/Colors1.php');
  require_once('configurations 1/Images1.php');
  //need images1.php
  class CustomizationManager{
    public static $currentConfigName;   // saves the current configuration name
    public static $colors;  // an object that stores the colors
    public static $images; //links to the images found in assets

    // Load the respective configurations based on configName:
    //  "configurations 1" for Ted's team;
    //  "configurations 2" for Neil's team; or
    //  null for default configurations.
    public static function SetTheme(/*string configName*/$configName){
        self::$currentConfigName = $configName;
        self::loadColor($configName);
        self::loadImage($configName);
    }

    // Load the colors from the Colors1.php file in the selected configuration.
    // Call this from within SetTheme method.
    public static function loadColor($configName){
        //return $color = new Colors1();
        if('configurations 1' == $configName){
            self::$colors = new Colors1;
        }else if('configuration 2' == $configName){
            self::$colors = new Colors1;//should be Colors2 but dont have the php file yet
        }else{
            //defult color
        }
    }

    // Call this from within SetTheme method.
    public static function loadImage($configName){
        //return $images = new Images1();
        if($configName == "configurations 1"){
            self::$images = new Images1;
        }else if($configName == "configurations 2"){
            self::$images = new Images1;//should be Images2 but dont have php file yet
        }
    }

    // Call this from within SetTheme method.
    public static function loadLanguage($configName){

    }
  }
?>
