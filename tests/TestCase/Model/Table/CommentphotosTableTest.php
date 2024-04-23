<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommentphotosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommentphotosTable Test Case
 */
class CommentphotosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CommentphotosTable
     */
    protected $Commentphotos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Commentphotos',
        'app.Photos',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Commentphotos') ? [] : ['className' => CommentphotosTable::class];
        $this->Commentphotos = $this->getTableLocator()->get('Commentphotos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Commentphotos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CommentphotosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CommentphotosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
