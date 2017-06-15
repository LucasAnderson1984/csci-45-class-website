<?php
namespace App\Test\TestCase\Form;

use App\Form\CreateUserForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\CreateUserForm Test Case
 */
class CreateUserFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Form\CreateUserForm
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
        $this->CreateUser = new CreateUserForm();
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
