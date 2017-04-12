<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\CreateUserHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\CreateUserHelper Test Case
 */
class CreateUserHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\CreateUserHelper
     */
    public $CreateUser;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->CreateUser = new CreateUserHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CreateUser);

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
