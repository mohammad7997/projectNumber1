@extends('back.index')
@section('content')
    <style>
        .pointer {
            cursor: pointer;
        }
        table tr ,table tr {
            height: 50px!important;
        }
        table tr td,table tr th{
            text-align: center!important;
        }
        #createCategory{
            margin: 10px 0;
        }
    </style>
    <div class="col-lg-9 grid-margin stretch-card" style="margin: 20px auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title yekan fontb">مدیریت دسته بندی</h4>
                <a id="createCategory"  href="{{route('adminCreateCategory')}}" class="btn btn-success yekan fonts">ایجاد دسته بندی</a>
                @include('layout.message')
                <table class="table">
                    <thead>
                    <tr>
                        <th class="yekan fontb">نام</th>
                        <th class="yekan fontb">نام مستعار</th>
                        <th class="yekan fontb">مدیریت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $row)
                        <tr>
                            <td class="yekan fonts">{{$row->name}}</td>
                            <td class="yekan fonts">{{$row->slug}}</td>
                            <td>
                                <a class="yekan fontn" href="{{route('adminEditCategory',$row->id)}}"><label
                                            class="badge badge-success pointer">ویرایش</label></a>
                                <a class="yekan fontn" href="{{route('adminDestroyCategory',$row->id)}}"><label class="badge badge-danger pointer" style="font-weight: normal">حذف</label></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$categories->links()}}
            </div>
        </div>
    </div>
@endsection