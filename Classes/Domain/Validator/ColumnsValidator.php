<?php
namespace TYPO3\CMS\Vidi\Domain\Validator;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Fabien Udriot <fabien.udriot@typo3.org>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use TYPO3\CMS\Vidi\Tca\TcaService;

/**
 * Validate "columns" to be displayed in the BE module.
 */
class ColumnsValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator {

	/**
	 * Check if $columns is valid. If it is not valid, throw an exception.
	 *
	 * @param mixed $columns
	 * @return void
	 */
	public function isValid($columns) {

		foreach ($columns as $columnName) {
			if (TcaService::grid()->hasNotField($columnName)) {
				$message = sprintf('Column "%s" is not allowed. Actually, it was not configured to be displayed in the grid.', $columnName);
				$this->addError($message , 1380019718);
			}
		}
	}
}

?>