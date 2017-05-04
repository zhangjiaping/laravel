@extends('Home.u_parent')
@section('address')
<title>公告管理</title>
<meta name="viewport" content="width=1226">
<meta name="description" content="">
<meta name="keywords" content="小米商城">
<link rel="shortcut icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
<link rel="icon" href="" type="image/x-icon">
<!-- <link rel="stylesheet" href="{{('/Home/css/base.min.css')}}"> -->
<link rel="stylesheet" type="text/css" href="{{('/Home/css/message.min.css')}}">
<!-- <link rel="stylesheet" type="text/css" href="{{('/Home/css/main.min.css')}}"> -->
<link rel="stylesheet" href="{{('/Home/css/base.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{('/Home/css/ecard.min.css')}}">
</head>
<div class="span16 J_o_m message-wrap">
    <div class="uc-box uc-main-box">
        <div class="uc-content-box">
            <div class="box-hd">
                <h1 class="title">公告管理</h1>
                <div class="more clearfix">
                    <ul class="filter-list J_addrType">
                        <li class="first active">
                            <a href="http://order.mi.com/message/list?r=38485.1492648282#category=all" data-stat-id="a1586e17d467508d" onclick="_msq.push([&#39;trackEvent&#39;, &#39;450aa89699906dba-a1586e17d467508d&#39;, &#39;#category=all&#39;, &#39;pcpid&#39;, &#39;&#39;]);">全部消息<span class="m-num"></span></a>
                        </li>
                      
                    </ul>
                </div>
            </div>
            <!-- 在这里写循环 -->
           
              <div class="box-bd">
                <table id="J_ecardTable" class="ecard-table">
                    <thead>
                    <tr>
                        <th>序号</th>
                        <th>公告标题</th>
                        <th>公告内容</th>
                        <th>公告时间</th>
                        <th>公告的状态</th>
                    </tr>
                    <div style="display:none">{{ $i=0 }}</div>
                    <!-- 用户内容 -->
                    <!-- 这个是反馈内容 -->
                    @foreach($list as $v)
                     <tr>
                        <th>{{ $i=$i+1 }}</th>
                        <th>{{ $v->title }}</th>
                        <th>{{ $v->content }}</th>
                        <th>{{ $v->time }}</th>
                        <th style="color:red">{{ ($v->type == 1)?'不重要':'重要' }}</th>
                    </tr>
                    @endforeach
                    </thead>
                </table>
                <div id="J_cardListPages" style="display: none;"></div>
            </div>
             <!-- 在这里写循环 -->
        </div>
    </div>
    <div class="message-main">
        @foreach($list as $v)
            @if($v->id<0)
        <div class="message-list J_mList" id="J_msgList" data-stat-title="aaa"><div class="no-data">暂无数据</div></div>
            @endif
        @endforeach
        <div class="J_mPager"></div>
    </div>
</div>
@endsection
