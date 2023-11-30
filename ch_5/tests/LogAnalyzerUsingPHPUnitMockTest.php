<?php declare(strict_types=1);
namespace ch_5\tests;

use PHPUnit\Framework\TestCase;
use ch_5\src\FileNameRules;
use ch_5\src\LoggerInterface;
use ch_5\src\WebServiceInterface;
use ch_5\src\LogAnalyzer;
use ch_5\src\LogAnalyzer2;

class LogAnalyzerUsingPHPUnitMockTest extends TestCase
{
        /** @test */
        public function analyze_TooShortFileName_CallLogger()
        {
            // 建立模擬物件
            $logger = $this->createMock(LoggerInterface::class);
            // 使用 PHPUnit API 來設定期望結果
            $logger->expects($this->once())
                    ->method('logError')
                    ->with($this->equalTo('Filename too short: a.txt'));
    
            $analyzer = new LogAnalyzer($logger);
            $analyzer->minNameLength = 6;
            $analyzer->analyze("a.txt");
        }
    
        /** @test */
        public function returns_ByDefault_WorksForHardCodedArgument()
        {
            $fakeRules = $this->createMock(FileNameRules::class);
            // 強制方法被呼叫時要回傳假的值
            $fakeRules->expects($this->once())
                ->method('isValidFileName')
                ->with('strict.txt')
                ->willReturn(true);
    
            $this->assertTrue($fakeRules->isValidFileName('strict.txt'));
        }
    
        /** @test */
        public function analyze_LoggerThrows_CallsWebService()
        {
            $mockWebService = $this->createMock(WebServiceInterface::class);
            // 確認 web 服務的模擬物件有被正確呼叫, 而且傳入的字串參數包含了 fake exception 的內容
            $mockWebService
                ->expects($this->once())
                ->method('write')
                ->with($this->stringContains('fake exception'));
    
            $stubLogger = $this->createMock(LoggerInterface::class);
            // 不論輸入任何參數, 模擬拋出例外的行為
            $stubLogger->method('logError')
                ->will($this->throwException(new \Exception("fake exception")));
    
            $analyzer2 = new LogAnalyzer2($stubLogger, $mockWebService);
            $analyzer2->minNameLength = 8;
            $tooShortFileName = "abc.ext";
            $analyzer2->analyze($tooShortFileName);
        }
}