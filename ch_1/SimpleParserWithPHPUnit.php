<?php
require_once 'vendor/autoload.php';
require_once 'SimpleParser.php';

use PHPUnit\Framework\TestCase;

class SimpleParserWithPHPUnit extends TestCase {

    public function testReturnsZeroWhenEmptyString() {
        try {
            $parser = new SimpleParser();
            $result = $parser->parseAndSum('');

            $this->assertEquals(0, $result, "Parse and sum should have returned 0 on an empty string");
        } catch (\Exception $e) {
            $this->fail("An unexpected exception occurred: " . $e->getMessage());
        }
    }
}
