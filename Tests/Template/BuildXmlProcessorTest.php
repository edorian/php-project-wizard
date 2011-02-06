<?php

class PPW_Template_BuildXmlProcessorTest extends PHPUnit_Framework_TestCase {

    public function testRender() {
        $template = $this->getMock("Text_Template");
        $template->expects($this->once())
                 ->method("setVar")
                 ->with(array(
                    "generated" => "123",
                    "project_name" => "MyProject",
                    "source_property" => "MySource"
                    ));
        $template->expects($this->once())
                 ->method("renderTo")
                 ->with("OutputPath");
        $buildXmlProcessor = new PPW_Template_BuildXmlProcessor($template, "OutputPath");
        $buildXmlProcessor->setGenerated("123");
        $buildXmlProcessor->setProjectName("MyProject");
        $buildXmlProcessor->setSourcesFolder("MySource");
        $buildXmlProcessor->render();
    }

}
