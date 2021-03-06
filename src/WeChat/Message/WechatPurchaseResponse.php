<?php


namespace Woodfish\Component\Payment\WeChat\Message;


use Woodfish\Component\Payment\Omnipay\Common\Message\AbstractResponse;
use Woodfish\Component\Payment\Omnipay\Common\Message\RedirectResponseInterface;

class WechatPurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    public function isRedirect()
    {
        $data = $this->getData();

        return !empty($data['code_url']);
    }

    public function isSuccessful()
    {
        return false;
    }

    public function getRedirectUrl()
    {
        $data = $this->getData();

        return $data['code_url'];
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function getRedirectData()
    {
        return null;
    }

    public function redirect()
    {
        return $this->getRedirectUrl();
    }
}