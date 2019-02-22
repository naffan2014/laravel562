<?php

namespace App\Facades\GeoIP;

use GeoIp2\Database\Reader;

class GeoIP
{
    /**
     * GeoIP country db path (base on storage_path).
     *
     * @var GeoIP
     */
    private $_country_db = 'geoipdb/GeoLite2-Country.mmdb';

    /**
     * GeoIP city db path (base on storage_path).
     *
     * @var GeoIP
     */
    private $_city_db = 'geoipdb/GeoLite2-City.mmdb';

    /**
     * Instance for GeoIP .
     *
     * @var GeoIP
     */
    private $_instance;

    /**
     * Init instance.
     *
     */
    public function init($mode)
    {
        switch ($mode) {
            case 'getCountry':
                $path = $this->_country_db;
                break;
            case 'getCity':
                $path = $this->_city_db;
                break;
            default:
                break;
        }

        $this->_instance = new Reader(storage_path($path));
    }

    /**
     * Get Country infomations.
     *
     * @param  String  $ip
     * @return Array
     */
    public function getCountry($ip)
    {
        $this->init(__FUNCTION__);

        $record = $this->_instance->country($ip);

        // 国家信息
        $data['iso_code'] = $record->country->isoCode;
        $data['country_name'] = $record->country->name;
        $data['country_name_zh_cn'] = $record->country->names['zh-CN'];

        return $data;
    }

    /**
     * Get City infomations.
     *
     * @param  String  $ip
     * @return Array
     */
    public function getCity($ip)
    {
        $this->init(__FUNCTION__);

        $record = $this->_instance->city($ip);

        $data['iso_code'] = $record->country->isoCode;
        $data['country_name'] = $record->country->name;
        $data['country_name_zh_cn'] = $record->country->names['zh-CN'];

        // 省、州信息
        $data['sub_division_name'] = $record->mostSpecificSubdivision->name;
        $data['sub_division_name_zh_cn'] = $record->mostSpecificSubdivision->names['zh-CN'];
        $data['sub_division_code'] = $record->mostSpecificSubdivision->isoCode;

        // 城市信息
        $data['city_name'] = $record->city->name;
        $data['postal_code'] = $record->postal->code;

        // 经纬度
        $data['latitude'] = $record->location->latitude;
        $data['longitude'] = $record->location->longitude;

        return $data;
    }

}