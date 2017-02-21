<?php
require_once ("ListShine_Api_Base.php");
class ListShine_Api extends ListShine_Api_Base
{
    private $api_host;
    function __construct($api){
        $this->api_host = "http://dev-mariop.listshine.com/api/v1/";
        parent :: __construct($api, $this->api_host);
    }
}