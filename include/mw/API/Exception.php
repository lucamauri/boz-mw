<?php
# boz-mw - Another MediaWiki API handler in PHP
# Copyright (C) 2018, 2019, 2020, 2021 Valerio Bozzolan
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
 * Generic API exception class
 */
class Exception extends \Exception {

	/**
	 * API error object
	 *
	 * @var object
	 */
	private $apiError;

	/**
	 * Constructor
	 *
	 * @param $api_error object The complete error
	 * @param $code int
	 * @param $previous object
	 */
	public function __construct( $api_error, $code = 0, Exception $previous = null ) {
		$this->apiError = $api_error;
		parent::__construct(
			sprintf(
				"API error code: '%s' info: '%s'",
				$this->getApiErrorCode(),
				$this->getApiErrorInfo()
			),
			$code,
			$previous
		);
	}

	/**
	 * Create a specific exception from a generic API error
	 *
	 * @param $api_error object The complete error
	 * @return self
	 */
	public static function createFromApiError( $api_error ) {
		$known_exceptions = [
			BadTokenException        ::class,
			MaxLagException          ::class,
			EditConflictException    ::class,
			ArticleExistsException   ::class,
			MissingTitleException    ::class,
			ProtectedPageException   ::class,
			PermissionDeniedException::class,
			ReadOnlyException        ::class,
			ReadApiDeniedException   ::class,
			PageCannotExistException ::class,
			FailedSaveException      ::class,

			// Wikibase related
			NoSuchEntityException      ::class,
			ModificationFailedException::class,
		];
		$exception = new self( $api_error );
		$code = $exception->getApiErrorCode();
		foreach( $known_exceptions as $known_exception_name ) {
			if( $known_exception_name::API_ERROR_CODE === $code ) {
				$exception = new $known_exception_name( $api_error );
				break;
			}
		}
		return $exception;
	}

	/**
	 * Get the complete error object
	 *
	 * @return object
	 */
	public function getApiError() {
		return $this->apiError;
	}

	/**
	 * Get the API error code
	 *
	 * @return string
	 */
	public function getApiErrorCode() {
		return $this->getApiError()->code;
	}

	/**
	 * Get the API error info
	 *
	 * @return string
	 */
	public function getApiErrorInfo() {
		return $this->getApiError()->info;
	}
}
