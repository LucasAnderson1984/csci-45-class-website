<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\UpdateUserHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\UpdateUserHelper Test Case
 */
class UpdateUserHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\UpdateUserHelper
     */
    public $UpdateUser;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->UpdateUser = new UpdateUserHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UpdateUser);

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
