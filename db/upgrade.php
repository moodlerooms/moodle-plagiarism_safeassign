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

defined('MOODLE_INTERNAL') || die();

/**
 * @global moodle_database $DB
 * @param int $oldversion
 * @return bool
 */
function xmldb_plagiarism_safeassign_upgrade($oldversion) {

    global $CFG, $DB;
    $dbman = $DB->get_manager();

    if ($oldversion < 2017080701) {

        // Define fields to be added to plagiarism_safeassign_files.
        $table = new xmldb_table('plagiarism_safeassign_files');
        $fields[] = new xmldb_field('uuid', XMLDB_TYPE_CHAR, '36', null, null, null, null, 'userid');
        $fields[] = new xmldb_field('supported', XMLDB_TYPE_INTEGER, '1', null, null, null, null, 'timesubmitted');
        $fields[] = new xmldb_field('submissionid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null, 'supported');
        $fields[] = new xmldb_field('fileid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null, 'submissionid');

        // Go through each field and add if it doesn't already exist.
        foreach ($fields as $field){
            // Conditionally launch add field.
            if (!$dbman->field_exists($table, $field)) {
                $dbman->add_field($table, $field);
            }
        }

        $key = new xmldb_key('submissionid', XMLDB_KEY_FOREIGN, array('submissionid'), 'assign_submission', array('id'));

        // Launch add key submissionid.
        $dbman->add_key($table, $key);

        $key = new xmldb_key('fileid', XMLDB_KEY_FOREIGN, array('fileid'), 'files', array('id'));

        // Launch add key fileid.
        $dbman->add_key($table, $key);

        // Changing type of field similarityscore on table plagiarism_safeassign_files to number.
        $field = new xmldb_field('similarityscore', XMLDB_TYPE_NUMBER, '3, 2', null, null, null, '0', 'reporturl');

        // Launch change of type for field similarityscore.
        $dbman->change_field_type($table, $field);

        // Define fields to be dropped from plagiarism_safeassign_files.
        $table = new xmldb_table('plagiarism_safeassign_files');
        $fields = [];
        $fields[] = new xmldb_field('identifier');
        $fields[] = new xmldb_field('filename');
        $fields[] = new xmldb_field('optout');
        $fields[] = new xmldb_field('statuscode');
        $fields[] = new xmldb_field('attempt');
        $fields[] = new xmldb_field('errorresponse');

        // Go through each field and drop if it exist.
        foreach ($fields as $field) {
            // Conditionally launch drop field.
            if ($dbman->field_exists($table, $field)) {
                $dbman->drop_field($table, $field);
            }
        }

        // Safeassign savepoint reached.
        upgrade_plugin_savepoint(true, 2017080701, 'plagiarism', 'safeassign');
    }

    if ($oldversion < 2017080702) {

        // Define table plagiarism_safeassign_course to be created.
        $table = new xmldb_table('plagiarism_safeassign_course');

        // Adding fields to table plagiarism_safeassign_course.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('uuid', XMLDB_TYPE_CHAR, '36', null, null, null, null);
        $table->add_field('courseid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);

        // Adding keys to table plagiarism_safeassign_course.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
        $table->add_key('courseid', XMLDB_KEY_FOREIGN, array('courseid'), 'course', array('id'));

        // Conditionally launch create table for plagiarism_safeassign_course.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Safeassign savepoint reached.
        upgrade_plugin_savepoint(true, 2017080702, 'plagiarism', 'safeassign');
    }

    if ($oldversion < 2017080703) {

        // Define table plagiarism_safeassign_assign to be created.
        $table = new xmldb_table('plagiarism_safeassign_assign');

        // Adding fields to table plagiarism_safeassign_assign.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('uuid', XMLDB_TYPE_CHAR, '36', null, null, null, null);
        $table->add_field('assignmentid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);

        // Adding keys to table plagiarism_safeassign_assign.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
        $table->add_key('assignmentid', XMLDB_KEY_FOREIGN, array('assignmentid'), 'assign', array('id'));

        // Conditionally launch create table for plagiarism_safeassign_assign.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Safeassign savepoint reached.
        upgrade_plugin_savepoint(true, 2017080703, 'plagiarism', 'safeassign');
    }

    if ($oldversion < 2017080704) {

        // Define table plagiarism_safeassign_subm to be created.
        $table = new xmldb_table('plagiarism_safeassign_subm');

        // Adding fields to table plagiarism_safeassign_subm.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('uuid', XMLDB_TYPE_CHAR, '36', null, null, null, null);
        $table->add_field('globalcheck', XMLDB_TYPE_INTEGER, '1', null, null, null, null);
        $table->add_field('groupsubmission', XMLDB_TYPE_INTEGER, '1', null, null, null, null);
        $table->add_field('highscore', XMLDB_TYPE_NUMBER, '3, 2', null, null, null, null);
        $table->add_field('avgscore', XMLDB_TYPE_NUMBER, '3, 2', null, null, null, null);
        $table->add_field('submitted', XMLDB_TYPE_INTEGER, '1', null, null, null, null);
        $table->add_field('reportgenerated', XMLDB_TYPE_INTEGER, '1', null, null, null, null);
        $table->add_field('submissionid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);

        // Adding keys to table plagiarism_safeassign_subm.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
        $table->add_key('submissionid', XMLDB_KEY_FOREIGN, array('submissionid'), 'assign_submission', array('id'));

        // Conditionally launch create table for plagiarism_safeassign_subm.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Safeassign savepoint reached.
        upgrade_plugin_savepoint(true, 2017080704, 'plagiarism', 'safeassign');
    }

    return true;

}