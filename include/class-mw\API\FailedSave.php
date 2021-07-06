<?php
# boz-mw - Another MediaWiki API handler in PHP
# Copyright (C) 2019, 2020, 2021 Valerio Bozzolan
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program. If not, see <http://www.gnu.org/licenses/>.

# MediaWiki API
namespace mw\API;

/**
 * Specific API exception class for the 'failed-save' error code
 *
 * This error is throw when the wiki is unable to save,
 * maybe because the database is under a weird condition.
 */
class FailedSaveException extends Exception {

	const API_ERROR_CODE = 'failed-save';

}
