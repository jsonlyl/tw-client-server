@if(!empty(request()->get('activity_id')) && !empty($aData[0]->activity->title))
    @php $pageTitle = $aData[0]->activity->title.'-选手' @endphp
@endif
@extends('tw::layout.base',['header' => "活动管理",'pageTitle'=>$pageTitle??'选手',"pageBtnName"=>'活动列表'])
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border screen-box">
                        <h3 class="box-title"></h3>
                        <div class="pull-left">
                            {!! button(route('tw.player.create'),'create') !!}
                            {!! button(route('tw.player.destroy','all'),'delete_all') !!}
                        </div>
                        @include('tw::layout.search')
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover table-sort">
                            <tr>
                                <th width="35"><input type="checkbox" class="minimal checkbox-toggle"></th>
                                <th>ID{!! table_sort('id') !!}</th>
                                <th>选手名称</th>
                                <th>图像</th>
                                @if(empty(request()->get('activity_id')))
                                <th>所属活动</th>
                                @endif
                                <th>最终得分{!! table_sort('score') !!}</th>
                                <th>推送状态</th>
                                <th>修改日期</th>
                                <th>操作</th>
                            </tr>
                            @foreach($aData as $vo)
                                <tr>
                                    <td style="vertical-align:middle"><input type="checkbox" name="id[]" value="{{$vo['id']}}" class="minimal"></td>
                                    <td style="vertical-align:middle">{{$vo['id']}}</td>
                                    <td style="vertical-align:middle"><span class="editable" data-pk="{{$vo['id']}}" data-name="name" data-url="{{route('tw.player.update',$vo['id'])}}" >{{$vo['name']}}</span></td>
                                    <td style="vertical-align:middle"><img src="{{$vo['img']}}" style="width:40px;border-radius:40%;" /></td>
                                    @if(empty(request()->get('activity_id')))
                                    <td style="vertical-align:middle">{{$vo->activity->title}}</td>
                                    @endif
                                    <td style="vertical-align:middle"><span class="editable" data-pk="{{$vo['id']}}" data-name="score" data-url="{{route('tw.player.update',$vo['id'])}}" >{{$vo['score']}}</span></td>
                                    <td style="vertical-align:middle">
                                        <a href="javascript:void(0);" class='editimg fa @if($vo['push_state'] == 1)fa-check-circle text-green @else fa-times-circle text-red @endif'>
                                        </a>
                                    </td>
                                    <td style="vertical-align:middle">{{$vo['updated_at']}}</td>
                                    <td style="vertical-align:middle">
                                        {!! button(route('tw.player.push',$vo['id']),'push',$vo['id']) !!}
                                        {!! button(route('tw.player.edit',$vo['id']),'edit') !!}
                                        {!! button(route('tw.player.destroy',$vo['id']),'delete',$vo['id']) !!}
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
@endsection
