<?php
/******************************************************************************
 *                                                                            *
 *    This file is part of RPB Chessboard, a Wordpress plugin.                *
 *    Copyright (C) 2013-2014  Yoann Le Montagner <yo35 -at- melix.net>       *
 *                                                                            *
 *    This program is free software: you can redistribute it and/or modify    *
 *    it under the terms of the GNU General Public License as published by    *
 *    the Free Software Foundation, either version 3 of the License, or       *
 *    (at your option) any later version.                                     *
 *                                                                            *
 *    This program is distributed in the hope that it will be useful,         *
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of          *
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           *
 *    GNU General Public License for more details.                            *
 *                                                                            *
 *    You should have received a copy of the GNU General Public License       *
 *    along with this program.  If not, see <http://www.gnu.org/licenses/>.   *
 *                                                                            *
 ******************************************************************************/


require_once(RPBCHESSBOARD_ABSPATH.'models/traits/abstracttrait.php');
require_once(RPBCHESSBOARD_ABSPATH.'helpers/validation.php');


/**
 * Trait for loading the options controlling the aspect of chessboard widgets
 * and passed by a short-code attribute.
 */
class RPBChessboardTraitChessWidgetCustom extends RPBChessboardAbstractTrait
{
	private $allParameters;
	private $flip           ;
	private $squareSize     ;
	private $showCoordinates;


	/**
	 * Constructor.
	 *
	 * @param array $atts
	 */
	public function __construct($atts)
	{
		$this->flip            = isset($atts['flip'            ]) ? RPBChessboardHelperValidation::validateBoolean   ($atts['flip'            ]) : null;
		$this->squareSize      = isset($atts['square_size'     ]) ? RPBChessboardHelperValidation::validateSquareSize($atts['square_size'     ]) : null;
		$this->showCoordinates = isset($atts['show_coordinates']) ? RPBChessboardHelperValidation::validateBoolean   ($atts['show_coordinates']) : null;
	}


	/**
	 * Return all the non-null parameters in a "key => value" array.
	 *
	 * @return array
	 */
	public function getCustomAll()
	{
		if(!isset($this->allParameters)) {
			$this->allParameters = array();
			$this->appendParameter('flip'           , $this->flip           );
			$this->appendParameter('squareSize'     , $this->squareSize     );
			$this->appendParameter('showCoordinates', $this->showCoordinates);
		}
		return $this->allParameters;
	}


	/**
	 * Auxilliary function used to build the array `$this->allParameters`.
	 *
	 * @param string $key
	 * @param mixed $value
	 */
	private function appendParameter($key, $value)
	{
		if(isset($value)) {
			$this->allParameters[$key] = $value;
		}
	}


	/**
	 * Custom flip-board parameter for the chessboard widgets.
	 *
	 * @return boolean May be null if this parameter is let undefined.
	 */
	public function getCustomFlip()
	{
		return $this->flip;
	}


	/**
	 * Custom square size for the chessboard widgets.
	 *
	 * @return int May be null if this parameter is let undefined.
	 */
	public function getCustomSquareSize()
	{
		return $this->squareSize;
	}


	/**
	 * Custom show-coordinates parameter for the chessboard widgets.
	 *
	 * @return boolean May be null if this parameter is let undefined.
	 */
	public function getCustomShowCoordinates()
	{
		return $this->showCoordinates;
	}
}
