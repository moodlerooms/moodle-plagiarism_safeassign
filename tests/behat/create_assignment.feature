# This file is part of Moodle - http://moodle.org/
#
# Moodle is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# Moodle is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
#
# Tests for visibility of admin block by user type and page.
#
# @package    plagiarism_safeassign
# @copyright  Copyright (c) 2017 Blackboard Inc.
# @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later

@plugin @plagiarism_safeassign
Feature: Enable SafeAssign in an assignment
  As a Teacher
  I should be able of configure an assignment with SafeAssign as plagiarism plugin

  Background:
    Given the following config values are set as admin:
      | enableplagiarism | 1 |
    And the following "courses" exist:
      | fullname | shortname | format | category | groupmode | enablecompletion |
      | Course 1 | C1        | topics | 0        | 1         | 1                |
    And the following "course enrolments" exist:
      | user     | course | role    |
      | admin    | C1     | teacher |

  Scenario: Enable an assignment with SafeAssign Plagiarism plugin
    Given I log in as "admin"
      And I follow "Course 1"
     Then I turn editing mode on
      And I add a "Assignment" to section "1"
      And I should not see "Safeassign Plagiarism plugin"
      And I press "Cancel"
      And I turn editing mode off
     Then the following config values are set as admin:
        | safeassign_use   | 1 | plagiarism |
      And I am on homepage
      And I follow "Course 1"
     Then I turn editing mode on
      And I add a "Assignment" to section "1"
      And I should see "Safeassign Plagiarism plugin"
     Then I set the field "Assignment name" to "Assignment One"
      And I set the field "Description" to "Assignmnet One"
      And navigation node "Safeassign Plagiarism plugin" should be expandable
     Then I expand "Safeassign Plagiarism plugin" node
      And I set the field "safeassign_enabled" to "1"
      And I set the field "safeassign_originality_report" to "1"
      And I set the field "safeassign_global_reference" to "0"
      And I press "Save and return to course"
     Then I follow "Assignment One"
      And I follow "Edit settings"
     Then the field "safeassign_enabled" matches value "1"
      And the field "safeassign_originality_report" matches value "1"
      And the field "safeassign_global_reference" does not match value "1"
      And I log out

