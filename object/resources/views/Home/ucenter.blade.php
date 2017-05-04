@extends('Home.u_parent')
@section('address')
<div class="uc-box uc-main-box">
    <div class="uc-content-box portal-content-box">
        <div class="box-bd">
            <div class="portal-main clearfix">
                <div class="user-card">
                    <h2 class="username">{{ session('user')->username }}</h2>
                    <p class="tip">晚上好</p>
                    <a class="link" href="">修改个人信息 &gt;</a>
                    <img class="avatar" src="{{ url('Admin/upload').'/'.session('user')->pic }}" width="150" height="150" alt="{{ session('user')->username }}">
                </div>
                <div class="user-actions">
                    <ul class="action-list">
                        <li>账户安全：<span class="level level-2">普通</span>
                        </li>
                        <li>绑定手机：<span class="tel">182********68</span>
                        </li>
                        <li>绑定邮箱：<span class="tel"></span><a class="btn btn-small btn-primary" href="">绑定</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="portal-sub">
                <ul class="info-list clearfix">
                    <li>
                        <h3>待支付的订单：<span class="num">0</span></h3>
                        <a href="{{ url('home/userinfo/0') }}">查看待支付订单<i class="iconfont"></i></a>
                        <img src="{{ url('Home/uinfo_files/portal-icon-1.png') }}" alt="">
                    </li>
                    <li>
                        <h3>待收货的订单：<span class="num">0</span></h3>
                        <a href="{{ url('home/userinfo/2') }}">查看待收货订单<i class="iconfont"></i></a>
                        <img src="{{ url('Home/uinfo_files/portal-icon-2.png') }}" alt="">
                    </li>
                    <li>
                        <h3>待评价商品数：<span class="num">0</span></h3>
                        <a href="{{ url('home/userinfo/0') }}">查看待评价商品<i class="iconfont"></i></a>
                        <img src="{{ url('Home/uinfo_files/portal-icon-3.png') }}" alt="">
                    </li>
                    <li>
                        <h3>喜欢的商品：<span class="num">0</span></h3>
                        <a href="{{ url('home/userinfo/0') }}">查看喜欢的商品<i class="iconfont"></i></a>
                        <img src="{{ url('Home/uinfo_files/portal-icon-4.png') }}" alt="">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>            
@endsection