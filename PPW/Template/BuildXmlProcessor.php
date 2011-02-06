<?php

class PPW_Template_BuildXmlProcessor extends PPW_Template_TemplateProcessor {

    protected $generated;
    protected $projectName;
    protected $source;

    public function setGenerated($generated)
    {
        $this->generated = $generated;
    }

    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;
    }

    public function setSourcesFolder($source)
    {
        $this->source = $source;
    }

    public function render()
    {
        $this->template->setVar(
            array(
                "generated" => $this->generated,
                "project_name" => $this->projectName,
                "source_property" => $this->source
            )
        );
        parent::render();
    }
}

