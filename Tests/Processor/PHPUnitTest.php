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
        $phpunitProcessor = new PPW_Processor_PHPUnit($template, "OutputPath");
        $phpunitProcessor->setGenerated("123");
        $phpunitProcessor->setProjectName("MyProject");
        $phpunitProcessor->setSourcesFolder("MySource");
        $phpunitProcessor->setTestsFolder("MyTests");
        $phpunitProcessor->setBootstrapFile("MyBootstrap");
        $phpunitProcessor->render();
    }

}
