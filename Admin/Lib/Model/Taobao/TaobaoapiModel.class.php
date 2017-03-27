<?php
require_once 'ApibaseModel.class.php';

/**
 * TaobaoapiModel 淘宝预约接口模型
 *
 * @uses CommonModel
 * @modify_time 2015-09-21
 * @author zxj <tenkanse@hotmail.com>
 */
class TaobaoapiModel extends ApibaseModel
{

    /**
     * category API类别
     * 
     * @var string
     * @access protected
     */
    protected $category = 'Life';

    /**
     * apiId taobao_token表的pk，用于区别淘宝和天猫的不同应用
     * 
     * @var string
     * @access protected
     */
    protected $apiId = '1';

    /**
     * __construct
     *
     * @modify_time 2015-09-21
     * @author zxj <tenkanse@hotmail.com>
     * @param mixed $name
     * @param mixed $params
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->env = C('TAOBAO_API_ENV');
        $this->config = C($this->env);

        //实例化TopClient类
        $this->c = new TopClient;
        $this->c->format = 'json';
        $this->c->gatewayUrl = $this->config['gatewayUrl'];
        $this->c->appkey = $this->config['appkey'];
        $this->c->secretKey = $this->config['secretKey'];

        $this->auth($_GET['auth']);// 手动调用测试接口检查sessionKey是否有效
    }

    /**
     * render 接口调用显示
     *
     * @modify_time 2015-09-21
     * @author zxj <tenkanse@hotmail.com>
     * @access public
     * @return void
     */
    public function render()
    {
        $result = $this->exec();
        $status = $result->code ? '错误' : '通过';
        echo '<br/>'.$this->name."接口测试结果：$status<br/>";
        echo '<br/>参数：<br/>';
        var_dump($this->params);
        print_r($this->params);
        echo '<br/>返回obj：<br/>';
        print_r(json_encode($result));
        if ($result->values) {
            var_dump($result->values);
        } else {
            var_dump($result);
        }
    }

    /**
     * checkSessionKeyValidity 用测试接口检查access_token是否可用
     *
     * @modify_time 2015-09-21
     * @author zxj <tenkanse@hotmail.com>
     * @access protected
     * @return void
     */
    protected function checkSessionKeyValidity()
    {
        //备份
        $name = $this->name;
        $params = $this->params;

        $this->name = 'AreaQuery';
        $this->params =  array(
            'ParentAreaId' => '110105',
        );
        $result = $this->exec();
        if (in_array($result->code, array(26, 27))) {
            throw new \Exception($result->msg);
        }

        //还原
        $this->name = $name;
        $this->params = $params;
    }
}
