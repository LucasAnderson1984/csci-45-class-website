<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\UpdatePasswordHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\UpdatePasswordHelper Test Case
 */
class UpdatePasswordHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\UpdatePasswordHelper
     */
    public $UpdatePassword;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->UpdatePassword = new UpdatePasswordHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UpdatePassword);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
