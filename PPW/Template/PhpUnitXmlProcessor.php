<?php

class PPW_Template_PhpUnitXmlProcessor extends PPW_Template_TemplateProcessor {

    protected $generated;
    protected $projectName;
    protected $source;
    protected $bootstrap;

    public function setGenerated($generated) {
        $this->generated = $generated;
    }

    public function setProjectName($projectName) {
        $this->projectName = $projectName;
    }

    public function setSourcesFolder($source) {
        $this->source = $source;
    }

    public function setBootstrapFile($bootstrap) {
        $this->bootstrap = $bootstrap;
    }

    public function render() {
        $this->template->setVar(
            array(
                'generated'    => $this->generated,
                'project_name' => $this->projectName,
                'source'       => $this->source,
                'bootstrap'    => $this->bootstrap
            )
        );
        parent::render();
    }
}

