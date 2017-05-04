       <!-- 继承父类模板 -->
        @extends('Home.parent')
        @section('content')
     <div class="uc-box uc-main-box" >
        <div class="uc-content-box">
            <div class="box-hd">
                <h1 class="title">喜欢的商品</h1>
                <div class="more clearfix hide">
                    <ul class="filter-list J_addrType">
                        <li class="first active"><a href="http://order.mi.com/user/favorite?r=66744.1493204569" data-stat-id="bb5f4704448262e5" onclick="_msq.push(['trackEvent', 'feb1a1bd3287842e-bb5f4704448262e5', 'http://order.mi.com/user/favorite', 'pcpid', '']);">喜欢的商品</a></li>
                        <li><a href="http://order.mi.com/user/favorite?is_sale=0&amp;r=66744.1493204569" data-stat-id="ca8474002200309a" onclick="_msq.push(['trackEvent', 'feb1a1bd3287842e-ca8474002200309a', 'http://order.mi.com/user/favorite', 'pcpid', '']);">已下架的商品</a></li>
                    </ul>
                </div>
            </div>
            <div class="box-bd">
                <div class="xm-goods-list-wrap">
                    <ul class="xm-goods-list clearfix">
                    	@foreach($goods as $g)
                    	@foreach($lovelist as $love)
                    	@if($g->id == $love->gid)
                        <li class="xm-goods-item" style="float:left;width:244px;height:237.5px">
                            <div class="figure figure-img" style="text-align:center;">
                            	<a target="_blank" data-stat-id="e7ed1a04f9b417df" onclick="_msq.push(['trackEvent', 'feb1a1bd3287842e-e7ed1a04f9b417df', '//item.mi.com/1164900022.html', 'pcpid', '']);">
                            		<img src="{{ url('admin/upload').'/'.$g->pic }}" width="160" height="160">
                            	</a>
                            </div>
                            <h3 class="title" style="text-align:center;">
                            	<a href="{{ url('home/xiangqing').'/'.$g->id }}" target="_blank" data-stat-id="bcd519880dd32670" onclick="_msq.push(['trackEvent', 'feb1a1bd3287842e-bcd519880dd32670', '//item.mi.com/1164900022.html', 'pcpid', '']);">
                            		{{ $g->name }}
                            	</a>
                            </h3>
                            <p class="price" style="text-align:center;">{{ $g->price }}</p>
                            <p class="rank"></p>
                            <div class="actions">
                                <a style="display:none;float:left;" id="1164900022_favorite" class="btn btn-small btn-line-gray J_delFav">
                                	删除
                                </a>
                            	<a style="display:none;float:right;" class="btn btn-small btn-primary"  href="{{ url('home/xiangqing').'/'.$g->id }}">
                            		查看详情
                            	</a>
                                <span style="display:none">{{$love->id}}</span>
                         	</div>
                            
                        </li>
                        @endif
                        @endforeach
                        @endforeach
                    </ul>
                </div>
                <div class="xm-pagenavi"></div>    
            </div>
        </div>
    </div>
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
    // 定义变量用来保存id
    var id = null;
    var aa = null;
    // 鼠标在li上显示删除和查看，反之隐藏
    $('.xm-goods-item').mouseover(function(){
        $(this).children().children('.btn-small').each(function(){
            $(this).css('display','block');
        })   
    }).mouseout(function(){
        $(this).children().children('.btn-small').each(function(){
            $(this).css('display','none');
        }) 
    });
    // 点击删除是获取到id
    $('.J_delFav').each(function(){
        $(this).click(function(){
            aa = $(this);
            id = $(this).siblings('span').html();
             $.ajax({
                    url:"{{ url('home/dellove') }}",
                    async:true,
                    type:'get',
                    data:{id:id},
                    success:function(data){
                        aa.parent().parent().remove();
                    },
                    error:function(){
                        alert('ajax请求失败');                        
                    }
                });
             });
         });
    
   
    </script>
@endsection