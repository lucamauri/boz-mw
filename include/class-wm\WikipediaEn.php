<?php
# Boz-MW - Another MediaWiki API handler in PHP
# Copyright (C) 2017, 2018, 2022 Valerio Bozzolan
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

# Wikimedia
namespace wm;

/**
 * English Wikipedia singleton class
 *
 * @see https://en.wikipedia.org/
 */
class WikipediaEn extends \mw\StaticSite {

	/**
	 * @override
	 */
	const UID = 'enwiki';

	/**
	 * @override
	 */
	const API_URL = 'https://en.wikipedia.org/w/api.php';

}
