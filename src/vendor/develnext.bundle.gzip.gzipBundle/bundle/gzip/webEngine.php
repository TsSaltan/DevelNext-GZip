<?
namespace bundle\gzip;

use php\gui\JSException;
use php\gui\UXWebView;
use php\io\ResourceStream;
use php\lang\Thread;

class webEngine{
    private $browser;

    public function __construct(){
         $this->browser = new UXWebView;
    }

    public function loadContent($content, $type = "text/html"){
        return $this->browser->engine->loadContent($content, $type);
    }

    public function executeScript($script){
        try{
            return $this->browser->engine->executeScript($script);
        } catch (JSException $je){
            return null;
        }
    }

    public function callFunction($func, $params){
        try{
            return $this->browser->engine->callFunction($func, $params);
        } catch (JSException $je){
            return null;
        }
    }

    public function makePage($scripts, $body){
        foreach($scripts as $script){
            $body = '<script>' . $this->getResContent($script) . '</script>' . $body;
        }
        $this->loadContent($body, 'text/html');
    }

    public function getResContent($path){
        $res = ResourceStream::getResources($path);

        if(!isset($res[0]) || !is_object($res[0])){
            throw new \Exception('Invalid resource script path "'.$path.'"');
        }

        return $res[0]->readFully();
    }

    public function getHtml(){
        return is_null($this->browser->engine->document) ? null : (new \php\xml\XmlProcessor)->format($this->browser->engine->document);
    }
}