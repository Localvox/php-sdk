<?php
/**
 * WEB-APPLICATION
 * MyLibraryService.php
 *
 * PHP Version 5
 *
 * @category Production
 * @package  Default
 * @author   Philipp Tkachev <philipp@marketmesuite.com>
 * @date     12/23/13 3:45 PM
 * @license  http://marketmesuite.com/license.txt MMS License
 * @version  GIT: 1.0
 * @link     http://marketmesuite.com/
 */

namespace Ctct\Services;

use \Ctct\Util\Config;

class MyLibraryService extends BaseService
{
    /**
     * Get files from the library
     *
     * @param string $accessToken access token
     * @param array  $params      type of files
     *
     * @return mixed
     */
    public function getFiles($accessToken, array $params = array())
    {
        $baseUrl = Config::get('endpoints.base_url')
            . sprintf(Config::get('endpoints.library_files'));
        $url = $this->buildUrl($baseUrl, $params);
        $response = parent::getRestClient()->get($url, parent::getHeaders($accessToken));
        $result = json_decode($response->body, true);
        return $result;
    }

    /**
     * Get folders from the library
     *
     * @param string $accessToken access token
     * @param array  $params      type of files
     *
     * @return mixed
     */
    public function getFolders($accessToken, array $params = array())
    {
        $baseUrl = Config::get('endpoints.base_url')
            . sprintf(Config::get('endpoints.library_folders'));
        $url = $this->buildUrl($baseUrl, $params);
        $response = parent::getRestClient()->get($url, parent::getHeaders($accessToken));
        $result = json_decode($response->body, true);
        return $result;
    }

    /**
     * Get files by folder from the library
     *
     * @param string $accessToken access token
     * @param $folderId
     * @param array $params type of files
     *
     * @return mixed
     */
    public function getFilesByFolder($accessToken, $folderId, array $params = array())
    {
        $baseUrl = Config::get('endpoints.base_url')
            . sprintf(Config::get('endpoints.library_files_by_folder'), $folderId);
        $url = $this->buildUrl($baseUrl, $params);
        $response = parent::getRestClient()->get($url, parent::getHeaders($accessToken));
        $result = json_decode($response->body, true);
        return $result;
    }
}
