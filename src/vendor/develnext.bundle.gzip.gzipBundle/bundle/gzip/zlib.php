<?php
namespace bundle\gzip;

use php\io\MiscStream;
use php\lib\bin;
use php\io\MemoryStream;
use php\lib\str;
use php\lib\char;


class zlib
{
    private static $js;
    public static function init($a = null){
        self::$js = new webEngine;
        self::$js->makePage([
            '.data/js/zlib/deflate.min.js',
            '.data/js/zlib/inflate.min.js',
            '.data/js/zlib/rawdeflate.min.js',
            '.data/js/zlib/rawinflate.min.js',
            '.data/js/zlib/gzip.min.js',
            '.data/js/zlib/gunzip.min.js',
            '.data/js/zlib/gz.js',
        ], '<div id="answer"></div>');
    }

    public static function __callStatic($name , $arguments){
        self::callFunction($name, $arguments[0]);
        return self::getAnswer();
    }
    
    private static function callFunction($func, $params){
        $jsonData = self::dataToJson($params);
        self::$js->callFunction('gz', [$func, $jsonData]);
    }
    
    public static function getAnswer(){
        $answer = self::getJsonAnswer();
        return self::jsonToData($answer);
    }
    
    private static function jsonToData($data){
        $stream = new MemoryStream;
        
        $array = json_decode($data, true);
        array_map(function($i) use ($stream){ 
            $bin = bin::of([$i]);
            $stream->write($bin); 
        }, $array);
        
        $stream->seek(0);
        $b = $stream->readFully();
        $stream->close();
        return $b;
    }
    
    private static function dataToJson($data){
        $stream = new MemoryStream;
        $stream->write($data);
        $stream->seek(0);
        
        $byte = $stream->read(1);
        $array = [self::getCode($byte)];
        while(!$stream->eof()){
           $array[] = self::getCode($stream->read(1)); 
        }
        
        $stream->close();
        return json_encode($array);
    }
    
    private static function getCode($symbol){
        $code = ord($symbol);
        return $code;
    }
    
    private static function getJsonAnswer(){
        return self::$js->executeScript('document.getElementById("answer").innerHTML');
    }   
}