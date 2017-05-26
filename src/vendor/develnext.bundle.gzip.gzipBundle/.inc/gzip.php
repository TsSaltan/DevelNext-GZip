<?php
/**
 * Включает поддержку функций gz*, как в обычном PHP
 */

namespace;
use bundle\gzip\zlib;
use php\gui\UXApplication;

UXApplication::runLater(function(){
  /* *
   * Т.к. для работы функций нужен браузерный javascript,
   * лучше инициализировать этот компонент один раз при запуске 
   * проекта, нежели запускать браузер каждый раз при вызове gz функции
   */
  zlib::init();
});

if(!function_exists('gzencode')){

   /**
    * --RU--
    * Сжимает строку в формате GZIP 
    * @param string $data Данные для сжатия
    * @link http://php.net/manual/function.gzencode.php
    */
   function gzencode($data){
       return zlib::encode($data);
   }

   /**
    * --RU--
    * Распаковывает строку, упакованную с помощью GZIP
    * @param string $data Данные для распаковки, упакованные с помощью gzencode()
    * @link http://php.net/manual/function.gzdecode.php
    */
   function gzdecode($data){
       return zlib::decode($data);
   }

   /**
    * --RU--
    * Cжимает строку используя формат данных ZLIB
    * @param string $data Данные для сжатия
    * @link http://php.net/manual/function.gzcompress.php
    */
   function gzcompress($data){
       return zlib::compress($data);
   }

   /**
    * --RU--
    * Распаковывает строку, упакованную с помощью ZLIB
    * @param string $data Данные, сжатые функцией gzcompress()
    * @link http://php.net/manual/function.gzuncompress.php
    */
   function gzuncompress($data){
       return zlib::uncompress($data);
   }

   /**
    * --RU--
    * Сжимает строку, используя формат данных DEFLATE
    * @param string $data Данные для сжатия
    * @link http://php.net/manual/function.gzdeflate.php
    */
   function gzdeflate($data){
       return zlib::deflate($data);
   }

   /**
    * --RU--
    * Распаковывает строку, упакованную с помощью DEFLATE
    * @param string $data Данные, сжатые функцией gzdeflate()
    * @link http://php.net/manual/function.gzinflate.php
    */
   function gzinflate($data){
       return zlib::inflate($data);
   }
}