<?php

class PPW_Processor_AntTest extends PHPUnit_Framework_TestCase {

    public function testRender()
    {
        $template = $this->getMock("Text_Template");
        $template->expects($this->at(0))
                 ->method("setVar")
                 ->with(array(
                        "source_property" => "MySource"
                    )
                 );
        $template->expects($this->at(1))
                 ->method("setVar")
                 ->with(array(
                        "generated" => "123",
                        "project_name" => "MyProject",
                    )
                 );
        $template->expects($this->once())
                 ->method("renderTo")
                 ->with("OutputPath");
        $antProcessor = new PPW_Processor_Ant($template, "OutputPath");
        $antProcessor->setGenerated("123");
        $antProcessor->setProjectName("MyProject");
        $antProcessor->setSourcesFolder("MySource");
        $antProcessor->render();
    }

}

