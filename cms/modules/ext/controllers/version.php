<?php
/**
 *
 */
class ExtController_Version Extends Controller_Base
{

    public function index()
    {
        $this->setContent(Config::__("ext")->version);
    }
}

?>
