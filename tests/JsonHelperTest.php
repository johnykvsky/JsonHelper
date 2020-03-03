<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ArrayHelperTest extends TestCase
{
    private $inputArray = array('name'=>'Johny');
    private $inputJson = '{"name":"Johny"}';

    public function testEncode()
    {
        $result = johnykvsky\Utils\JsonHelper::encode($this->inputArray);
        $this->assertEquals($this->inputJson, $result);
    }

    public function testBadEncode()
    {
        $this->expectException(\Exception::class);
        $result = johnykvsky\Utils\JsonHelper::encode(urldecode('bad utf string %C4_'));
    }

    public function testDecode()
    {
        $result = johnykvsky\Utils\JsonHelper::decode($this->inputJson);
        $this->assertEquals($this->inputArray, $result);
    }

    public function testBadDecode()
    {
        $this->expectException(\Exception::class);
        $result = johnykvsky\Utils\JsonHelper::decode('{"name:"Johny"}');
    }

    public function testValidJson()
    {
        $result = johnykvsky\Utils\JsonHelper::isValidJson($this->inputJson);
        $this->assertEquals(true, $result);
    }

    public function testInvalidJson()
    {
        $result = johnykvsky\Utils\JsonHelper::isValidJson($this->inputArray);
        $this->assertEquals(false, $result);
    }

    public function testConvertNewLinesToCRLFString()
    {
        $string = "put returns between paragraphs\x0D\x0Afor linebreak add 2 spaces at end";
        $fixed = "put returns between paragraphs\r\nfor linebreak add 2 spaces at end";
        $result = johnykvsky\Utils\JsonHelper::convertNewLinesToCRLF($string);
        $this->assertEquals($fixed, $result);
    }

    public function testConvertNewLinesToCRLFArray()
    {
        $array = ["put returns\x0D\x0Abetween" => "paragraphs\x0D\x0Afor linebreak add 2 spaces at end"];
        $fixed = ["put returns\r\nbetween" => "paragraphs\r\nfor linebreak add 2 spaces at end"];
        $result = johnykvsky\Utils\JsonHelper::convertNewLinesToCRLF($array);
        $this->assertEquals($fixed, $result);
    }
}
