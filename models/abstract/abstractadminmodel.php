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


require_once(RPBCHESSBOARD_ABSPATH.'models/abstract/abstractmodel.php');


/**
 * Base class for the models used in the backend of the RPBChessboard plugin.
 */
abstract class RPBChessboardAbstractAdminModel extends RPBChessboardAbstractModel
{
	private $postAction;


	public function getViewName()
	{
		return 'Admin';
	}


	/**
	 * Title of the page in the backend.
	 *
	 * @return string
	 */
	public abstract function getTitle();


	/**
	 * Return the name of the action that should be performed by the server.
	 * The action is initiated by the user when clicking on a "submit" button in
	 * an HTML form with its method attribute set to POST.
	 *
	 * This function may return an empty string if no action is required.
	 *
	 * @return string
	 */
	public function getPostAction()
	{
		if(!isset($this->postAction)) {
			$this->postAction = isset($_POST['rpbchessboard_action']) ? $_POST['rpbchessboard_action'] : '';
		}
		return $this->postAction;
	}
}
