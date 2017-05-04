
<!-- 继承父类模板 -->
@extends('Home.parent')
@section('content')
    
<title>用户评价</title>

    <!-- 鼠标移入事件 -->
<script type="text/javascript" src='{{ asset("js/jquery-1.8.3.min.js") }}'></script>
<script type="text/javascript">
    $('#banner_menu_wrap').css('display','none');
    $('#fid').mouseover(function(){
        $('#banner_menu_wrap').css('display','block');
    }).mouseout(function(){
        $('#banner_menu_wrap').css('display','none');
    });
    $('#banner_menu_wrap').mouseover(function(){
        $('#banner_menu_wrap').css('display','block');
    }).mouseout(function(){
        $('#banner_menu_wrap').css('display','none');
    });
    $('#banner_menu_wrap').css('background','39,40,34,0.1');
</script>

<style type="text/css">
    #banner_menu_wrap{
        display:none;
        margin-left:65px;
    }
     #big_banner_wrap{
        width:100%;
    }
</style>
    <link rel="stylesheet" href="{{ url('/Home/css/base.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('/Home/css/index.min.css')}}">
    
    <script type="text/javascript" async="" src="{{ url('/Home/js/xmst.js')}}"></script><script type="text/javascript">var _head_over_time = (new Date()).getTime();</script>
</head>
<body>
    <!-- 这里是最顶部的地方 -->
  <div id="J_proHeader">
    <div class="xm-product-box"> 
        <div class="nav-bar" id="J_headNav"> 
            <div class="container J_navSwitch"> 
                <h2 class="J_proName">{{ $name }}</h2> 
                <div class="con">
                    <div class="right">
                        <a href="http://www.mi.com/mi5c/" data-stat-id="a6ff6ce2cc4aa79e" onclick="_msq.push([&#39;trackEvent&#39;, &#39;eb7f709486bf1fdd-a6ff6ce2cc4aa79e&#39;, &#39;http://www.mi.com/mi5c/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">概述
                        </a>  
                        <span class="separator">|</span>  
                         <a href="http://www.mi.com/mi5c/gallery/" data-stat-id="b6f6dbccdfbe7543" onclick="_msq.push([&#39;trackEvent&#39;, &#39;eb7f709486bf1fdd-b6f6dbccdfbe7543&#39;, &#39;http://www.mi.com/mi5c/gallery/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">作品
                         </a>  
                         <span class="separator">|</span>   
                         <a href="http://www.mi.com/mi5c/specs/" data-stat-id="cb2bfec10f226605" onclick="_msq.push([&#39;trackEvent&#39;, &#39;eb7f709486bf1fdd-cb2bfec10f226605&#39;, &#39;http://www.mi.com/mi5c/specs/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">参数</a>  <span class="separator">|</span> 
                            <a href="javascript:void(0);" class="cur" data-stat-id="63093bcebf4ac2f6" onclick="_msq.push([&#39;trackEvent&#39;, &#39;eb7f709486bf1fdd-63093bcebf4ac2f6&#39;, &#39;javascript:void0&#39;, &#39;pcpid&#39;, &#39;&#39;]);">用户评价
                            </a> 
                            <a href="http://item.mi.com/product/10000030.html" class="btn btn-small btn-primary" data-stat-id="5b61ecd395b21fde" onclick="_msq.push([&#39;trackEvent&#39;, &#39;eb7f709486bf1fdd-5b61ecd395b21fde&#39;, &#39;//item.mi.com/product/10000030.html&#39;, &#39;pcpid&#39;, &#39;&#39;]);">立即购买</a> 
                     </div>
                 </div>
            </div> 
        </div>
     </div>
 </div>
<div id="J_proHeader"></div>
<!-- 这里是大家认为的地方 -->
<div class="m-comment-wrap h-comment-wrap">
    <div class="container J_commentWrap"><div class="m-comment-nav J_nav"><h2>大家认为</h2><div class="nav-box"> <a class="item cur" data-profileid="0" href="javascript:;"> 全部（95461）</a>  <a class="item item1" data-profileid="2" href="javascript:;"> 外观漂亮（7667） </a>  <a class="item item2" data-profileid="9" href="javascript:;"> 值得拥有（6204） </a>  <a class="item item3" data-profileid="11" href="javascript:;"> 手感很棒（5154） </a>  <a class="item item4" data-profileid="10" href="javascript:;"> 快递给力（4054） </a>  <a class="item item5" data-profileid="1" href="javascript:;"> 速度很快（2958） </a> </div></div><div class="row"> 

    <!-- 右侧的 -->
<div class="m-comment-summary J_commentSummary" style="width:352px;height:185px;float:right;">
    <div class="num">
         <p class="percent-num"> 
            <span class="m-num">10081</span> 人购买后满意 
        </p>
    </div>
    <div class="m-percent-box"> 
        <p class="percent" style="width:97.9%;">满意度 97.9%</p>
    </div>
</div>
  <!-- 右侧的 -->

    <div class="span13 h-comment-main  m-comment-main J_commentCon"> 
<!-- 这里是大家认为的地方 -->

<!-- 这里是热门评价 -->
        <div class="comment-top"> 
            <h2 class="m-tit">热门评价</h2> 
            <a class="J_showImg show-img" href="javascript:;"> 
                 </i> 只显示最新 </a> 
        </div> 
<!-- 这里是热门评价 -->
@if(session('msg'))
    <script type="text/javascript">
      alert("{{ session('msg') }}");
    </script>
@endif
 <span style="display:none">{{$i=1}}</span>
<!-- 这里是循环的地方 -->
<!-- 这个是判断数组有没有长度 -->
    @if(count($list)>0)
        @foreach($list as $v)
            @if($v->gid==$gid)
            <div class="m-comment-box J_commentList"> 
                <ul class="m-comment-list J_listBody">
                    <li class="com-item J_resetImgCon J_canZoomBox" data-id="140710141"> 
                        <a class="user-img" href="http://item.mi.com/comment/user?user_id=171294227">
                         @foreach($ob as $a)
                              @if($v->uid==$a->id)
                            <img src="{{url('/Admin/upload').'/'.$a->pic }}">
                        </a> 
                        <div class="comment-info"> 
                            <a class="user-name" href="http://item.mi.com/comment/user?user_id=171294227">
                                {{ $a->username }}
                            </a> 
                                @endif
                            @endforeach
                            <p class="time">{{ $v->time }}</p> 
                        </div> 
                        <div class="comment-eval"> 
                            <i class="iconfont"></i> 楼主 
                        </div> 
                        <div class="comment-txt"> 
                            <!-- 还需要修改 -->
                            <!-- 还需要修改 -->
                            <!-- 这里是判断是否高亮的地方 -->
                            @if($v->gaoliang==2&&$v->jinghua==2)
                            <a href="http://item.mi.com/comment/detail?comment_id=140710141" target="_blank" style="color:red">{{$v->content}}</a> <span style="color:green">***加精***</span>
                            <!-- 这里是判断是否高亮的地方 -->
                            @elseif($v->gaoliang==2)
                            <a href="http://item.mi.com/comment/detail?comment_id=140710141" target="_blank" style="color:red">{{$v->content}}</a> 
                            @elseif($v->jinghua==2)
                            <a href="http://item.mi.com/comment/detail?comment_id=140710141" target="_blank">{{$v->content}}</a> <span style="color:green">***加精***</span>
                            @else
                            <a href="http://item.mi.com/comment/detail?comment_id=140710141" target="_blank">{{$v->content}}</a> 
                            @endif
                        </div>  
                        
                        <div class="comment-handler"> 
                            <a href="javascript:;" data-commentid="140710141" class="J_hasHelp"> 
                                <i class="iconfont"></i>&nbsp;  
                                <span class="amount">
                                    <span>129</span> 
                                </span> 

                            </a> 
                        </div> 
                     
                        
                        <div class="comment-answer">  
                            <!-- 这里取的是发帖表和回帖表的关联  -->
                            @foreach($rlist as $r)
                                       @if($r->cid==$v->id)
                                           
                            <div class="answer-item"> 
                                            
                                <img class="answer-img" src="{{ url('/Admin/upload').'/'.$r->upic }}"> 
                                <div class="answer-content"> 
                                    <h3 class="official-name" >{{ $r->replayer }}
                                        <i style="margin-left:500px;">
                                            @if($i==1)
                                                沙发
                                                @elseif($i==2)
                                                板凳
                                                @else
                                                第{{$i}}楼
                                            @endif

                                        </i>
                                    </h3> 
                                        <span style="display:none">{{$i++}}</span>
                                    <p> 
                                     <a href="javascript:void(0);" class="J_csLike " data-commentid="140710141"> 
                                        <p class="time">{{ $r->rtime }}</p> 
                                        <span class="amount">{{ $r->rcontent }} </span> 
                                    </a> 
                                    </p> 
                                </div> 
                            </div>  
                                @endif
                        @endforeach 
                        <!-- 判断是否有session值   -->
                          @if(!empty(session('user')->username))
                         <span style="display:none">{{$i=1}}</span>
                         <div class="comment-input"> 
                            <form action="/home/commentt" method="post" style="width:622px;">
                                <!-- 隐藏域传值cid是发帖的id -->
                                <input type="hidden" name="cid" value="{{ $v->id }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="name" value="{{ $name }}">
                                <input type="hidden" name="gid" value="{{ $gid }}">
                            <input type="text" placeholder="回复楼主" class="J_commentAnswerInput" name="rcontent"> 
                            <!--  -->
                            <input  style="background:#FF6700;color:black;float:right;width:80px;height:45px;line-hight:45px;padding-right:22px;margin-left:0px;" type="submit"  value="回复"> 
                            <input type="hidden" name="replayer" value="{{session('user')->username}}">
                            <input type="hidden" name="upic" value="{{session('user')->pic}}">
                            </form>
                        </div>   
                        @else
                         <div class="comment-input"> 
                            <form action="/home/commentt" method="post" style="width:622px;">
                                <!-- 隐藏域传值cid是发帖的id -->
                                <input type="hidden" name="cid" value="{{ $v->id }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="name" value="{{ $name }}">
                                <input type="hidden" name="gid" value="{{ $gid }}">
                            <input type="text" placeholder="回复楼主" class="J_commentAnswerInput" name="rcontent"> 
                            <!--  -->
                            <input  style="background:#FF6700;color:black;float:right;width:80px;height:45px;line-hight:45px;padding-right:22px;margin-left:0px;" type="submit"  value="回复"> 
                            <input type="hidden" name="replayer" value="">
                            <input type="hidden" name="upic" value="">
                            </form>
                        </div>  
                        @endif
                        </div>
             </div>

             @endif
             <!-- 判断是否有session值   -->
               @endforeach
               <!-- 可以点赞 -->
                  <script type="text/javascript">
                    $('.amount span').click(function(){
                        
                        $(this).html(parseInt($(this).html())+1);
                    });
                  </script>
                   <!-- 可以点赞 -->
                   <div class="m-comment-box J_commentList"> 
                <ul class="m-comment-list J_listBody">
                    <li class="com-item J_resetImgCon J_canZoomBox" data-id="140710141"> 
                        <div class="comment-eval"> 
                            <i class="iconfont"></i> 超爱 
                        </div> 

                        <!-- 判断是否有session值   -->
                        @if(!empty(session('user')->username))
                        <div class="comment-answer">  
                            <!-- 这里取的是发帖表和回帖表的关联  -->                 
                         <div class="comment-input"> 
                            <form action="/home/fatie" method="post" style="width:622px;">
                                {{ csrf_field() }}
                            请输入您需要解决的问题：
                            <input type="text" placeholder="问题的标题" class="J_commentAnswerInput" name="content">
                            <input type="hidden" name="gid" value="{{$gid}}">
                            <input type="hidden" name="uid" value="{{session('user')->id}}">
                            <input type="hidden" name="time" >
                            <input type="hidden" name="name" value="{{ $name }}">
                             <input  style="background:#FF6700;color:black;float:right;width:80px;height:45px;line-hight:45px;padding-right:22px;margin-left:0px;" type="submit"  value="发表"> 
                            </form>
                        </div>   
                        </div>
                        @else
                          <div class="comment-answer">  
                            <!-- 这里取的是发帖表和回帖表的关联  -->                 
                         <div class="comment-input"> 
                            <form action="/home/fatie" method="post" style="width:622px;">
                                {{ csrf_field() }}
                            请输入您需要解决的问题：
                            <input type="text" placeholder="问题的标题" class="J_commentAnswerInput" name="content">
                            <input type="hidden" name="gid" value="{{$gid}}">
                            <input type="hidden" name="uid" value="">
                            <input type="hidden" name="time" >
                            <input type="hidden" name="name" value="{{ $name }}">
                             <input  style="background:#FF6700;color:black;float:right;width:80px;height:45px;line-hight:45px;padding-right:22px;margin-left:0px;" type="submit"  value="发表"> 
                            </form>
                        </div>   
                        </div>
                        @endif
                        <!-- 判断是否有session值   -->
         </div>
        @else

               <!-- 没有值 -->
              <!-- 这里是如果没评论可以加评论 -->
        <div class="m-comment-box J_commentList"> 
                <ul class="m-comment-list J_listBody">
                    <li class="com-item J_resetImgCon J_canZoomBox" data-id="140710141"> 
                        <div class="comment-eval"> 
                            <i class="iconfont"></i> 超爱 
                        </div> 

                        <!-- 判断是否有session值   -->
                        @if(!empty(session('user')->username))
                    <div class="comment-answer">  
                            <!-- 这里取的是发帖表和回帖表的关联  -->                 
                         <div class="comment-input"> 
                            <form action="/home/fatie" method="post" style="width:622px;">
                                {{ csrf_field() }}
                            请输入您需要解决的问题：
                            <input type="text" placeholder="问题的标题" class="J_commentAnswerInput" name="content">
                            <input type="hidden" name="gid" value="{{$gid}}">
                            <input type="hidden" name="uid" value="{{session('user')->id}}">
                            <input type="hidden" name="time" >
                            <input type="hidden" name="name" value="{{ $name }}">
                         <input  style="background:#FF6700;color:black;float:right;width:80px;height:45px;line-hight:45px;padding-right:22px;margin-left:0px;" type="submit"  value="发表"> 
                        </form>
                    </div>   
                 </div>
                 @else
                 <div class="comment-answer">  
                            <!-- 这里取的是发帖表和回帖表的关联  -->                 
                         <div class="comment-input"> 
                            <form action="/home/fatie" method="post" style="width:622px;">
                                {{ csrf_field() }}
                            请输入您需要解决的问题：
                            <input type="text" placeholder="问题的标题" class="J_commentAnswerInput" name="content">
                            <input type="hidden" name="gid" value="{{$gid}}">
                            <input type="hidden" name="uid" value="">
                            <input type="hidden" name="time" >
                            <input type="hidden" name="name" value="{{ $name }}">
                         <input  style="background:#FF6700;color:black;float:right;width:80px;height:45px;line-hight:45px;padding-right:22px;margin-left:0px;" type="submit"  value="发表"> 
                        </form>
                    </div>   
                 </div>
                 @endif


              </div>
    @endif

@endsection
