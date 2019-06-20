@if(!empty(request()->input('activity_id')) && !empty($aData[0]->activity->title))
    @php $pageTitle = $aData[0]->activity->title.'-评委' @endphp
@endif
@extends('tw::layout.base',['header' => "活动管理",'pageTitle'=>$pageTitle??'评委',"pageBtnName"=>'活动列表'])
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border screen-box">
                        <h3 class="box-title"></h3>
                        <div class="pull-left">
                            {!! button(route('tw.judges.create'),'create') !!}
                            {!! button(route('tw.judges.destroy','all'),'delete_all') !!}
                        </div>
                        @include('tw::layout.search')
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover table-sort">
                            <tr>
                                <th width="35"><input type="checkbox" class="minimal checkbox-toggle"></th>
                                <th>序号</th>
                                <th>评委名称</th>
                                <th>图像</th>
                                @if(empty(request()->input('activity_id')))
                                <th>所属活动</th>
                                @endif
                                <th>评委二维码</th>
                                <th>连接状态</th>
                                <th>添加日期</th>
                                <th>操作</th>
                            </tr>
                            @foreach($aData as $vo)
                                <tr>
                                    <td style="vertical-align:middle"><input type="checkbox" name="id[]" value="{{$vo['hid']}}" class="minimal"></td>
                                    <td style="vertical-align:middle">{{item_no($loop->iteration)}}</td>
                                    <td style="vertical-align:middle"><span class="editable" data-pk="{{$vo['id']}}" data-name="name" data-url="{{tw_route('tw.judges.update',$vo['id'])}}" >{{$vo['name']}}</span></td>
                                    <td style="vertical-align:middle"><img src="{{$vo['img']}}" style="width:40px;border-radius:40%;" /></td>
                                    @if(empty(request()->input('activity_id')))
                                        <td style="vertical-align:middle">{{$vo->activity->title}}</td>
                                    @endif
                                    <td style="vertical-align:middle">{!! $vo['qr_code'] !!}</td>
                                    <td style="vertical-align:middle">
                                        <a href="javascript:void(0);" class='linkstate editimg fa @if($vo['link_state'] == 1)fa-check-circle text-green @else fa-times-circle text-red @endif'>
                                        </a>
                                    </td>
                                    <td style="vertical-align:middle">{{$vo['created_at']}}</td>
                                    <td style="vertical-align:middle">
                                        {!! button(tw_route('tw.judges.edit',$vo['id']),'edit') !!}
                                        {!! button(tw_route('tw.judges.destroy',$vo['id']),'delete',$vo['id']) !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        {{ $aData->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(function () {
            $(".linkstate").on('click',function () {
                return false;
            })
        })
    </script>
@endsection
