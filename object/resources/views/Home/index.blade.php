
       <!-- 继承父类模板 -->
        @extends('Home.parent')
        @section('content')
<!-- 获取用户退出成功的信息 -->
    @if(session('msg'))
        <script type="text/javascript">
          alert("{{ session('msg') }}");
        </script>
    @endif

         <!-- 大图轮播 -->
         <div id="big_banner_pic_wrap">
             <ul id="big_banner_pic">
                @foreach($lb as $l)
                 <li><img src="{{ url('Admin/upload').'/'.$l->pic }}" width="1226" height="460"></li>
                @endforeach 
             </ul>
         </div>
         <div id="big_banner_change_wrap">
             <div id="big_banner_change_prev">&lt;</div>
             <div id="big_banner_change_next">&gt;</div>
         </div>
     </div>
     <div id="head_other_wrap">
         <div id="head_other">
             <ul>
                 <li>
                     <div id="div1">
                         <p>START</p>
                         <p>开房购买</p>
                     </div>
                 </li>
                 <li>
                     <div id="div2">
                         <p>GROUND</p>
                         <p>企业团购</p>
                     </div>
                 </li>
                 <li>
                     <div id="div3">
                         <p>RETROFIT</p>
                         <p>官方产品</p>
                     </div>
                 </li>
                 <li>
                     <div id="div4">
                         <p>CHANNEL</p>
                         <p>F码通道</p>
                     </div>
                 </li>
                 <li>
                     <div id="div5">
                         <p>RECHARGE</p>
                         <p>话费充值</p>
                     </div>
                 </li>
                 <li>
                     <div id="div6">
                         <p>SECURITY</p>
                         <p>防伪检查</p>
                     </div>
                 </li>
             </ul>
         </div>
         <div class="head_other_ad"><img src="{{ url('Home/img/T184E_BQWT1RXrhCrK.jpg') }}"></div>
         <div class="head_other_ad"><img src="{{ url('Home/img/T1yvd_BQDT1RXrhCrK.jpg') }}"></div>
         <div class="head_other_ad"><img src="{{ url('Home/img/T1mahQBmKT1RXrhCrK.jpg') }}"></div>
    </div>
     <div id="head_hot_goods_wrap">
         <div id="head_hot_goods_title">
             <span class="title_span">小米明星单品</span>
             <div id="head_hot_goods_change">
                 <span id="head_hot_goods_prave"><</span>
                 <span id="head_hot_goods_next">></span>
             </div>
         </div>
         <div id="head_hot_goods_content">
             <ul>
                @foreach($star as $s)
                    <li>
                        <a href = "{{ url('home/xiangqing').'/'.$s->id }}"><img src="{{ url('Admin/upload'.'/'.$s->pic) }}" width="160" height="160"></a>
                        <a>{{ $s->name }}</a>
                        <a></a>
                    </li>
                @endforeach
             </ul>
         </div>
     </div>
     <div id="main_show_box">
         <div id="floor_1">
              <div id="floor_head">
                  <span class="title_span">智能硬件</span>
              </div>
         </div>
         <div class="floor_goods_wrap">
             <ul style="width:1240px;height:620px;overflow:hidden">
                 <li class="floor_goods_wrap_li">
                     <a><img src="{{ url('Home/img/T1IhLjBC_T1RXrhCrK.jpg') }}" ></a>
                 </li>
                @foreach($hard as $h)
                    <li class="floor_goods_wrap_li">
                        <a class="floor_goods_img" href = "{{ url('home/xiangqing').'/'.$h->id }}"><img src="{{ url('Admin/upload'.'/'.$h->pic) }}"  width="160" height="160"></a>
                        <a class="floor_goods_tit" href = "{{ url('home/xiangqing').'/'.$h->id }}">{{ $h->name }}</a>
                        <a class="floor_goods_txt" href = "{{ url('home/xiangqing').'/'.$h->id }}">{{ $h->title }}</a>
                        <a class="floor_goods_price" href = "{{ url('home/xiangqing').'/'.$h->id }}">{{ $h->price }}元</a>
                    </li>
                @endforeach
                 <div style="clear:both;"></div>
             </ul>
         </div>
     </div>

     <div id="main_show_box">
         <div id="floor_1">
              <div id="floor_head">
                  <span class="title_span">搭配</span>
              </div>
         </div>
         <div class="floor_goods_wrap">
             <ul style="width:1240px;height:620px;overflow:hidden">
                 <li class="floor_goods_wrap_li" style="width:234px;height:300px;">
                     <a class="floor_goods_img"><img src="{{ url('Home/img/chapai.png') }}"></a>  
                 </li>
                @foreach($dp as $d)
                    <li class="floor_goods_wrap_li">
                        <a class="floor_goods_img" href = "{{ url('home/xiangqing').'/'.$d->id }}"><img src="{{ url('Admin/upload'.'/'.$d->pic) }}"  width="160" height="160"></a>
                        <a class="floor_goods_tit" href = "{{ url('home/xiangqing').'/'.$d->id }}">{{ $d->name }}</a>
                        <a class="floor_goods_txt" href = "{{ url('home/xiangqing').'/'.$d->id }}">{{ $d->title }}</a>
                        <a class="floor_goods_price" href = "{{ url('home/xiangqing').'/'.$d->id }}">{{ $d->price }}元</a>
                    </li>
                @endforeach
                 <div style="clear:both;"></div>
             </ul>
         </div>
     </div>

     <div id="main_show_box">
         <div id="floor_1">
              <div id="floor_head">
                  <span class="title_span">配件</span>
              </div>
         </div>
         <div class="floor_goods_wrap">
             <ul style="width:1240px;height:620px;overflow:hidden">
                 <li class="floor_goods_wrap_li" style="width:234px;height:300px;">
                     <a class="floor_goods_img"><img src="{{ url('Home/img/2017-04-15_203524.png') }}" ></a>  
                 </li>
                @foreach($pj as $p)
                    <li class="floor_goods_wrap_li">
                        <a class="floor_goods_img" href = "{{ url('home/xiangqing').'/'.$p->id }}"><img src="{{ url('Admin/upload'.'/'.$p->pic) }} " width="160" height="160"></a>
                        <a class="floor_goods_tit" href = "{{ url('home/xiangqing').'/'.$p->id }}">{{ $p->name }}</a>
                        <a class="floor_goods_txt" href = "{{ url('home/xiangqing').'/'.$p->id }}">{{ $p->title }}</a>
                        <a class="floor_goods_price" href = "{{ url('home/xiangqing').'/'.$p->id }}">{{ $p->price }}元</a>
                    </li>
                @endforeach
                 <div style="clear:both;"></div>
             </ul>
         </div>
     </div>
     @endsection