<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


/**
 * Global settings page for lightboxgallery
 *
 * @package   mod_mdid
 * @copyright 2012 Jay Huber - Columbia College Chicago
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__).'/locallib.php');

//Username / Login Name
$logindescription = get_string('configlogindesc', 'mdid');
$login = new admin_setting_configtext('login', get_string('configlogin', 'mdid'),
                $logindescription, 'student');
$login->plugin = 'mdid';
$settings->add($login);

//User Password / Login Pasword
$passworddescription = get_string('configpassworddesc', 'mdid');
$password = new admin_setting_configtext('password', get_string('configpassword', 'mdid'),
                $passworddescription, 'columbia');
$password->plugin = 'mdid';
$settings->add($password);
