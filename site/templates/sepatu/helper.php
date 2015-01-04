<?php
/**
 * Joomla! template Sepatu
 *
 * @author Yireo (info@yireo.com)
 * @copyright Copyright 2015
 * @license GNU Public License
 * @link http://www.yireo.com
 */

defined('_JEXEC') or die;

class SepatuTemplateHelper
{
    public function __construct($params)
    {
        $this->params = $params;
        $this->document = JFactory::getDocument();
    }

    public function countModules($positionPrefix, $count = 4)
    {
        $positions = array();
        for($i = 0; $i < $count; $i++) {
            $positions[] = $positionPrefix.'-'.$i;
        }

        $paramString = implode(' or ', $positions);
        $rt = $this->document->countModules($paramString);
        //echo $paramString.' = '.(int)$rt.'<br/>';
        return $rt;
    }

    public function getPositionCount($positionPrefix, $count = 4) 
    {
        $positionCount = 0;
        for($i = 0; $i < $count; $i++) {
            $position = $positionPrefix.'-'.$i;
            if($this->document->countModules($positionPrefix.'-'.$i)) {
                $positionCount++;
            }
        }

        return $positionCount;
    }

    public function getStylesheets()
    {
        $css_output = $this->params->get('css_output', 'less_js');

        if($css_output == 'less_exec') {
            $templateLess = JPATH_SITE.'/templates/'.$this->document->template.'/less/template.less';
            $templateCss = JPATH_SITE.'/templates/'.$this->document->template.'/css/template.css';
            $command = '/usr/bin/plessc '.$templateLess.' > '.$templateCss;
            exec($command);
            $html[] = '<link rel="stylesheet" href="'.$this->document->baseurl.'/templates/'.$this->document->template.'/css/template.css" media="screen" />';

        } elseif($css_output == 'less_js') {
            $html[] = '<link rel="stylesheet/less" href="'.$this->document->baseurl.'/templates/'.$this->document->template.'/less/template.less" media="screen" />';

        } elseif($css_output == 'css_min') {
            $html[] = '<link rel="stylesheet" href="'.$this->document->baseurl.'/templates/'.$this->document->template.'/css/template.min.css" media="screen" />';

        } else {
            $html[] = '<link rel="stylesheet" href="'.$this->document->baseurl.'/templates/'.$this->document->template.'/css/template.css" media="screen" />';
        }

        return implode("\n", $html);
    }

    public function getScripts()
    {
        $css_output = $this->params->get('css_output', 'less_js');

        $html = array();
        if($css_output == 'less_js') {
            $html[] = '<script type="text/javascript">less = {env: "development",async: false,fileAsync: false};</script>';
            $html[] = '<script src="'.$this->document->baseurl.'/templates/'.$this->document->template.'/js/less.js?v=2"></script>';
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
