<?php

abstract class PPW_Template_TemplateProcessor {

    protected $template;
    protected $target;

    public function __construct(Text_Template $template, $target)
    {
        $this->template = $template;
        $this->target   = $target;
    }

    public function render()
    {
        $this->template->renderTo($this->target);
    }

}

