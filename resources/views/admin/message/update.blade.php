@extends('admin.layout.main')
@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>信息更新</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="{{url('/admin/messages/update')}}" method="post" enctype="multipart/form-data">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">标题</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="title" value="{{old('title')}}" equired="required">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">内容</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="content" value="{{old('content')}}" equired="required">
                        </div>
                    </div>

                </div>                
                <div class="mws-button-row">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$message->id}}">
                    <input type="submit" value="保存" class="btn btn-warning">
                </div>
            </form>
        </div>
    </div>
@endsection