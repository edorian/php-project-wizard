<?php

class PPW_Template_BuildPropertiesProcessor extends PPW_Template_TemplateProcessor {

    protected $source;
    protected $tests;

    public function setSourcesFolder($source) {
        $this->source = $source;
    }    

    public function setTestsFolder($tests) {
        if(strpos($tests, ",") !== false) {
            $tests = strtr($tests, ",", " ");
        }
        $this->tests = $tests;
    }

    public function render() {
        $this->template->setVar(
            array(
                'source' => $this->source,
                'tests'  => $this->tests
            )
        );
        parent::render();
    }
}

