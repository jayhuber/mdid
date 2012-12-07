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
 * Prints a particular instance of mdid
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod
 * @subpackage mdid
 * @copyright  2012 Jay Huber - Columbia College Chicago
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/// (Replace mdid with the name of your module and remove this line)

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT); // course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // mdid instance ID - it should be named as the first character of the module

if ($id) {
    $cm         = get_coursemodule_from_id('mdid', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $mdid       = $DB->get_record('mdid', array('id' => $cm->instance), '*', MUST_EXIST);
} elseif ($n) {
    $mdid       = $DB->get_record('mdid', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $mdid->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('mdid', $mdid->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);
$context = get_context_instance(CONTEXT_MODULE, $cm->id);

add_to_log($course->id, 'mdid', 'view', "view.php?id={$cm->id}", $mdid->name, $cm->id);

/// Print the page header

$PAGE->set_url('/mod/mdid/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($mdid->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($context);

// other things you may want to set - remove if not needed
//$PAGE->set_cacheable(false);
//$PAGE->set_focuscontrol('some-html-id');
//$PAGE->add_body_class('mdid-'.$somevar);

// Output starts here
echo $OUTPUT->header();

$config_login = $DB->get_record("config_plugins", array("plugin" => "mdid", "name" => "login"));
$config_password = $DB->get_record("config_plugins", array("plugin" => "mdid", "name" => "password"));

if ($mdid->intro) { // Conditions to show the intro can change to look for own settings or whatever
    echo $OUTPUT->box(format_module_intro('mdid', $mdid, $cm->id), 'generalbox mod_introbox', 'mdidintro');
}

$server_name = $_SERVER["SERVER_NAME"].(preg_replace('/\/mod\/mdid.*/', '', $_SERVER["REQUEST_URI"]));
echo $OUTPUT->box('<script>setTimeout(function(){document.getElementById("mdid_frame").src = "'.$mdid->url.'";},1000);</script><iframe id="mdid_frame" src="http://'.$server_name.'/mod/mdid/mdid_login.php?login='.$config_login->value.'&password='.$config_password->value.'" width="100%" height="800"></iframe>', 'generalbox mod_introbox', 'mdidurl');

// Finish the page
echo $OUTPUT->footer();
