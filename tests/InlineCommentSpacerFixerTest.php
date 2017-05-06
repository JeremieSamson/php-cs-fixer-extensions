<?php

declare(strict_types=1);

namespace SlamCsFixer\Tests;

use PhpCsFixer\FixerDefinition\FixerDefinition;

final class InlineCommentSpacerFixerTest extends AbstractFixerTestCase
{
	public function testDefinition()
	{
		$this->assertInstanceOf(FixerDefinition::class, $this->fixer->getDefinition());
	}

    /**
     * @dataProvider provideCases
     */
    public function testFix($expected, $input = null)
    {
        $this->doTest($expected, $input);
    }

    public function provideCases()
    {
        return array(
            array(
                '<?php // test',
                '<?php //test',
            ),
            array(
                '<?php //  test',
            ),
            array(
                '<?php /*test*/',
            ),
        );
    }
}
