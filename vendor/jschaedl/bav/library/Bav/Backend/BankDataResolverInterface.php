<?php
namespace Bav\Backend;

interface BankDataResolverInterface
{
	public function getBank($bankID);

	public function bankExists($bankID);
}
