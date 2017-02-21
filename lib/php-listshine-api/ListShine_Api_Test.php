<?php
// use PHPUnit\Framework\TestCase;
require_once "ListShine_Api.php";
/**
 * Created by PhpStorm.
 * User: porcic
 * Date: 09-Dec-16
 * Time: 16:16
 */

class ApiTest extends PHPUnit_Framework_TestCase {
    public function testGetContactlist(){
         $connection = new ListShine_Api("0ad4888c94f95ea2a002201f0ef5b9ad6919b5a5");
         $forms = $connection->getContactlists();
         $valid_response = "200";
         $this->assertEquals($forms['http_code'], $valid_response);
    }

    public function testRetrieve(){
        $connection = new ListShine_Api("0ad4888c94f95ea2a002201f0ef5b9ad6919b5a5");
        $forms = $connection->retrieve("6c12d48e-f9b5-4550-8603-355176c4404c","getuser@test.com");
        $valid_response = array("user_id"=>"AVoD7u_QJAj_3NNeveJg","http_code"=>"200");
        $this->assertEquals($forms, $valid_response);
    }

    public function testSubscribeUser(){
        $connection = new ListShine_Api("0ad4888c94f95ea2a002201f0ef5b9ad6919b5a5");
        $forms = $connection->subscribeUser("6c12d48e-f9b5-4550-8603-355176c4404c","porcicmarioaddedfromunit@gmail.com",array("firstname"=>"mario"));
        $valid_response = "200";
        $this->assertEquals($forms, $valid_response);
    }

    public function testUnsubscribeUser(){
        $connection = new ListShine_Api("0ad4888c94f95ea2a002201f0ef5b9ad6919b5a5");
        $forms = $connection->unsubscribeUser("6c12d48e-f9b5-4550-8603-355176c4404c","porcicmariounsub@gmail.com");
        $valid_response = "201";
        $this->assertEquals($forms, $valid_response);
    }

    public function testGetContactlistsWithForms(){
        $connection = new ListShine_Api("0ad4888c94f95ea2a002201f0ef5b9ad6919b5a5");
        $forms = $connection->getContactlistsWithForms();
        $valid_response = "200";
        $this->assertEquals($forms['http_code'],$valid_response);
    }

    public function testCurlInstalledCheck(){
        //this tests if curl-php is installed on the server
        //inspired by today's events

        $this->assertTrue(function_exists('curl_version'));
    }

    public function testFailGetContactlist(){
        $connection = new ListShine_Api("0ad4888c94f95ea2a002201f0ef5b9ad6919b5a5");
        $forms = $connection->getContactlists();
        $valid_response = "200";
        $this->assertFalse($valid_response != $forms['http_code']);
    }

    public function testFailGetUser(){
        $connection = new ListShine_Api("0ad4888c94f95ea2a002201f0ef5b9ad6919b5a5");
        $forms = $connection->retrieve("6c12d48e-f9b5-4550-8603-355176c4404c","getuser@test.com");
        $valid_response = array("user_id"=>"AVjyzDVj0pHLhs50RB73","http_code"=>"200");
        $this->assertTrue($forms != $valid_response);
    }

    public function failUnsubscribeUser(){
        $connection = new ListShine_Api("0ad4888c94f95ea2a002201f0ef5b9ad6919b5a5");
        $forms = $connection->unsubscribeUser("6c12d48e-f9b5-4550-8603-355176c4404c","porcicmariounsub@gmail.com");
        $valid_response = "201";
        $this->assertTrue($forms != $valid_response);
    }

    public function testFailSubscribeUser(){
        $connection = new ListShine_Api("0ad4888c94f95ea2a002201f0ef5b9ad6919b5a5");
        $forms = $connection->subscribeUser("6c12d48e-f9b5-4550-8603-355176c4404csa","porcicmarioaddedfromunit@gmail.com",array("firstname"=>"mario"));
        $valid_response = "201";
        $this->assertTrue($forms != $valid_response);
    }

    public function testFailGetContactlistsWithForms(){
        $connection = new ListShine_Api("0ad4888c94f95ea2a002201f0ef5b9ad6919b5a5");
        $forms = $connection->getContactlistsWithForms();
        $valid_response = "200";
        $this->assertFalse($forms['http_code'] != $valid_response);
    }

}