@extends('back.index')
@section('content')
    <style>
        .pointer {
            cursor: pointer;
        }

        table tr, table tr {
            height: 50px !important;
        }

        table tr td, table tr th {
            text-align: center !important;
        }

        #createCategory {
            margin: 10px 0;
        }
    </style>
    <div class="col-lg-9 grid-margin stretch-card" style="margin: 20px auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title yekan fontb">مدیریت نظرها</h4>
                @include('layout.message')
                <table class="table">
                    <thead>
                    <tr>
                        <th class="yekan fontb">نام</th>
                        <th class="yekan fontb">ایمیل</th>
                        <th class="yekan fontb">خلاصه متن</th>
                        <th class="yekan fontb">مطلب</th>
                        <th class="yekan fontb">وضعیت</th>
                        <th class="yekan fontb">مدیریت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comment as $row)
                        <tr>
                            <td class="yekan fonts">{{$row->name}}</td>
                            <td class="yekan fonts">{{$row->email}}</td>
                            <td class="yekan fonts">{!! mb_substr(strip_tags($row->body),0,40,'UTF8').'...' !!}</td>
                            <td class="yekan fonts">{{$row->article->name}}</td>
                            @if($row->status==1)
                                @php
                                    $url=route('adminStatusComment',$row->id);
                                    $statuse='<a href="'.$url.'" class=" badge badge-success fonts" >فعال</a>'
                                @endphp
                            @else
                                @php
                                    $url=route('adminStatusComment',$row->id);
                                    $statuse='<a href="'.$url.'" class=" badge badge-warning fonts" >غیر فعال</a>'
                                @endphp
                            @endif

                            <td class="yekan fonts">{!!$statuse!!}</td>
                            <td>
                                <a class="yekan fontn" href="{{route('adminEditComment',$row->id)}}"><label
                                            class="badge badge-success pointer">ویرایش</label></a>
                                <a class="yekan fontn" href="{{route('adminDestroyComment',$row->id)}}"><label
                                            class="badge badge-danger pointer"
                                            style="font-weight: normal">حذف</label></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$comment->links()}}
            </div>
        </div>
    </div>
@endsection