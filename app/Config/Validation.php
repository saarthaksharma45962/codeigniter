<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;
use \Myth\Auth\Authentication\Passwords\ValidationRules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
		ValidationRules::class
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
		'my_single' => 'errors\_single_error' // new template customising error view inherited
	];

	//--------------------------------------------------------------------
	// Rules defined for checking the fields entered
	//--------------------------------------------------------------------
	public $rules = [
		'inputName' => 'required|alpha_space',
		'inputDescription' => 'required',
		'inputStatus' => 'required',
		'inputProjectLeader' => 'required|alpha_space',
		'inputClientCompany' => 'required|alpha_space',
		'inputEstimatedBudget' => 'required|greater_than_equal_to[0]',
		'inputSpentBudget' => 'required|greater_than_equal_to[0]',
		'inputEstimatedDuration' => 'required|greater_than_equal_to[0]'

	];
}
