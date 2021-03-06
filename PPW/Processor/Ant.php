<?php
/**
 * PHP Project Wizard (PPW)
 *
 * Copyright (c) 2011, Sebastian Bergmann <sb@sebastian-bergmann.de>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Sebastian Bergmann nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package   PPW
 * @author    Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @copyright 2009-2011 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @since     File available since Release 1.0.2
 */

/**
 * Processor for Apache Ant build script.
 *
 * @author    Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @copyright 2011 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @version   Release: @package_version@
 * @link      http://github.com/sebastianbergmann/php-project-wizard/tree
 * @since     Class available since Release 1.0.2
 */
class PPW_Processor_Ant extends PPW_Processor
{
    /**
     * @var string
     */
    protected $apidoc;

    /**
     * @var string
     */
    protected $phpcs;

    /**
     * @var string
     */
    protected $phpmd;

    /**
     * @param string $projectName
     */
    public function setApiDoc($apidoc)
    {
        $this->apidoc = $apidoc;
    }

    /**
     * @param string $projectName
     */
    public function setPHPCSRules($rules)
    {
        $this->phpcs = $rules;
    }

    /**
     * @param string $projectName
     */
    public function setPHPMDRules($rules)
    {
        $this->phpmd = $rules;
    }

    /**
     * @param boolean $force
     */
    public function render($force)
    {
        $this->template->setVar(
          array(
            'source_property'       => strtr($this->source, ',', ' '),
            'source_property_comma' => $this->source,
            'phpcs_rules'           => $this->phpcs,
            'phpmd_rules'           => $this->phpmd,
            'apidoc'                => $this->apidoc
          )
        );

        parent::render($force);
    }
}
