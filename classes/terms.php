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

namespace plagiarism_safeassign;

defined('MOODLE_INTERNAL') || die();

/**
 * terms.php - Contains the License Agreement Text for SafeAssign.
 *
 * @package    plagiarism_safeassign
 * @copyright  Copyright (c) 2017 Blackboard Inc. (http://www.blackboard.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class terms {

    /**
     * Returns the License Agreement for use in the settings form.
     * @return string - License Agreement text.
     */
    public static function get_license_agreement() {
        return '<p> I agree to the <a href="http://www.blackboard.com/safeassign/tos.html" target="_blank">Terms of Service
            </a> and the <a href="http://blackboard.com/footer/privacy-policy.aspx" target="_blank">Blackboard Privacy
            Policy</a> and confirm that I have the authority to install SafeAssign on behalf of my institution.</p>';
    }

}