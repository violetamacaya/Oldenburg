<?php
namespace Plugin\Install;

class Request extends \Ip\Request {



    //original function requires database access
    protected function isWebsiteRoot()
    {
        return true;
    }


}
