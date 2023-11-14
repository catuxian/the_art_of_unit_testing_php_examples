<?php
require_once 'SimpleParser.php';

class SimpleParserTests {

    public static function testReturnsZeroWhenEmptyString() {
        try {
            $parser = new SimpleParser();
            $result = $parser->parseAndSum('');

            if ($result !== 0) {
                echo "***SimpleParserTests.testReturnsZeroWhenEmptyString: ------- Parse and sum should have returned 0 on an empty string\n";
            }
        } catch (Exception $e) {
            echo $e . "\n";
        }
    }
}

try {
    SimpleParserTests::testReturnsZeroWhenEmptyString();
} catch (Exception $e) {
    echo $e . "\n";
}


