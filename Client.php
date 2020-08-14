<?php
namespace pdd;

use pdd\Api\Request\PddDdkAllOrderListIncrementGetRequest;
use pdd\Api\Request\PddDdkCouponInfoQueryRequest;
use pdd\Api\Request\PddDdkGoodsBasicInfoGetRequest;
use pdd\Api\Request\PddDdkGoodsDetailRequest;
use pdd\Api\Request\PddDdkGoodsPidGenerateRequest;
use pdd\Api\Request\PddDdkGoodsPidQueryRequest;
use pdd\Api\Request\PddDdkGoodsPromotionUrlGenerateRequest;
use pdd\Api\Request\PddDdkGoodsRecommendGetRequest;
use pdd\Api\Request\PddDdkGoodsSearchRequest;
use pdd\Api\Request\PddDdkGoodsZsUnitUrlGenRequest;
use pdd\Api\Request\PddDdkLotteryUrlGenRequest;
use pdd\Api\Request\PddDdkMallGoodsListGetRequest;
use pdd\Api\Request\PddDdkMerchantListGetRequest;
use pdd\Api\Request\PddDdkOrderListRangeGetRequest;
use pdd\Api\Request\PddGoodsCatsGetRequest;
use pdd\Api\Request\PddGoodsOptGetRequest;
use pdd\PopAccessTokenClient;
use pdd\PopHttpClient;

class Client{
    private $config;
    private $clientId;
    private $clientSecret;
    private $client;

    public function __construct($config){
        $this->config       = $config;
        $this->clientId     = $config['client_id'] ?? '';
        $this->clientSecret = $config['client_secret'] ?? '';
        $this->client       = new PopHttpClient($this->clientId, $this->clientSecret);
    }

    /**
     * 获取token
     * @param $code
     * @return false|string
     * @throws \pdd\PopHttpException
     */
    public function getAccessToken($code){
        $accessTokenClient = new PopAccessTokenClient($this->clientId, $this->clientSecret);
        $result            = $accessTokenClient->generate($code);
        return json_encode($result->getContent(), JSON_UNESCAPED_UNICODE);
    }

    /**
     * 刷新token
     * @param $token
     * @return false|string
     * @throws \pdd\PopHttpException
     */
    public function refreshToken($token){
        $accessTokenClient = new PopAccessTokenClient($this->clientId, $this->clientSecret);
        $result            = $accessTokenClient->refresh($token);
        return json_encode($result->getContent(), JSON_UNESCAPED_UNICODE);
    }

    /**
     * 调用接口
     * @param $req
     * @return array
     */
    public function call($req){
        try{
            $response = $this->client->syncInvoke($req);
        }catch(\Exception $e){
            return [99, $e->getMessage()];
        }
        $content = $response->getContent();
        if(isset($content['error_response'])){
            return [$content['error_response']['error_code'] ?? 99, $content['error_response']];
        }
        return [0, $content];
    }

    /**
     * 查询广告位
     * @param array $pidList 广告位ID数组
     * @param int   $page
     * @param int   $pageSize
     * @return array
     */
    public function PddDdkGoodsPidQuery(array $pidList = null, int $page = null, int $pageSize = null){
        $req = new PddDdkGoodsPidQueryRequest();
        $page && $req->setPage($page);
        $pageSize && $req->setPageSize($pageSize);
        $pidList && $req->setPidList($pidList);
        return $this->call($req);
    }

    /**
     * 创建广告位
     * @param int        $number
     * @param array|null $pidNameList
     * @return array
     */
    public function PddDdkGoodsPidGenerate(int $number = 1, array $pidNameList = null){
        $req = new PddDdkGoodsPidGenerateRequest();
        $req->setNumber($number);
        $pidNameList && $req->setPIdNameList($pidNameList);
        return $this->call($req);
    }

    /**
     * 查询商品标签列表
     * @param int $catsId
     * @return array
     */
    public function PddGoodsOptGet(int $catsId){
        $req = new PddGoodsOptGetRequest();
        $req->setParentOptId($catsId);
        return $this->call($req);
    }

    /**
     * 获取商品类目
     * @param int $catId
     * @return array
     */
    public function PddGoodsCatsGet(int $catId){
        $req = new PddGoodsCatsGetRequest();
        $req->setParentCatId($catId);
        return $this->call($req);
    }

    /**
     * 多多进宝商品查询
     * @param string $keyword    商品关键词，与opt_id字段选填一个或全部填写
     * @param int    $optId      商品标签类目ID，使用pdd.goods.opt.get获取
     * @param int    $page       默认值1，商品分页数
     * @param int    $pageSize   默认100，每页商品数量
     * @param int    $sortType   排序方式:0-综合排序;1-按佣金比率升序;2-按佣金比例降序;3-按价格升序;4-按价格降序;
     *                           5-按销量升序;6-按销量降序;7-优惠券金额排序升序;8-优惠券金额排序降序;9-券后价升序排序;
     *                           10-券后价降序排序;11-按照加入多多进宝时间升序;12-按照加入多多进宝时间降序;13-按佣金金额升序排序;
     *                           14-按佣金金额降序排序;15-店铺描述评分升序;16-店铺描述评分降序;17-店铺物流评分升序;18-店铺物流评分降序;
     *                           19-店铺服务评分升序;20-店铺服务评分降序;27-描述评分击败同类店铺百分比升序，28-描述评分击败同类店铺百分比降序，
     *                           29-物流评分击败同类店铺百分比升序，30-物流评分击败同类店铺百分比降序，31-服务评分击败同类店铺百分比升序，
     *                           32-服务评分击败同类店铺百分比降序
     * @param null   $withCoupon 是否只返回优惠券的商品，false返回所有商品，true只返回有优惠券的商品
     * @param null   $rangeList  筛选范围列表 样例：[{"range_id":0,"range_from":1,"range_to":1500},{"range_id":1,"range_from":1,"range_to":1500}]
     *                           range_id枚举及描述： 0，最小成团价 1，券后价 2，佣金比例 3，优惠券价格 4，广告创建时间 5，销量 6，佣金金额 7，店铺描述分
     *                           8，店铺物流分 9，店铺服务分 10， 店铺描述分击败同行业百分比 11， 店铺物流分击败同行业百分比 12，店铺服务分击败同行业百分比
     *                           13，商品分 17 ，优惠券/最小团购价 18，过去两小时pv 19，过去两小时销量
     * @param null   $merchant_type  店铺类型，1-个人，2-企业，3-旗舰店，4-专卖店，5-专营店，6-普通店（未传为全部）
     * @return array
     */
    public function PddDdkGoodsSearch(string $keyword = null, int $optId = null,int $catId = null ,int $page = 1, int $pageSize = 100, $sortType = 0, $withCoupon = null, $rangeList = null, $merchant_type = null){
//        if(!$keyword && !$optId){
//            return [1, '关键字跟类别必须有一样'];
//        }
        $req = new PddDdkGoodsSearchRequest();
        $keyword && $req->setKeyword($keyword);
        $catId && $req->setCatId($catId);
        $optId && $req->setOptId($optId);
        $req->setPage($page);
        $req->setPageSize($pageSize);
        $req->setSortType($sortType);
        $withCoupon && $req->setWithCoupon($withCoupon);
        $rangeList && $req->setRangeList($rangeList);
        $merchant_type && $req->setMerchantType($merchant_type);
        return $this->call($req);
    }

    /**
     * @param int $mallId
     * @param int $page
     * @param int $pageSize
     * @return array
     */
    public function PddDdkMallGoodsList(int $mallId,int $page=1,int $pageSize=10){
        $req = new PddDdkMallGoodsListGetRequest();
        $req->setMallId($mallId);
        $req->setPageNumber($page);
        $req->setPageSize($pageSize);
        return $this->call($req);
    }

    /**
     * 获取商品基本信息
     * @param array $goodsIdList 商品列表
     * @return array
     */
    public function PddDdkGoodsBasicInfoGet(array $goodsIdList){
        $req = new PddDdkGoodsBasicInfoGetRequest();
        $req->setGoodsIdList($goodsIdList);
        return $this->call($req);
    }

    /**
     * 获取商品明细
     * @param int $goodsId
     * @return array
     */
    public function PddDdkGoodsDetail(int $goodsId){
        $req = new PddDdkGoodsDetailRequest();
        $req->setGoodsIdList([$goodsId]);
        return $this->call($req);
    }

    /**
     * 查询优惠券信息
     * @param array $couponIds
     * @return array
     */
    public function PddDdkCouponInfoQuery(array $couponIds){
        $req = new PddDdkCouponInfoQueryRequest();
        $req->setCouponIds($couponIds);
        return $this->call($req);
    }

    /**
     * 拼多多商品推广链接转换
     * @param string      $pid                  推广位ID
     * @param int         $goodsId              商品ID
     * @param bool        $genShortUrl          是否生成短链接，true-是，false-否
     * @param bool        $multiGroup           true--生成多人团推广链接 false--生成单人团推广链接（默认false）1、单人团推广链接：用户访问单人团推广链接，可直接购买商品无需拼团。2、多人团推广链接：用户访问双人团推广链接开团，若用户分享给他人参团，则开团者和参团者的佣金均结算给推手
     * @param string|null $customParameters     自定义参数，为链接打上自定义标签。自定义参数最长限制64个字节。
     * @param int         $zsDuoId              招商多多客ID。
     * @param bool        $genSchemaUrl         是否返回 schema URL
     * @param bool        $genMallCollectCoupon 是否生成店铺收藏券推广链接
     * @param bool        $genWeappWebview      是否生成小程序推广
     * @param bool        $genWeApp             是否生成小程序推广
     * @param bool        $genQqApp             是否生成qq小程序
     * @param bool        $genWeiboappWebview   是否生成微博推广链接
     * @return array
     */
    public function PddDdkGoodsPromotionUrlGenerate(
        string $pid,
        int $goodsId,
        bool $genShortUrl = false,
        bool $multiGroup = false,
        string $customParameters = null,
        int $zsDuoId = 0,
        bool $genSchemaUrl = false,
        bool $genMallCollectCoupon = false,
        bool $genWeappWebview = false,
        bool $genWeApp = false,
        bool $genQqApp = false,
        bool $genWeiboappWebview = false
    ){
        $req = new PddDdkGoodsPromotionUrlGenerateRequest();
        $req->setPId($pid);
        $req->setGoodsIdList([$goodsId]);
        $req->setGenerateShortUrl($genShortUrl);
        $req->setMultiGroup($multiGroup);
        $customParameters && $req->setCustomParameters($customParameters);
        $zsDuoId && $req->setZsDuoId($zsDuoId);
        $req->setGenerateSchemaUrl($genSchemaUrl);
        $req->setGenerateMallCollectCoupon($genMallCollectCoupon);
        $req->setGenerateWeappWebview($genWeappWebview);
        $req->setGenerateWeApp($genWeApp);
        $req->setGenerateQqApp($genQqApp);
        $req->setGenerateWeiboappWebview($genWeiboappWebview);
        return $this->call($req);
    }

    /**
     * 运营频道商品查询API
     * @param int         $offset           从多少位置开始请求；默认值 ： 0，offset需是limit的整数倍，仅支持整页翻页
     * @param int         $limit            请求数量；默认值 ： 400
     * @param int         $channelType      频道类型；0, "1.9包邮", 1, "今日爆款", 2, "品牌清仓", 非必填 ,默认是1
     * @param string|null $pid              推广位id
     * @param string|null $customParameters 自定义参数
     * @return array
     */
    public function PddDdkGoodsRecommendGet(int $offset = 0, int $limit = 400, int $channelType = 1, string $pid = null, string $customParameters = null){
        $req = new PddDdkGoodsRecommendGetRequest();
        $req->setOffset($offset);
        $req->setLimit($limit);
        $req->setChannelType($channelType);
        $pid && $req->setPid($pid);
        $customParameters && $req->setCustomParameters($customParameters);
        return $this->call($req);
    }

    /**
     * 多多进宝转链接口,本功能适用于采集群等场景。将其他推广者的推广链接转换成自己的；通过此api，可以将他人的招商推广链接，转换成自己的招商推广链接。
     * @param string      $sourceUrl
     * @param string|null $pid
     * @return array
     */
    public function PddDdkGoodsZsUnitUrlGen(string $sourceUrl, string $pid = null){
        $req = new PddDdkGoodsZsUnitUrlGenRequest();
        $req->setSourceUrl($sourceUrl);
        $pid && $req->setPid($pid);
        return $this->call($req);
    }

    /**
     * 多多客生成转盘抽免单url
     * @param string      $pid              推广位
     * @param bool        $genWeappWebview  是否生成唤起微信客户端链接，true-是，false-否，默认false
     * @param bool        $genShortUrl      是否生成短链接，true-是，false-否
     * @param bool        $multiGroup       true--生成多人团推广链接 false--生成单人团推广链接（默认false）
     *                                      1、单人团推广链接：用户访问单人团推广链接，可直接购买商品无需拼团。
     *                                      2、多人团推广链接：用户访问双人团推广链接开团，若用户分享给他人参团，则开团者和参团者的佣金均结算给推手
     * @param string|null $customParameters 自定义参数，为链接打上自定义标签。自定义参数最长限制64个字节。
     * @param bool        $genWeApp         是否生成大转盘和主题的小程序推广链接
     * @param bool        $genSchemaUrl     是否返回 schema URL
     * @param bool        $genQqApp         是否生成qq小程序
     * @return array
     */
    public function PddDdkLotteryUrlGen(string $pid, bool $genWeappWebview = false, bool $genShortUrl = false, bool $multiGroup = false, string $customParameters = null,
                                        bool $genWeApp = false, bool $genSchemaUrl = false, bool $genQqApp = false){
        $req = new PddDdkLotteryUrlGenRequest();
        $req->setPidList([$pid]);
        $req->setMultiGroup($multiGroup);
        $req->setGenerateWeappWebview($genWeappWebview);
        $req->setGenerateShortUrl($genShortUrl);
        $req->setCustomParameters($customParameters);
        $req->setGenerateWeApp($genWeApp);
        $req->setGenerateSchemaUrl($genSchemaUrl);
        $req->setGenerateQqApp($genQqApp);
        return $this->call($req);
    }

    /**
     * 按照时间段获取授权多多客下面所有多多客的推广订单信息
     * @param int $startTime 开始时间
     * @param int $endTime   结束时间
     * @param int $page      页面
     * @param int $pageSize  每页大小
     * @return array
     */
    public function PddDdkAllOrderListIncrementGet(int $startTime, int $endTime, int $page = 1, int $pageSize = 100){
        $req = new PddDdkAllOrderListIncrementGetRequest();
        $req->setStartUpdateTime($startTime);
        $req->setEndUpdateTime($endTime);
        $req->setPage($page);
        $req->setPageSize($pageSize);
        return $this->call($req);
    }

    /**
     * 用时间段查询推广订单接口
     * @param string      $startTime   支付起始时间，如：2019-05-05 00:00:00
     * @param string      $endTime     支付结束时间，如：2019-05-05 00:00:00
     * @param string|null $lastOrderId 上一次的迭代器id(第一次不填)
     * @param int         $pageSize    每次请求多少条，建议300
     * @return array
     */
    public function PddDdkOrderListRangeGet(string $startTime, string $endTime, string $lastOrderId = null, int $pageSize = 300){
        $req = new PddDdkOrderListRangeGetRequest();
        $req->setStartTime($startTime);
        $req->setEndTime($endTime);
        $lastOrderId && $req->setLastOrderId($lastOrderId);
        $req->setPageSize($pageSize);
        return $this->call($req);
    }

    public function PddDdkMerchantListGetRequest(array $mall_id_list = [],$page_size = 1, $page_number = 20, $has_coupon = 0){
        $req = new PddDdkMerchantListGetRequest();
        $req->setMallIdList($mall_id_list);
        $req->setPageSize($page_size);
        $req->setPageNumber($page_number);
        $req->setHasCoupon($has_coupon);
        return $this->call($req);
    }
}