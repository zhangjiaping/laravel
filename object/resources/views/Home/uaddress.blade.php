@extends('Home.u_parent')
@section('address')
<!-- 地址管理的css -->
<link rel="stylesheet" type="text/css" href="{{ url('/Home/checkorder/checkout.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('/Home/checkorder/address-edit.min.css') }}">
<script src="{{ url('Home/js/jquery-1.8.3.min.js') }}"></script>
<!-- 收货地址 -->
<div class="uc-box uc-main-box" id='address' style='display:block;'>
    <div class="box-hd" id='head' style='margin-left:50px;'>
        <h1 class="title" style='font-size:20px;'>收货地址</h1>
    </div>
    <div class="box-bd" id='body' style='margin-left:50px;'>
        <div class="user-address-list J_addressList clearfix">
            <div class="address-item address-item-new" data-type="" id="J_newAddress">
                <i class="iconfont"></i>
                添加新地址
            </div> 
            @foreach($address as $v)
                <div class="address-item J_addressItem" id='item'>
                     <dl><dt><span class="tag"></span> 
                        <em class="uname">{{ $v->consignee }}</em> 
                        </dt><dd class="utel">{{ $v->consignee_phone }}</dd> 
                        <dd class="uaddress">{{ $v->province }} {{ $v->city }} 
                            {{ $v->county }} <br> {{ $v->detail }} 
                        </dd> 
                    </dl> 
                    <div class="actions"><a href="javascript:edit({{ $v->id }})" id="reset" class="modify J_addressModify">修改</a><a class="modify J_addressDel" href="javascript:doDel({{ $v->id }})">删除</a></div> 
                </div>
            @endforeach        
        </div>
    </div>
</div>
<!-- 添加收货地址 -->
<div class="modal fade modal-hide modal-edit-address in" id="J_modalEditAddress" aria-hidden="false" style="top: 20px; left: 362.5px; display: none; height:430px;">
    <form action="{{ url('home/userinfo') }}" method='post' id='address' name='myform'>
        {{ csrf_field() }} 
        <div class="modal-body">
            <div class="address-edit-box" style="">
                <div class="box-main" style='height:300px;margin-top:-20px;'>
                    <div class="form-section">
                        <label class="" style='color:red;'>姓名</label>
                        <input class="input-text" type="text" id="user_name" name="consignee" placeholder="收货人姓名">
                        <p class="" style='display:none;'>收货人姓名，最少2个最多20个中文字</p>
                    </div>
                    <div class="form-section">
                        <label class="" style='color:red;'>手机号</label>
                        <input class="input-text J_addressInput" type="text" id="user_phone" name="consignee_phone" placeholder="11位手机号">
                        <p class="" style='display:none;'>请输入正确的手机号</p>
                    </div>
                    <div class="form-section form-select-2 clearfix">
                        <div class="xm-select select-province ">
                            <div class="dropdown">
                                <label class="iconfont" for="J_province"></label>
                                <select id='J_province'>
                                    <option value='0'>省份/自治区</option>
                                </select>
                            </div>
                        </div>
                        <div class="xm-select select-city">
                            <div class="dropdown">
                                <label class="iconfont" for="J_city"></label>
                                <select id='J_city'>
                                    <option value='0'>城市/地区</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-section clearfix form-select-2">
                        <div class="xm-select select-county">
                            <div class="dropdown">
                                <label class="iconfont" for="J_county"></label>
                                <select id='J_county'>
                                    <option value='0'>区/县</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="address-supp-tip hide" id="J_addressSuppTip">您的收货地址需要补全街道信息</div>
                    <div class="form-section">
                        <label class="" style='color:red;'>详细地址</label>
                        <textarea class="input-text J_addressInput" type="text" id="adress" name="detail" placeholder="详细地址，路名或街道名称，门牌号"></textarea>
                        <p class="" style='display:none;'>详细地址最小为 5 个字，最大32个字</p>
                    </div>
                </div>
                <div class="form-confirm clearfix" style='margin-top:40px;'>
                    <a href="javascript:void(0);" class="btn btn-primary" id="J_save">保存</a>
                    <a href="javascript:void(0);" class="btn btn-gray" id="J_cancel">取消</a>
                </div>
            </div>
        </div>
        <input type='hidden' name='province'>
        <input type='hidden' name='city'>
        <input type='hidden' name='county'>
    </form>   
</div>
<form action="{{ url('home/userinfo/') }}" method='post' name='del'>
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>
<!-- 添加收货地址 -->
<script type="text/javascript">
    //删除收货地址
    function doDel(id)
    {
        if(confirm('确定要删除吗？')){
            var form = document.del;
            form.action = "{{ url('home/userinfo') }}/"+id;
            form.submit();
        }
    } 
    $('#J_address').click(function(){
        $('.portal-content-box').css('display','none');
        $('.order-list-box').removeClass('active').addClass('hide');
        $('#head').css('display','block');
        $('#body').css('display','block');
    });
    //表单提交验证
    $('#J_save').click(function(){
        //验证用户名
        var uname = $('#user_name').val();
        if( uname ==" " || uname.length < 2 || uname.length>20 ){
            $('#user_name').next('p').css('display','block');
            return false;
        }else{
            $('#user_name').next('p').css('display','none');
        }
        //验证手机号
        var phone = $('#user_phone');
        if( phone.val() =="" || ( phone.val() !="" && !/^1[3458]{1}[0-9]{9}$/.test(phone.val()) ) ){
            $('#user_phone').next('p').css('display','block');
            return false;
        }else{
            $('#user_phone').next('p').css('display','none');
        }
        //验证是否选择了城市
        if($('#J_province :selected').val() == 0 || $('#J_city :selected').val() == 0 || $('#J_county :selected').val() ==0){
            $('.select-province').addClass('xm-select-error');
            $('.select-city').addClass('xm-select-error');
            $('.select-county').addClass('xm-select-error');
            return false;
        }else{
            $('.select-province').removeClass('xm-select-error');
            $('.select-city').removeClass('xm-select-error');
            $('.select-county').removeClass('xm-select-error');
        }
        //验证详细地址
        var detail = $('#adress').val();
        if( detail=="" || detail.length < 5 || detail.length > 32 ){
            $('#adress').next('p').css('display','block');
            $('#detail_error').css('display','block');
            return false;
        }else{
            $('#adress').next('p').css('display','none');
            $('#detail_error').css('display','none');
        }
        $('[name="province"]').val($('#J_province :selected').text());
        $('[name="city"]').val($('#J_city :selected').text());
        $('[name="county"]').val($('#J_county :selected').text());
        var form = document.myform;
        form.action = "{{ url('home/userinfo') }}";
        form.submit();
    });
    $(function(){    
        $('#J_newAddress').click(function(){
        $('[name="consignee"]').val('');
        $('[name="consignee_phone"]').val('');
        $('[name="detail"]').val(' ');
        $('.modal-backdrop').css('display','block');
        $('#J_modalEditAddress').css('display','block');
        });            
        $.ajax({
            url:'/ajaxdemo/get',
            type:'get',
            async:true,
            data:{upid:0},
            dataType:'json',
            success:function(data)
            {
                for (var i = 0; i < data.length; i++) {
                    $('#J_province').append("<option value="+data[i].id+">"+data[i].name+"</option>");
                };
            }
        });
        $('#J_province').on("change",function(){
            $('#J_city option:first').siblings().remove();
            $('#J_county option:first').siblings().remove();
            if($(this).val() != '0'){
                var ob = $(this);
                $.ajax({
                    url:'/ajaxdemo/post',
                    type:'post',
                    async:true,
                    // ,'_token':"{{ csrf_token() }}"
                    data:{upid:$(this).val(),'_token':"{{ csrf_token() }}"},
                    dataType:'json',
                    success:function(data)
                    {
                        if(data.length>0){
                            for (var i = 0; i < data.length; i++) {
                                $('#J_city').append("<option value="+data[i].id+">"+data[i].name+"</option>");
                            }
                        }
                    }
                });
            }
        });
        $('#J_city').on("change",function(){
            $('#J_county option:first').siblings().remove();
            if($(this).val() != '0'){
                var ob = $(this);
                $.ajax({
                    url:'/ajaxdemo/post',
                    type:'post',
                    async:true,
                    // ,'_token':"{{ csrf_token() }}"
                    data:{upid:$(this).val(),'_token':"{{ csrf_token() }}"},
                    dataType:'json',
                    success:function(data)
                    {
                        if(data.length>0){
                            for (var i = 0; i < data.length; i++) {
                                $('#J_county').append("<option value="+data[i].id+">"+data[i].name+"</option>");
                            }
                        }
                    }
                });
            }
        });
    });       
    $('#J_cancel').click(function(){
        $('.modal-backdrop').css('display','none');
        $('#J_modalEditAddress').css('display','none');
    });  
</script>
<!-- 修改收货地址 -->
<div class="modal fade modal-hide modal-edit-address in" id="edit" aria-hidden="false" style="top: 0px; left: 475.5px; display: none;height:430px;">
    <form action="{{ url('Home/checkout') }}" method='post' id='address' name='editform'>
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="address-edit-box">
            <div class="box-main" style='height:300px;margin-top:-20px;'>
                <div class="form-section form-section-active">
                    <label class="" style='color:red;'>姓名</label>
                    <input class="input-text J_addressInput" type="text" id="uname" name="consignee">
                    <p class="" style='display:none;'>收货人姓名，最少2个最多20个中文字</p>
                </div>
                <div class="form-section form-section-active">
                    <label class="" style='color:red;'>手机号</label>
                    <input class="input-text J_addressInput" type="text" id="uphone" name="consignee_phone" >
                    <p class="" style='display:none;'>请输入正确的手机号</p>
                </div>
                <div class="form-section form-select-2 clearfix">
                    <div class="xm-select select-province">
                        <div class="dropdown">
                            <label class="iconfont" for="J_province"></label>
                            <select id='cid' name='province'>
                                <option value='0'>省份/自治区</option>
                            </select>
                        </div>
                    </div>
                    <div class="xm-select select-city">
                        <div class="dropdown">
                            <label class="iconfont" for="J_city"></label>
                            <select id='city' name='city'>
                                <option value='0'>城市/地区</option>
                            </select>
                         </div>
                    </div>
                </div>
                <div class="form-section clearfix form-select-2">
                    <div class="xm-select select-county">
                        <div class="dropdown">
                            <label class="iconfont" for="J_county"></label>
                            <select id='country'>
                                <option value='0'>区/县</option>
                            </select>
                        </div>
                    </div>     
                </div> 
                <div class="address-supp-tip hide" id="J_addressSuppTip">您的收货地址需要补全街道信息</div>
                <div class="form-section form-section-active">
                    <label style='color:red;'>详细地址</label>
                    <textarea class="input-text J_addressInput" type="text" id="uadress" name="detail"></textarea>
                    <p style='display:none;'>详细地址最小为 5 个字，最大32个字</p>
                </div>
            </div>
            <div class="form-confirm clearfix" style='margin-top:40px;'>
                <a href="javascript:void(0);" class="btn btn-primary" id="save">保存</a>
                <a href="javascript:void(0);" id='cancel' class="btn btn-gray" id="J_cancel">取消</a>
            </div>
        </div> 
        <input type='hidden' name='province'>
        <input type='hidden' name='city'>
        <input type='hidden' name='county'> 
    </form>  
    <input type='hidden' name='id'>  
</div>  
<script type="text/javascript">
    $('#save').click(function(){
        //验证用户名
        var uname = $('#uname').val();
        if( uname ==" " || uname.length < 2 || uname.length>20 ){
            $('#uname').next('p').css('display','block');
            $('#user_err').css('display','block');
            return false;
        }else{
            $('#uname').next('p').css('display','none');
            $('#user_err').css('display','none');
        }
        //验证手机号
        var phone = $('#uphone');
        if( phone.val() =="" || ( phone.val() !="" && !/^1[3458]{1}[0-9]{9}$/.test(phone.val()) ) ){
            $('#uphone').next('p').css('display','block');
            $('#phone_err').css('display','block');
            return false;
        }else{
            $('#uphone').next('p').css('display','none');
            $('#phone_err').css('display','none');
        }
        //验证是否选择了城市
        if($('#cid option').val() < 0 || $('#city option').val() < 0 || $('#country option').val() < 0){
            $('.select-province').addClass('xm-select-error');
            $('.select-city').addClass('xm-select-error');
            $('.select-county').addClass('xm-select-error');
            return false;
        }
         //验证详细地址
        var detail = $('#uadress').val();
        if( detail=="" || detail.length < 5 || detail.length > 32 ){
            $('#uadress').next('p').css('display','block');
            return false;
        }else{
            $('#uadress').next('p').css('display','none');
        }
        var id = $('[name="id"]').val();
        $('[name="province"]').val($('#cid :selected').text());
        $('[name="city"]').val($('#city :selected').text());
        $('[name="county"]').val($('#country :selected').text());
        var form = document.editform;
        form.action = "{{ url('home/userinfo') }}/"+id;
        form.submit(); 
    });
    $('#cancel').click(function(){
        $('.modal-backdrop').css('display','none');
        $('#edit').css('display','none');
    });
    function edit(id)
    {
        $.ajax({
            url:"{{ url('home/checkout') }}/"+id+'/edit',
            type:'get',
            async:true,
            data:{id:id},
            dataType:'json',
            success:function(data)
            {
                console.log(data); 
                var edit = '';
                var province = '';
                var city = '';
                var country = '';
                for (var i = 0; i < data.length; i++) {
                     edit = data[0];
                     province = data[1];
                     city = data[2];
                     country = data[3];
                };
                console.log(edit); 
                console.log(province);
                console.log(city);
                console.log(country);
                for (var i = 0; i < city.length; i++) {
                    $('#city').append("<option value="+city[i].id+">"+city[i].name+"</option>");
                };
                for (var i = 0; i < country.length; i++) {
                    $('#country').append("<option value="+country[i].id+">"+country[i].name+"</option>");
                };
                if(edit){
                    $('[name="id"]').val(edit.id);
                    $('[name="consignee"]').val(edit.consignee);
                    $('[name="consignee_phone"]').val(edit.consignee_phone);
                    $('#uadress').text(edit.detail);
                    $('#cid option[value="0"]').text(edit.province);
                    $('#city option[value="0"]').text(edit.city);
                    $('#country option[value="0"]').text(edit.county);
                }
                $('.modal-backdrop').css('display','block');
                $('#edit').css('display','block');
            }
        });   
    }  
    $.ajax({
        url:'/ajaxdemo/get',
        type:'get',
        async:true,
        data:{upid:0},
        dataType:'json',
        success:function(data)
        {
            // console.log(data);
            //遍历从数据库查出来的数据，生成option选项追加到select里
            for (var i = 0; i < data.length; i++) {
                $('#cid').append("<option value="+data[i].id+">"+data[i].name+"</option>");
            };
        },
        error:function()
        {
            alert('网络超时，请刷新重试');
        }
    });
    $('#cid').on("change",function(){
        $('#city option[value="0"]').text('城市/地区');
        $('#country option[value="0"]').text('区/县');
        $('#city option:first').siblings().remove();
        $('#country option:first').siblings().remove();
        if($(this).val() != '0'){
            var ob = $(this);
            $.ajax({
                url:'/ajaxdemo/post',
                type:'post',
                async:true,
                // ,'_token':"{{ csrf_token() }}"
                data:{upid:$(this).val(),'_token':"{{ csrf_token() }}"},
                dataType:'json',
                success:function(data)
                {
                    if(data.length>0){                        
                        for (var i = 0; i < data.length; i++) {
                            $('#city').append("<option value="+data[i].id+">"+data[i].name+"</option>");
                        };
                    }
                },
                error:function()
                {
                    alert('网络超时，请刷新重试');
                }
            });
        }
    });
    $('#city').on("change",function(){
        $('#country option[value="0"]').text('区/县');
        $('#country option:first').siblings().remove();
        if($(this).val() != '--请选择--'){
            var ob = $(this);
            $.ajax({
                url:'/ajaxdemo/post',
                type:'post',
                async:true,
                // ,'_token':"{{ csrf_token() }}"
                data:{upid:$(this).val(),'_token':"{{ csrf_token() }}"},
                dataType:'json',
                success:function(data)
                {
                    if(data.length>0){
                        for (var i = 0; i < data.length; i++) {
                            $('#country').append("<option value="+data[i].id+">"+data[i].name+"</option>");
                        }
                    }
                }
            });
        }
    });

</script>
<script type="text/javascript" async="" src="{{ url('/Home/checkorder/unjcV2.js') }}"></script>
<script src="{{ url('/Home/checkorder/hm.js') }}"></script>
<script type="text/javascript" async="" src="{{ url('/Home/checkorder/mstr.js') }}"></script>
<!-- 模态框 -->
<div class="modal-backdrop fade in" style="width: 100%; height: 1935px;display:none;"></div>
@endsection