<!DOCTYPE html>
<!-- saved from url=(0067)https://account.xiaomi.com/pass/auth/profile/home?userId=1245475346 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>小米帐号 - 个人信息</title>
<link type="text/css" rel="stylesheet" href="/Home/css/reset.css">
<link type="text/css" rel="stylesheet" href="/Home/css/layout.css">
<link type="text/css" rel="stylesheet" href="/Home/css/modacctip.css">
<script src="/Home/js/jquery-1.8.3.min.js"></script>
<script src="/Home/js/oo-min.js"></script>
<script src="/Home/js/l11n.js"></script>
<script src="/Home/js/cookie.js"></script>
<script src="/Home/js/url.js"></script>
<script src="/Home/js/2014.js"></script>
<script src="/Home/js/countryCode.js"></script>
</head>
<body class="zh_CN">
	<!-- <div class="popup_mask" style="display: none;" id="loadingMask">
    <div class="bkc"></div>
    <div class="mod_wrap loadingmask">
      
    </div>
  </div> -->

  <div class="wrapper blockimportant">
  <div class="wrap">
<div class="layout bugfix_ie6 dis_none">
  <div class="n-logo-area clearfix">
    <a href="{{ url('home/home') }}" class="fl-l">
      <img src="{{ url('/Home/img/n-logo.png') }}">
    </a>
    <a id="logoutLink" class="fl-r logout" href="{{ url('home/tuichu') }}">
          退出
      </a>
  </div>
  
  <!--头像 名字-->
	<div class="n-account-area-box">
		<div class="n-account-area clearfix">
		  <div class="na-info">
        @if($list->realname)
        <p class="na-name" style="color:#999;font-weight:normal;">您好：</p>
        <p class="na-num">{{ $list->realname }}</p>
        @else
        <p class="na-name" style="color:#999;font-weight:normal;">请设置名字</p>
        <p class="na-num">{{ $list->username }}</p>
        @endif
		  </div>
		  <div class="na-img-area fl-l">
        <img src="{{ url('admin/upload').'/'.$list->pic }}">
		  </div>
		</div>
	</div>
</div>

<div class="layout">
  <div class="n-main-nav clearfix">
    <ul>
      <li class="current">
        <a title="个人信息">个人信息</a>
        <em class="n-nav-corner"></em>
      </li>
    </ul>
  </div>

  <!-- 修改密码弹窗start -->
  <div id="popUpdatePassword" class="mod_acc_tip" style="display:none;Z-index:20;position:fixed;top:60px;left:450px;">
    <form action="{{ url('home/dochange') }}" method='post'>
      {{ csrf_field() }}
      <div class="mod_tip_hd">
        <h4>修改密码</h4>
        <a class="btn_mod_close" id="closepass"><span>关闭</span></a>
      </div>
      <div class="mod_tip_bd">
        <div class="modify_pwd">
          <dl>
            <dt>原密码</dt>
            <dd class="grpOldPass">
              <label class="labelbox"><input name="pass" id="pass" class="oldPass" placeholder="输入原密码" autocomplete="off" disableautocomplete="" type="password"></label>
              <!-- 错误信息提示 -->
              <div id="ymm" class="wng_pwd err_tip err_tip_independ" style="display:none;" _text="原密码不正确">原密码不正确</div>
              <div class="empty_pwd err_tip err_tip_independ" style="display:none;" _text="原密码不能为空" id="null">原密码不能为空</div>
            </dd>
            <dt>新密码</dt>
            <dd class="grpNewPass">
              <label class="labelbox"><input name="newpass" class="newPass" id="newpass" placeholder="输入新密码" autocomplete="off" disableautocomplete="" type="password"></label>
              <br>
              <span id="passstrength"></span>
              <label class="labelbox"><input name="renewpass" class="newPass2"id="renewpass" placeholder="重复新密码" autocomplete="off" disableautocomplete="" type="password"></label>
              <!-- 错误信息显示时隐藏 -->
              <div class="pwd_mismatch err_tip_independ err_tip" style="display:none;" _text="两次输入的新密码不一致" id="diff">两次输入的新密码不一致</div>
              <!-- 错误信息显示时隐藏 -->
              <div class="empty_pwd err_tip_independ err_tip" style="display:none;" _text="新密码不能为空" id='newnull'>新密码不能为空</div>
              <!-- 错误信息显示时隐藏 -->
              <div class="empty_pwd2 err_tip_independ err_tip" style="display:none;" _text="请重复新密码" id="renull">请重复新密码</div>
              <!-- 错误信息显示时隐藏 -->
              <div class="pwd_fmt err_tip_independ err_tip" style="display:none;" _text="密码长度8~16位，其中数字，字母和符号至少包含两种">密码长度8~16位，其中数字，字母和符号至少包含两种</div>
              <!-- 错误信息显示时隐藏 -->
              <div class="same_pwd err_tip_independ err_tip" style="display:none;" _text="不能与原密码相同" id="different">不能与原密码相同</div>
              <!-- 错误信息提示去掉class=txt_tip -->
              <div class="txt_tip" _text="密码长度大于6位！建议：数字，字母和符号至少包含两种！" id="pass_type">密码长度大于6位！<br>建议：数字，字母和符号至少包含两种！</div>    
            </dd>
            <!--3次后弹出-->
            <dl class="capt_box" style="display: block;">
              <span></span>
              <dt>验证码</dt>
              <dd class="inputcode">
                <label class="labelbox chkcode"><input placeholder="输入验证码" autocomplete="off" disableautocomplete="" type="text" name='mycode' id="yzmtext"></label>
                <img class="chkcode_img" src="{{ url('/home/captchs/'.time()) }}" onclick="this.src='{{ url('/home/captchs') }}/'+Math.random()" width="135" height="40">
                <a href="" title="换一张" class="next_capt hidden">换一张</a>
              </dd>
              <div style="display:none;" class="wng_capt err_tip err_tip_independ" _text="验证码不正确，请重新输入" id="yzm">验证码不正确，请重新输入</div>
              <div style="display:none;" class="empty_capt err_tip err_tip_independ" _text="请输入图片验证码">请输入图片验证码</div>
            </dl>
          </dl>       
        </div>
        <div class="tip_btns">
          <input type="hidden" name='id' value="{{ $list->id }}">
          <input style="background:#FF6700;width:122px;height:35px;color:white;" type="submit" value="确定">
          <a class="btn_tip btn_back" title="取消" id="closepass1">取消</a>
        </div>
      </div>
    </form>
  </div>
  <!-- 修改密码弹窗end -->
  <!-- 如果URL参数为1 -->
    @if($t == 1)
      <script type="text/javascript">
      // 关闭修改密码div
      $('#closepass').click(function(){
        $('#popUpdatePassword').css('display','none');
      });
      $('#closepass1').click(function(){
        $('#popUpdatePassword').css('display','none');
      });
      // 将修改密码div显示出来
        $('#popUpdatePassword').css('display','block');
        $('#pass').blur(function(){
           if($('#pass').val()){
            $('#null').css('display','none');
          }
        });
        $('#newpass').blur(function(){
           if($('#newpass').val()){
            $('#newnull').css('display','none');
          }
          // 如果与原密码一致则提示
         if($('#pass').val() == $('#newpass').val()){
            $('#different').css('display','block');
          }else{
            $('#different').css('display','none');
          } 
          //密码为八位及以上并且字母数字特殊字符三项都包括
             var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
            
           //密码为七位及以上并且字母、数字、特殊字符三项中有两项，强度是中等 
             var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
             var enoughRegex = new RegExp("(?=.{6,}).*", "g");
             if (false == enoughRegex.test($(this).val())) {
                 $('#passstrength').html('不够长');
             } else if (strongRegex.test($(this).val())) {
                 $('#passstrength').className = 'ok';
             } else if (mediumRegex.test($(this).val())) {
                 $('#passstrength').className = 'alert';
                 $('#passstrength').html('强!');
             } else {
                 $('#passstrength').className = 'error';
                 $('#passstrength').html('一般!');
             }
        });
        $('#renewpass').blur(function(){
           if($('#renewpass').val()){
            $('#renull').css('display','none');
          }
        });
      // 提交表单事件
        $('#popUpdatePassword').submit(function(){
          // 没有填写原密码给提示，阻止提交
          if(!$('#pass').val()){
            $('#null').css('display','block');
            return false;
          }
          // 没有填写新密码给提示，阻止提交
          if(!$('#newpass').val()){
            $('#newnull').css('display','block');
            return false;
          }
           // 没有填写新密码给提示，阻止提交
          if(!$('#renewpass').val()){
            $('#renull').css('display','block');
            return false;
          }
          // 如果与原密码一致则阻止提交
          if($('#pass').val() == $('#newpass').val()){
            return false;
          }
          // 两次密码不一致则阻止提交
          if($('#newpass').val() != $('#renewpass').val()){
            return false;
          }
          // 如果密码长度小于6位阻止提交
          if($('#newpass').val().length<6){
            $('#pass_type').css('color','red');
            return false;
          }
          return true;
        });
        // renewpass失去焦点事件，两次密码不一致则提示
         $('#renewpass').blur(function(){
           if($('#newpass').val() != $('#renewpass').val()){
            $('#diff').css('display','block');
          }else{
            $('#diff').css('display','none');
          }
        });
         $('#yzmtext').focus(function(){
          $('#yzm').css('display','none');
         });
         $('#pass').focus(function(){
          $('#ymm').css('display','none');
        });
      </script>
    @endif
     @if(session('msg') == 1)
      <!-- 验证码不正确 -->
        <!-- <h2 class="m-t-0 m-b-15" style="display:none" id="idh2">{{ session('msg') }}</h2> -->
        <script type="text/javascript">
          $('#yzm').css('display','block');
        </script>
     @elseif(session('msg') == 2)
      <!-- 原密码不正确    -->
        <script type="text/javascript">
          $('#ymm').css('display','block');
        </script>
     @elseif(session('msg') == 3)
     <!-- 修改成功 -->
        <script type="text/javascript">
          alert('密码修改成功！thank you!');
        </script>  
     @elseif(session('msg') == 4)   
        <script type="text/javascript">
          alert('密码修改失败！sorry!');
        </script> 
     @endif
  <div class="n-frame">
	  <div class="uinfo c_b">
      <div class="">
        <div class="main_l">
          <div class="naInfoImgBox t_c">
            <div class="na-img-area marauto">
              <!--na-img-bg-area不能插入任何子元素-->
              <!-- <div class="na-img-bg-area"></div> -->
              <img src="{{ url('admin/upload').'/'.$list->pic }}">
            </div>
            <div style="margin-top:15px;cursor:pointer;">
				      <a id="change" title="设置头像" style="color:#36B7E8;">设置头像</a>
            </div>
          </div>        
        </div>
        <div id='txid' class="mod_acc_tip layereditinfo" style="display:none;Z-index:20;position:fixed;top:100px;left:450px;">
           <div class="mod_tip_hd">
              <h4>编辑基础资料</h4>
              <a class="btn_mod_close" href="#" id="aclose"><span>关闭</span></a>
            </div>
          <form action="{{ url('home/doupdate') }}" method="post" enctype='multipart/form-data'>
            {{ csrf_field() }}
            <br>
            <p><b style="margin-left:110px;">请上传头像：</b></p>
            <br>
            <input type="file" name='pic' style="margin-left:110px;">
            <br>
            <input type="hidden" name='oldpicname' value="{{ $list->pic }}">
            <input type="hidden" name='id' value="{{ $list->id }}">
            <br>
            <input type="submit" id="bclose" value="确认上传" style="margin-left:110px;color:white;background:#FF6700;width:122px;height:35px;">
            <br>
            <br>
            <a class="btn_tip btn_back" title="取消" id="cclose" style="margin-left:110px;">取消</a>
          </form>
        </div>
        <div class="main_r">
          <div class="framedatabox">
            <div class="fdata">
              <a class="color4a9 fr" title="编辑" id="editinfo"><i class="iconpencil"></i>编辑</a>
              <h3>基础资料</h3>    
            </div>
            <div class="fdata lblnickname">
              <p>
                <span>姓名：</span>
                  <span class="value" _empty="">
                    <span style="color:#999;">{{ $list->realname }}</span>
                  </span>
              </p>     
            </div>
            <div class="fdata lblbirthday">
              <p>
                <span>生日：</span>
                  <span class="value" _empty="">
                    <span style="color:#999;">{{ $list->birthday }}</span>
                </span>
              </p>     
            </div>
            <div class="fdata lblgender">
              <p>
                <span>性别：</span>
                  <span class="value" _empty="">
                    <span style="color:#999;">
                      @if( $list->sex  == 1 )
                      男
                      @else
                      女
                      @endif
                    </span>
                  </span>
              </p>     
            </div>
            <div class="btn_editinfo">
              <a id="editInfoWap" class="btnadpt bg_normal" href="">编辑基础资料</a>
            </div>
          </div>
          <!-- 编辑个人信息资料 e -->  
          <div id='edit' class="mod_acc_tip layereditinfo" style="display: none;Z-index:20;position:fixed;top:100px;left:450px;">
            <div class="mod_tip_hd">
              <h4>编辑基础资料</h4>
              <a class="btn_mod_close" href="" title="" id='close'><span>关闭</span></a>
            </div>
            <div class="mod_tip_bd">
              <form action="{{ url('home/doadd') }}" method="post">  
                {{ csrf_field() }}   
              <div class="wapbox editbasicinfo">
                <dl class="infobox c_b">
                  <dt>姓名：</dt>
                  <dd>
                    <label class="labelbox"><input class="nickname" name="realname" maxlength="20" placeholder="姓名" type="text"></label>
                  </dd>      
                  <dt>生日：</dt>
                  <dd>
                    <ul class="birth-box c_b">
                      <li class="biry">
                        <div>
                          <span class="titsbirth c_b">
                            <em class="birthcon" id="em1">年</em>
                            <i class="icon_cirarr"></i>
                          </span>
                        </div>
                        <div class="tits_list select-year" style="display: block;"><div class="select_panel select-year-panel"><p value="2017">2017</p><p value="2016">2016</p><p value="2015">2015</p><p value="2014">2014</p><p value="2013">2013</p><p value="2012">2012</p><p value="2011">2011</p><p value="2010">2010</p><p value="2009">2009</p><p value="2008">2008</p><p value="2007">2007</p><p value="2006">2006</p><p value="2005">2005</p><p value="2004">2004</p><p value="2003">2003</p><p value="2002">2002</p><p value="2001">2001</p><p value="2000">2000</p><p value="1999">1999</p><p value="1998">1998</p><p value="1997">1997</p><p value="1996">1996</p><p value="1995">1995</p><p value="1994">1994</p><p value="1993">1993</p><p value="1992">1992</p><p value="1991">1991</p><p value="1990">1990</p><p value="1989">1989</p><p value="1988">1988</p><p value="1987">1987</p><p value="1986">1986</p><p value="1985">1985</p><p value="1984">1984</p><p value="1983">1983</p><p value="1982">1982</p><p value="1981">1981</p><p value="1980">1980</p><p value="1979">1979</p><p value="1978">1978</p><p value="1977">1977</p><p value="1976">1976</p><p value="1975">1975</p><p value="1974">1974</p><p value="1973">1973</p><p value="1972">1972</p><p value="1971">1971</p><p value="1970">1970</p><p value="1969">1969</p><p value="1968">1968</p><p value="1967">1967</p><p value="1966">1966</p><p value="1965">1965</p><p value="1964">1964</p><p value="1963">1963</p><p value="1962">1962</p><p value="1961">1961</p><p value="1960">1960</p><p value="1959">1959</p><p value="1958">1958</p><p value="1957">1957</p><p value="1956">1956</p><p value="1955">1955</p><p value="1954">1954</p><p value="1953">1953</p><p value="1952">1952</p><p value="1951">1951</p><p value="1950">1950</p><p value="1949">1949</p><p value="1948">1948</p><p value="1947">1947</p><p value="1946">1946</p><p value="1945">1945</p><p value="1944">1944</p><p value="1943">1943</p><p value="1942">1942</p><p value="1941">1941</p><p value="1940">1940</p><p value="1939">1939</p><p value="1938">1938</p><p value="1937">1937</p><p value="1936">1936</p><p value="1935">1935</p><p value="1934">1934</p><p value="1933">1933</p><p value="1932">1932</p><p value="1931">1931</p><p value="1930">1930</p><p value="1929">1929</p><p value="1928">1928</p><p value="1927">1927</p><p value="1926">1926</p><p value="1925">1925</p><p value="1924">1924</p><p value="1923">1923</p><p value="1922">1922</p><p value="1921">1921</p><p value="1920">1920</p><p value="1919">1919</p><p value="1918">1918</p><p value="1917">1917</p><p value="1916">1916</p><p value="1915">1915</p><p value="1914">1914</p><p value="1913">1913</p><p value="1912">1912</p><p value="1911">1911</p><p value="1910">1910</p><p value="1909">1909</p><p value="1908">1908</p><p value="1907">1907</p><p value="1906">1906</p><p value="1905">1905</p><p value="1904">1904</p><p value="1903">1903</p><p value="1902">1902</p><p value="1901">1901</p><p value="1900">1900</p></div>
                          <div class="cancel_panel">
                            <div class="cancel_box">
                              <a class="btnadpt bg_white btn-cancel" href="javascript:void(0);">取消</a>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="month_day birm">              
                        <div>
                          <span class="titsbirth c_b">
                            <em class="birthcon" id='em2'>月</em>
                            <i class="icon_cirarr"></i>
                          </span>                  
                        </div>
                        <div class="tits_list select-month" style="display: block;">
                          <div class="select_panel">
                            <p value="01">01</p>
                            <p value="02">02</p>
                            <p value="03">03</p>
                            <p value="04">04</p>
                            <p value="05">05</p>
                            <p value="06">06</p>
                            <p value="07">07</p>
                            <p value="08">08</p>
                            <p value="09">09</p>
                            <p value="10">10</p>
                            <p value="11">11</p>
                            <p value="12">12</p>
                          </div>
                          <div class="cancel_panel">
                            <div class="cancel_box">
                              <a class="btnadpt bg_white btn-cancel" href="javascript:void(0);">取消</a>
                            </div>
                          </div>
                        </div>
                      </li>
                      <li class="month_day bird">                
                        <div>
                          <span class="titsbirth c_b">
                            <em class="birthcon" id="em3">日</em>
                            <i class="icon_cirarr"></i>
                          </span>                 
                        </div>
                        <div class="tits_list bird select-date" style="display: block;">
                          <div class="select_panel">
                            <p value="01">01</p>
                            <p value="02">02</p>
                            <p value="03">03</p>
                            <p value="04">04</p>
                            <p value="05">05</p>
                            <p value="06">06</p>
                            <p value="07">07</p>
                            <p value="08">08</p>
                            <p value="09">09</p>
                            <p value="10">10</p>
                            <p value="11">11</p>
                            <p value="12">12</p>
                            <p value="13">13</p>
                            <p value="14">14</p>
                            <p value="15">15</p>
                            <p value="16">16</p>
                            <p value="17">17</p>
                            <p value="18">18</p>
                            <p value="19">19</p>
                            <p value="20">20</p>
                            <p value="21">21</p>
                            <p value="22">22</p>
                            <p value="23">23</p>
                            <p value="24">24</p>
                            <p value="25">25</p>
                            <p value="26">26</p>
                            <p value="27">27</p>
                            <p value="28">28</p>
                            <p value="29">29</p>
                            <p value="30">30</p>
                            <p value="31">31</p>
                          </div>
                          <div class="cancel_panel">
                            <div class="cancel_box">
                              <a class="btnadpt bg_white btn-cancel" href="javascript:void(0);">取消</a>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>         
                  </dd>        
                  <dt>性别：</dt>
                  <dd class="checkbox infosex">
                   <!--  <span value="m"><i class="icon_select iconinfosex"></i><em>男</em></span>
                    <span value="f"><i class="icon_select iconinfosex"></i><em>女</em></span> -->
                    <input type="radio" name="sex" class="icon_select iconinfosex" value="1">男
                    <input type="radio" name="sex" class="icon_select iconinfosex" value="2">女
                  </dd>
                </dl>
                <div class="err_tip empty_name err_tip_independ" style="display:none;" _text="名字不能为空">名字不能为空</div> 
              <div class="err_tip sys_err err_tip_independ" style="display:none;" _text="系统错误，请稍候再试">系统错误，请稍候再试</div> 
              <div class="err_tip empty_param err_tip_independ" style="display:none;" _text="参数为空">参数为空</div> 
              <div class="err_tip bad_param err_tip_independ" style="display:none;" _text="参数错误">参数错误</div> 
              <div class="err_tip bad_nickname err_tip_independ" style="display:none;" _text="名字长度不合法，应为2-20个字符">名字长度不合法，应为2-20个字符</div>
              <div class="err_tip mismatch_nickname err_tip_independ" style="display:none;" _text="昵称不能含有字符<>/">昵称不能含有字符&lt;&gt;/</div>
              <div class="err_tip bad_birthday err_tip_independ error-birth" style="display:none;" _text="生日格式不合法">生日格式不合法</div>
              <div class="err_tip bad_gender err_tip_independ" style="display:none;" _text="性别参数不合法">性别参数不合法</div>
              <div class="err_tip empty_birthday err_tip_independ error-birth" style="display:none;" _text="请完整选择生日信息">请完整选择生日信息</div>
              <div class="err_tip invalid_birthday err_tip_independ error-birth" style="display:none;" _text="请提供您的真实信息">请提供您的真实信息</div>
              </div>      
              <div class="tip_btns">
                <input style="background:#FF6700;width:122px;height:35px;color:white;" type="submit" value="保存" id="button">
                <a class="btn_tip btn_back" id="close1" title="取消">取消</a>
              </div>
              <input type="hidden" name='id' value="{{ $list->id }}">
              <input type="hidden" name="birthday" id="birthday">
              </form> 
            </div>  
          </div>
        </div>
      </div>  
	  </div>
  </div>
</div>


<div class="n-footer">
  <p class="nf-intro"><span>小米公司版权所有-京ICP备10046444-<a class="beianlink beian-record-link" target="_blank" href="/www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134"><span><img src="{{ url('/Home/img/ghs.png') }}"></span>京公网安备11010802020134号</a>-京ICP证110507号</span></p>
</div>
<script src="/Home/js/placeholder.js"></script>
<style>
  .btn-action-go{ display:none;}
</style>
<script>
OO(['com.mi.passport.portal.2014'],function(portal2014,O){
	var Profile = portal2014.Profile;
	var profile = new Profile({
			
		});
	profile.render();
});
</script>
<style type="text/css">
/*干掉该死的IE6的遮罩问题*/
#loadingMask .bkc{
	_height:200%;
}
</style>
<div id="img_cache" style="visibility:hidden;"></div>
</body></html>
<script type="text/javascript" src='{{ asset("js/jquery-1.8.3.min.js") }}'></script>
<script type="text/javascript">
  $('#editinfo').click(function(){
    $('#edit').css('display','block');
  });
  $('#close').click(function(){
    $('#edit').css('display','none');
  });
  $('#close1').click(function(){
    $('#edit').css('display','none');
  });
  $('#button').click(function(){
    $('#birthday').val($('#em1').html()+'-'+$('#em2').html()+'-'+$('#em3').html());
  });
  $('#editinfo').mouseover(function(){
    $(this).css('cursor','pointer');
  });
  $('#change').click(function(){
    $('#txid').css('display','block');
  });
  $('#aclose').click(function(){
    $('#txid').css('display','none');
  });
  $('#bclose').click(function(){
    $('#txid').css('display','none');
  });
  $('#cclose').click(function(){
    $('#txid').css('display','none');
  });
</script>