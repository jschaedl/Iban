<?php
namespace IBAN\Generation;

use IBAN\Generation\IBANGenerator;

class Rule005600Test extends \PHPUnit_Framework_TestCase
{
	public function testGenerateIban() {
		$this->assertIban('DE29380101111010240003', IBANGenerator::DE('36', '1010240003'));
		$this->assertIban('DE55480101111328506100', IBANGenerator::DE('50', '1328506100'));
		$this->assertIban('DE26430101111826063000', IBANGenerator::DE('99', '1826063000'));
		$this->assertIban('DE52250101111015597802', IBANGenerator::DE('110', '1015597802'));
		$this->assertIban('DE13380101111010240000', IBANGenerator::DE('240', '1010240000'));
		$this->assertIban('DE15380101111011296100', IBANGenerator::DE('333', '1011296100'));
		$this->assertIban('DE54100101111600220800', IBANGenerator::DE('555', '1600220800'));
		$this->assertIban('DE42390101111000556100', IBANGenerator::DE('556', '1000556100'));
		$this->assertIban('DE70250101111967153801', IBANGenerator::DE('606', '1967153801'));
		$this->assertIban('DE92265101111070088000', IBANGenerator::DE('700', '1070088000'));
		$this->assertIban('DE72250101111006015200', IBANGenerator::DE('777', '1006015200'));
		$this->assertIban('DE83380101111010240001', IBANGenerator::DE('999', '1010240001'));
		$this->assertIban('DE91250101111369152400', IBANGenerator::DE('1234', '1369152400'));
		$this->assertIban('DE48570101111017500000', IBANGenerator::DE('1313', '1017500000'));
		$this->assertIban('DE81370101111241113000', IBANGenerator::DE('1888', '1241113000'));
		$this->assertIban('DE30250101111026500901', IBANGenerator::DE('1953', '1026500901'));
		$this->assertIban('DE47670101111547620500', IBANGenerator::DE('1998', '1547620500'));
		$this->assertIban('DE62250101111026500907', IBANGenerator::DE('2007', '1026500907'));
		$this->assertIban('DE45370101111635100100', IBANGenerator::DE('4004', '1635100100'));
		$this->assertIban('DE88670101111304610900', IBANGenerator::DE('4444', '1304610900'));
		$this->assertIban('DE20250101111395676000', IBANGenerator::DE('5000', '1395676000'));
		$this->assertIban('DE96290101111611754300', IBANGenerator::DE('5510', '1611754300'));
		$this->assertIban('DE43500101111000400200', IBANGenerator::DE('6060', '1000400200'));
		$this->assertIban('DE02670101111296401301', IBANGenerator::DE('6800', '1296401301'));
		$this->assertIban('DE13380101111027758200', IBANGenerator::DE('55555', '1027758200'));
		$this->assertIban('DE98500101111005007001', IBANGenerator::DE('60000', '1005007001'));
		$this->assertIban('DE10200101111299807801', IBANGenerator::DE('666666', '1299807801'));
		$this->assertIban('DE59370101111837501600', IBANGenerator::DE('102030', '1837501600'));
		$this->assertIban('DE48700101111249461502', IBANGenerator::DE('121212', '1249461502'));
		$this->assertIban('DE78300101111413482100', IBANGenerator::DE('130500', '1413482100'));
		$this->assertIban('DE24370101111213431002', IBANGenerator::DE('202020', '1213431002'));
		$this->assertIban('DE59380101111010555101', IBANGenerator::DE('414141', '1010555101'));
		$this->assertIban('DE49200101111798758900', IBANGenerator::DE('666666', '1798758900'));
		$this->assertIban('DE62370101111403124100', IBANGenerator::DE('500500500', '1403124100'));
		$this->assertIban('DE17600101111045720000', IBANGenerator::DE('500500500', '1045720000'));
	}

	private function assertIban($ibanExpected, $ibanActual) {
		$this->assertEquals($ibanExpected, trim($ibanActual));
	}
}
