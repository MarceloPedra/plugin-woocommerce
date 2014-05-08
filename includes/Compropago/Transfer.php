<?php

class Compropago_Transfer extends Compropago_ApiResource
{
  public static function constructFrom($values, $apiKey=null)
  {
    $class = get_class();
    return self::scopedConstructFrom($class, $values, $apiKey);
  }

  public static function retrieve($id, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedRetrieve($class, $id, $apiKey);
  }

  public static function all($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedAll($class, $params, $apiKey);
  }

  public function transactions($params=null)
  {
    $requestor = new Compropago_ApiRequestor($this->_apiKey);
    $url = $this->instanceUrl() . '/transactions';
    list($response, $apiKey) = $requestor->request('get', $url, $params);
    return Compropago_Util::convertToCompropagoObject($response, $apiKey);
  }
}
