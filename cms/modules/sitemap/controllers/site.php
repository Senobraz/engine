<?php
/* 
 * 
 */
class SitemapController_Site Extends Controller_Base
{
    public function index()
    {

    }

    public function template()
    {
        $this->setContent($this->config->template);
    }
}

?>
