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
 * SafeAssign language strings.
 *
 * @package   plagiarism_safeassign
 * @copyright Copyright (c) 2017 Blackboard Inc.
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'SafeAssign plagiarism plugin';
$string['sendfiles'] = 'Send queued files';
$string['studentdisclosuredefault']  ='All files uploaded will be submitted to a plagiarism detection service';
$string['studentdisclosure'] = 'Institution Release Statement';
$string['studentdisclosure_help'] = 'This text will be displayed to all students on the file upload page.';
$string['safeassignexplain'] = 'For more information on this plugin see: ';
$string['safeassign'] = 'SafeAssign';
$string['safeassign:enable'] = 'Allow the teacher to enable/disable SafeAssign inside an activity';
$string['safeassign:viewreport'] = 'Allow the teacher to view the full report from SafeAssign';
$string['usesafeassign'] ='Enable SafeAssign';
$string['savedconfigsuccess'] = 'Plagiarism Settings Saved';
$string['safeassign_api']= 'SafeAssign integration URL';
$string['safeassign_api_help'] = 'This is the address of the SafeAssign API.';
$string['instructor_role_credentials'] = 'Instructor Role Credentials';
$string['safeassign_instructor_username'] = 'Shared key';
$string['safeassign_instructor_username_help'] = "Instructor's shared key provided by SafeAssign.";
$string['safeassign_instructor_password'] = 'Shared secret';
$string['safeassign_instructor_password_help'] = "Instructor's shared secret provided by SafeAssign.";
$string['student_role_credentials'] = 'Student Role Credentials';
$string['safeassign_student_username'] = 'Shared key';
$string['safeassign_student_username_help'] = "Student's shared key provided by SafeAssign.";
$string['safeassign_student_password'] = 'Shared secret';
$string['safeassign_student_password_help'] = "Student's shared secret provided by SafeAssign.";
$string['safeassign_enableplugin'] = 'Enable SafeAssign for {$a}';
$string['safeassign_institutioninfo'] = 'Institution name: ';
$string['safeassign_cachedefault'] = '<div class="form-defaultinfo text-muted">&nbsp Default value: 0</div> <br>';
$string['safeassign_contactname'] = 'Contact First Name: ';
$string['safeassign_contactlastname'] = 'Contact Last Name: ';
$string['safeassign_contactemail'] = 'Contact Email: ';
$string['safeassign_contactjob'] = 'Contact Job Title: ';
$string['safeassign_showid'] = 'Show Student ID';
$string['safeassign_alloworganizations'] = 'Allow SafeAssignments in Organizations';
$string['safeassign_referencedbactivity'] = 'Global Reference Database Activity';
$string['safeassing_response_header'] = '<br>SafeAssign server response: <br>';
$string['safeassign_instructor_credentials'] = 'Instructor Role Credentials: ';
$string['safeassign_student_credentials'] = 'Student Role Credentials: ';
$string['safeassign_credentials_verified'] = 'Connection verified.';
$string['safeassign_credentials_fail'] = 'Connection not verified. Check key, secret and url.';
$string['credentials'] = 'Credentials and Service URL';
$string['shareinfo'] = 'Share info with SafeAssign';
$string['disclaimer']= '<br>Submitting to the SafeAssign Global Reference Database allows papers from other institutions <br>
                        to be checked against your students paper to protect the origin of their work.';
$string['settings'] = 'SafeAssign Settings';
$string['timezone_help'] = 'The timezone set in your Moodlerooms environment.';
$string['timezone'] = 'Timezone';
$string['safeassign_status'] = 'SafeAssign status';
$string['status:pending'] = 'Pending';
$string['safeassign_score'] = 'SafeAssign score';
$string['safeassign_reporturl'] = 'Report URL';
$string['button_disabled'] = 'Save form to test connection';
// Rest provider.
$string['error_generic'] = '{$a}';
$string['error_behat_getjson'] = 'Timezone';
$string['safeassign_curlcache'] = 'Cache timeout';
$string['safeassign_curlcache_help'] = 'Web service cache timeout.';
$string['rest_error_nocurl'] = 'cURL module must be present and enabled!';
$string['rest_error_nourl'] = 'You must specify URL!';
$string['rest_error_nomethod'] = 'You must specify request method!';
$string['rest_error_server'] = '{$a}';
$string['rest_error_curl'] = '{$a}';
$string['test_credentials'] = 'Test connection';
$string['connectionfailed'] = 'Connection Failed';
$string['connectionverified'] = 'Connection Verified';
$string['cachedef_request'] = 'SafeAssign request cache';
// Behat test.
$string['error_behat_getjson'] = 'Error to get json file "{$a}" from folder plagiarism/safeassign/tests/fixtures for '.
    'simulating a call to SafeAssign webservices when running behat tests.';
$string['error_behat_instancefail'] = 'This is an instance configured to fail with behat tests.';
