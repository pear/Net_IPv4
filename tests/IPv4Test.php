<?php
require_once 'Net/IPv4.php';
require_once 'MyIPv4.php';

class IPv4Test extends PHPUnit\Framework\TestCase {
    protected $net;
    protected $quadIPs;
    protected $hexIPs;
    
    protected function setUp() {
        $this->net = new Net_IPv4();
        $this->expected = new MyIPv4();
        $this->quadIPs = array('10.0.0.15' => 167772175.0, '172.16.0.155' => 2886729883.0,
        '192.168.0.255' => 3232235775.0, '1.2.3.4' => 16909060.0, '1.0.0.0' => 16777216.0,
        '255.255.255.255' => 4294967295.0, '127.0.0.1' => 2130706433.0);
        $this->hexIPs = array('0a00000f', 'ac10009b', 'c0a800ff', '01020304', 
        '01000000', 'ffffffff', '7f000001');
    }
    
    protected function tearDown() {
        $this->net = null;
    }
    
    public function test_atoh() {
        foreach ($this->quadIPs as $ip => $v) {
            $this->assertSame($this->net->atoh($ip), $this->expected->atoh($ip));
        }
    }
    
    public function test_htoa() {
        foreach ($this->hexIPs as $ip => $v) {
            $this->assertSame($this->net->htoa($ip), $this->expected->htoa($ip));
        }
    }
    
    public function test_validateIP() {
        foreach ($this->quadIPs as $ip => $v) {
            $this->assertSame($this->net->validateIP($ip), $this->expected->validateIP($ip));
        }
    }
    public function test_ip2double() {
        foreach ($this->quadIPs as $k => $v) {
            $this->assertSame($this->net->ip2double($k), $v);
        }
    }
    
    
}