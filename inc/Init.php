<?php

/**
 
 *@pachage edplugin 
  */


   
namespace Inc;
 
final class Init
{

    /**
     * Store all the classes inside an array
     * @return array full of classes
     */
   public static function get_services(){
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class
        ];
   }
    /**
     * Loop through classes 
     * @return 
     */

   public static function register_services(){
     
        foreach ( self :: get_services() as $class) 
        {
            $service = self::instantiate( $class );
            if( method_exists( $service, 'register' )){
                $service->register();
            }
        }

   }    
    /**
     * Store all the classes inside an array
     * @return class instance new instance of class
     */

   private static function instantiate( $class )
   {
        $service = new $class();
        return $service;
   }

}


