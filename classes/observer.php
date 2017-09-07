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

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.'); // It must be included from a Moodle page.
}

require_once($CFG->dirroot.'/plagiarism/safeassign/lib.php');

/**
 * Event observers used in SafeAssign Plagiarism plugin.
 *
 * @package   plagiarism_safeassign
 * @copyright Copyright (c) 2017 Blackboard Inc.
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class plagiarism_safeassign_observer {

    /**
     * Upload a forum file
     * @param  \mod_forum\event\assessable_uploaded $event Event
     * @return void
     */
    public static function forum_file_uploaded(
        \mod_forum\event\assessable_uploaded $event) {

    }

    /**
     * Upload a workshop file
     * @param  \mod_workshop\event\assessable_uploaded $event Event
     * @return void
     */
    public static function workshop_file_uploaded(
        \mod_workshop\event\assessable_uploaded $event) {

    }

    /**
     * Uploads an online submission text.
     * @param  \assignsubmission_onlinetext\event\assessable_uploaded $event Event
     * @return void
     */
    public static function assignsubmission_onlinetext_uploaded(
        \assignsubmission_onlinetext\event\assessable_uploaded $event) {
        $eventdata = $event->get_data();
        $safeassign = new plagiarism_plugin_safeassign();
        $safeassign->create_submission($eventdata);
    }

    /**
     * Uploads a submission file.
     * @param  \assignsubmission_file\event\assessable_uploaded $event Event
     * @return void
     */
    public static function assignsubmission_file_uploaded(
        \assignsubmission_file\event\assessable_uploaded $event) {
        $eventdata = $event->get_data();
        $safeassign = new plagiarism_plugin_safeassign();
        $safeassign->create_submission($eventdata);
    }

}