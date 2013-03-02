<?php
defined('_JEXEC') or die;

class Sepatu 
{
    // css | less_compile | less_js
    const css_loader = 'less_compile'; 

    static public function countModules($positionPrefix, $count = 4)
    {
        $document = JFactory::getDocument();

        $positions = array();
        for($i = 0; $i < $count; $i++) {
            $positions[] = $positionPrefix.'-'.$i;
        }

        $paramString = implode(' or ', $positions);
        $rt = $document->countModules($paramString);
        //echo $paramString.' = '.(int)$rt.'<br/>';
        return $rt;
    }

    public function getPositionCount($positionPrefix, $count = 4) 
    {
        $document = JFactory::getDocument();

        $positionCount = 0;
        for($i = 0; $i < $count; $i++) {
            $position = $positionPrefix.'-'.$i;
            if($document->countModules($positionPrefix.'-'.$i)) {
                $positionCount++;
            }
        }

        return $positionCount;
    }

    public function getStylesheets()
    {
        $document = JFactory::getDocument();
        if(self::css_loader == 'less_compile') {
            $templateLess = JPATH_SITE.'/templates/'.$document->template.'/less/template.less';
            $templateCss = JPATH_SITE.'/templates/'.$document->template.'/css/template.css';
            $command = '/usr/bin/plessc '.$templateLess.' > '.$templateCss;
            exec($command);
            $html[] = '<link rel="stylesheet" href="'.$document->baseurl.'/templates/'.$document->template.'/css/template.css" media="screen" />';

        } elseif(self::css_loader == 'less_js') {
            $html[] = '<link rel="stylesheet/less" href="'.$document->baseurl.'/templates/'.$document->template.'/less/template.less" media="screen" />';

        } else {
            $html[] = '<link rel="stylesheet" href="'.$document->baseurl.'/templates/'.$document->template.'/css/template.min.css" media="screen" />';
        }

        return implode("\n", $html);
    }

    public function getScripts()
    {
        $document = JFactory::getDocument();
        $html = array();
        if(self::css_loader == 'less_js') {
            $html[] = '<script type="text/javascript">less = {env: "development",async: false,fileAsync: false};</script>';
            $html[] = '<script src="'.$document->baseurl.'/templates/'.$document->template.'/js/less.js?v=2"></script>';
        }
        
        if(!empty($html)) {
            return implode("\n", $html);
        }
        return null;
    }

    public function getGoogleFonts($fonts)
    {
        return '<link href="http://fonts.googleapis.com/css?family='.implode('|', $fonts).'" rel="stylesheet" type="text/css" />';
    }
}
