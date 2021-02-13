<?php

namespace IAmKevinMcKee\ManyToMany\Tests;

use Orchestra\Testbench\TestCase;
use IAmKevinMcKee\ManyToMany\ManyToManyServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [ManyToManyServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
