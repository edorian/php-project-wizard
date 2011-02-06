<?php

class PPW_Template_BuildXmlProcessor extends PPW_Template_TemplateProcessor {

    protected $generated;
    protected $projectName;

    public function setGenerated($generated) {
        $this->generated = $generated;
    }

    public function setProjectName($projectName) {
        $this->projectName = $projectName;
    }

    public function render() {
        $this->template->setVar(
            array(
                "generated" => $this->generated,
                "project_name" => $this->projectName
            )
        );
        parent::render();
    }
}

