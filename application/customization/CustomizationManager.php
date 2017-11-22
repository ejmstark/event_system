<?php
  require_once('Colors1.php');
  class CustomizationManager{
    public $currentConfigName;   // saves the current configuration name
    public $colors;  // an object that stores the colors
    public $images; //links to the images found in assets

    // Load the respective configurations based on configName:
    //  "configurations 1" for Ted's team;
    //  "configurations 2" for Neil's team; or
    //  null for default configurations.
    public function SetTheme(string configName){
        configColor(configName);
        configImage(configName);
    }

    // Load the colors from the Colors1.php file in the selected configuration.
    // Call this from within SetTheme method.
    public function configColor(string configName){
        return $color = new Colors1();
    }

    // Call this from within SetTheme method.
    public function configImage(string configName){
        return $images = new Images1();
    }

    // Call this from within SetTheme method.
    public function configLanguage(string configName){

    }
  }
?>
