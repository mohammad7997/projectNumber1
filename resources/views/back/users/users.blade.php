@extends('back.index')
@section('content')
    <style>
        .pointer {
            cursor: pointer;
        }
    </style>
    <div class="col-lg-9 grid-margin stretch-card" style="margin: 20px auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title yekan fontb">مدیریت کاربران</h4>
                @include('layout.message')
                <table class="table">
                    <thead>
                    <tr>
                        <th class="yekan fontb">نام</th>
                        <th class="yekan fontb">ایمیل</th>
                        <th class="yekan fontb">تلفن</th>
                        <th class="yekan fontb">نقش</th>
                        <th class="yekan fontb">وضعیت</th>
                        <th class="yekan fontb">مدیریت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userInfo as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>
                            @switch($row->role)
                                @case(1)
                                @php $role='مدیر'; @endphp
                                @break
                                @case(2)
                                @php $role='کاربر'; @endphp
                                @break
                            @endswitch
                            <td class="yekan fonts">{{$role}}</td>
                            {{--user is active or user is not active--}}
                            @if($row->statuse==1)
                                @php
                                    $url=route('adminStatusUsers',$row->id);
                                    $statuse= '<a href="'.$url.'" class="badge badge-success yekan fonts pointer"> فعال </a>'
                                @endphp
                            @else
                                @php
                                    $url=route('adminStatusUsers',$row->id);
                                    $statuse='<a href="'.$url.'" class="badge badge-warning yekan fonts pointer"> غیرفعال </a>'
                                @endphp
                            @endif
                            <td>{!!$statuse!!}</td>
                            <td>
                                <a class="yekan fontn" href="{{route('adminEditUsers',$row->id)}}"><label
                                            class="badge badge-success pointer">ویرایش</label></a>
                                <a class="yekan fontn" href="{{route('adminDestroyUsers',$row->id)}}"><label class="badge badge-danger pointer" style="font-weight: normal">حذف</label></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection