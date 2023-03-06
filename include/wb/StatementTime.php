<?php
# Boz-MW - Another MediaWiki API handler in PHP
# Copyright (C) 2018 Valerio Bozzolan
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

# Wikibase
namespace wb;

/**
 * A StatementString is a Statement that contains a SnakString.
 */
class StatementTime extends Statement {

	/**
	 * @param $property string Property as 'P123'
	 * @param $time string example "+1539-00-00T00:00:00Z"
	 * @param $precision int
	 *	0: 1 Gigayear
	 * 	1: 100 Megayears
	 * 	2: 10 Megayears
	 * 	3: Megayear
	 * 	4: 100 Kiloyears
	 * 	5: 10 Kiloyears
	 * 	6: Kiloyear
	 * 	7: 100 years
	 * 	8: 10 years
	 * 	9: years
	 * 	10: months
	 * 	11: days
	 * @param $args array example:
	 * 	timezone: 0,
	 * 	before: 0,
	 * 	after: 0,
	 * 	precision: 9,
	 * 	calendarmodel: "Q1985786"
	 * @see https://www.mediawiki.org/wiki/Wikibase/DataModel/JSON
	 */
	public function __construct( $property, $time, $precision, $args = [] ) {
		parent::__construct( new SnakTime( $property, $time, $precision, $args ) );
	}

	/**
	 * @param $property string Property as 'P123'
	 * @param $time string example "+1539-00-00T00:00:00Z"
	 * @param $precision int
	 *	0: 1 Gigayear
	 * 	1: 100 Megayears
	 * 	2: 10 Megayears
	 * 	3: Megayear
	 * 	4: 100 Kiloyears
	 * 	5: 10 Kiloyears
	 * 	6: Kiloyear
	 * 	7: 100 years
	 * 	8: 10 years
	 * 	9: years
	 * 	10: months
	 * 	11: days
	 * @param $args array example:
	 * 	timezone: 0,
	 * 	before: 0,
	 * 	after: 0,
	 * 	precision: 9,
	 * 	calendarmodel: "Q1985786"
	 * @see https://www.mediawiki.org/wiki/Wikibase/DataModel/JSON
	 */
	public static function factory( $property, $time, $precision, $args = [] ) {
		return new self( $property, $time, $precision, $args );
	}
}
