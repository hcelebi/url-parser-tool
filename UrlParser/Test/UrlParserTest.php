<?php

use UrlParser\Url;

class UrlParserTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function ShouldBeReturnQueryParameters_AsArray()
    {
        $url = "http://www.gittigidiyor.com/arama/?k=nokia&fmt=1";
        $urlType = new Url($url);
        $this->assertTrue(is_array($urlType->getQuery()->toArray()));
    }


    /**
     * @test
     */
    public function ShouldBeReturnTrueHasSpec()
    {
        $url = "http://www.gittigidiyor.com/arama/?k=nokia&fmt=1&Spec=[Marka!Nokia]";
        $urlType = new Url($url);
        $this->assertTrue($urlType->getQuery()->has("Spec"));
    }


    /**
     * @test
     */
    public function ShouldBeReturnSpecValue()
    {
        $url = "http://www.gittigidiyor.com/arama/?k=nokia&fmt=1&Spec=[Marka!Nokia]";
        $urlType = new Url($url);
        $this->assertEquals("[Marka!Nokia]", $urlType->getQuery()->get("Spec"));
    }


    /**
     * @test
     */
    public function ShouldBeReturnUrl_AsArray()
    {
        $url = "http://www.gittigidiyor.com/arama/?k=nokia&fmt=1";
        $urlType = new Url($url);
        $this->assertTrue(is_array($urlType->toArray()));
    }


    /**
     *@test
     */
    public function ShouldBeReturnUrl_AsString()
    {
        $url = "http://www.gittigidiyor.com/arama/?k=nokia&fmt=1";
        $urlType = new Url($url);
        $this->assertEquals($url, $urlType->toString());
    }


    /**
     * @test
     */
    public function ShouldBeReturnQueryNewValue()
    {
        $url = "http://www.gittigidiyor.com/arama/?k=nokia&fmt=1";
        $urlType = new Url($url);
        $urlType->getQuery()->set("k", "iphone");
        $this->assertEquals("iphone", $urlType->getQuery()->get("k"));
    }


    /**
     * @test
     */
    public function ShouldBeReturnUrlStringWithNewQueryValue()
    {
        $url = "http://www.gittigidiyor.com/arama/?k=nokia&fmt=1";
        $urlType = new Url($url);
        $urlType->getQuery()->set("k", "iphone");
        $this->assertEquals("http://www.gittigidiyor.com/arama/?k=iphone&fmt=1", $urlType->toString());
    }


    /**
     * @test
     */
    public function ShouldBeReturnUrlStringWithNewPath()
    {
        $url = "http://www.gittigidiyor.com/arama/?k=nokia&fmt=1";
        $urlType = new Url($url);
        $urlType->setPath("/cep-telefonu");
        $string = $urlType->toString();
        $this->assertEquals("http://www.gittigidiyor.com/cep-telefonu?k=nokia&fmt=1", $urlType->toString());
    }

    /**
     * @test
     */
    public function ShouldBeReturnQueryKeys()
    {
        $url = "http://www.gittigidiyor.com/arama/?k=nokia&fmt=1";
        $urlType = new Url($url);
        $this->assertTrue($urlType->getQuery()->getKeys()->count() > 0);
    }

    /**
     * @test
     */
    public function ShouldBeReturnQueryKeys_IS_K()
    {
        $url = "http://www.gittigidiyor.com/arama/?k=nokia";
        $urlType = new Url($url);
        $this->assertTrue($urlType->getQuery()->getKeys()[0] == "k");
    }
}