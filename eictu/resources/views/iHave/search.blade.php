@extends('layouts.app')
@section('title')
eICTuStudentGoodsSearch - Danh sách đồ cũ đang rao
@endsection
@section('content')
<div class="container">
    @if(Auth::check() && Auth::user()->type==3)
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-xs-12">
          <form  class="nav-form" action="{{url('iHave')}}" role="form" method="post" accept-charset="utf-8">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <div class="input-group add-on" style="padding: 10px; height: 70px" >
              <textarea style="height: 70px" placeholder="Mô tả tài sản cũ của bạn ở đây để cả thế giới biết.Cho đi chính là đã nhận về." name="content" class="form-control" rows="2"></textarea>
              <div class="input-group-btn">
                <button type="submit" class="btn" style="background: #ff7b07; color: #ffffff; height: 70px;border-radius: 0 8px 8px 0px;">ĐĂNG NGAY</button>
              </div>
            </div>
          </form>
          <span>Bạn có sách cũ, đồ dùng cũ, quần áo cũ, bàn ghế cũ, xe đạp cũ… hãy cho đi để nhận lại.</span>
          <hr>
        </div>
      </div>
    @endif
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2 ">
      <div style="padding-left: 23px;">Các đồ cũ đang có trong chợ.</div>
      <ul type="none" class=" list-group " >
        @foreach($data as $item)
          <li style="height:80px; padding-top: 10px"><a style="height:70px;" class="list-group-item" href="{{url('iHave/detail', $item->id)}}">
            <ul type="none">
              <li style="float: left;padding-right: 10px;"><img src="<?php if($item->avatar!=null)echo $item->avatar;else ?>{{url('img/avatar_null.png')}}" height="50px" width="50px"/></li>
              <li>
                <ul type="none">
                  <li><?php echo $item->name;?></li>
                  <li><?php echo str_limit($item->content,100,'...');?></li>
                </ul>
              </li>
            </ul>
          </a></li>
        @endforeach
        <?php echo "<li><center>".$data->render()."</center></li>"?>
      </ul>
    </div>
  </div>
</div>
@endsection
