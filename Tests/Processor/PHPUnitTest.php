<?php

class PPW_Processor_PHPUnitTest extends PHPUnit_Framework_TestCase {

    public function testRender() {
        $template = $this->getMock("Text_Template");
        $template->expects($this->at(0))
                 ->method("setVar")
                 ->with(
                    array(
                        "bootstrap" => "MyBootstrap",
                        "source" => "MySource",
                        "tests" => "MyTests",
                    )
                 );
        $template->expects($this->at(1))
                 ->method("setVar")
                 ->with(
                    array(
                        "generated" => "123",
                        "project_name" => "MyProject",
                    )
                 );
        $template->expects($this->once())
                 ->method("renderTo")
                 ->with("OutputPath");
        $buildXmlProcessor = new PPW_Processor_PHPUnit($template, "OutputPath");
        $buildXmlProcessor->setGenerated("123");
        $buildXmlProcessor->setProjectName("MyProject");
        $buildXmlProcessor->setSourcesFolder("MySource");
        $buildXmlProcessor->setTestsFolder("MyTests");
        $buildXmlProcessor->setBootstrapFile("MyBootstrap");
        $buildXmlProcessor->render();
    }

}
