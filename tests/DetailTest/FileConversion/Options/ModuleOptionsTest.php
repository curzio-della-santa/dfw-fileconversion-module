<?php

namespace DetailTest\FileConversion\Options;

use Detail\FileConversion\Options;

class ModuleOptionsTest extends OptionsTestCase
{
    /**
     * @var Options\ModuleOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = $this->getOptions(
            Options\ModuleOptions::CLASS,
            array(
                'getClient',
                'setClient',
                'getJobBuilder',
                'setJobBuilder',
            )
        );
    }

    public function testClientCanBeSet()
    {
        $clientOptions = array('base_url' => 'some-url');

        $this->assertNull($this->options->getClient());

        $this->options->setClient($clientOptions);

        $client = $this->options->getClient();

        $this->assertInstanceOf(Options\Client\FileConversionClientOptions::CLASS, $client);
        $this->assertEquals($clientOptions['base_url'], $client->getBaseUrl());
    }

    public function testJobBuilderCanBeSet()
    {
        $jobBuilderOptions = array('default_options' => array('key' => 'value'));

        $this->assertNull($this->options->getJobBuilder());

        $this->options->setJobBuilder($jobBuilderOptions);

        $jobBuilder = $this->options->getJobBuilder();

        $this->assertInstanceOf(Options\Job\JobBuilderOptions::CLASS, $jobBuilder);
        $this->assertEquals($jobBuilderOptions['default_options'], $jobBuilder->getDefaultOptions());
    }
}
