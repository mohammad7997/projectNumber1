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
                <h4 class="card-title yekan fontb">مدیریت مطالب</h4>
                <a id="createCategory" href="{{route('adminCreateArticle')}}" class="btn btn-success yekan fonts">ایجاد
                    مطلب جدید</a>
                @include('layout.message')
                <table class="table">
                    <thead>
                    <tr>
                        <th class="yekan fontb">نام</th>
                        <th class="yekan fontb">نام نویسنده</th>
                        <th class="yekan fontb">نام مستعار</th>
                        <th class="yekan fontb">دسته بندی ها</th>
                        <th class="yekan fontb">بازدید</th>
                        <th class="yekan fontb">وضعیت</th>
                        <th class="yekan fontb">مدیریت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($article!='')

                        @foreach($article as $row)
                            <tr>
                                <td class="yekan fonts">{{$row->name}}</td>
                                <td class="yekan fonts">{{$row->user->name}}</td>
                                <td class="yekan fonts">{{$row->slug}}</td>
                                <td class="yekan fonts">
                                    @foreach($row->categories as $categoryName)
                                        <span class="badge badge-danger yekan fonts"
                                              style="font-weight: normal">{{$categoryName->name}}</span>
                                    @endforeach
                                </td>
                                <td class="yekan fonts">{{$row->hits}}</td>
                                @if($row->status==1)
                                    @php
                                        $url=route('adminStatusArticle',$row->id);
                                        $statuse='<a href="'.$url.'" class=" badge badge-success fonts" >فعال</a>'
                                    @endphp
                                @else
                                    @php
                                        $url=route('adminStatusArticle',$row->id);
                                        $statuse='<a href="'.$url.'" class=" badge badge-warning fonts" >غیر فعال</a>'
                                    @endphp
                                @endif

                                <td class="yekan fonts">{!!$statuse!!}</td>
                                <td>
                                    <a class="yekan fontn" href="{{route('adminEditArticle',$row->id)}}"><label
                                                class="badge badge-success pointer">ویرایش</label></a>
                                    <a class="yekan fontn" href="{{route('adminDestroyCategory',$row->id)}}"><label
                                                class="badge badge-danger pointer"
                                                style="font-weight: normal">حذف</label></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{$article->links()}}
            </div>
        </div>
    </div>
@endsection