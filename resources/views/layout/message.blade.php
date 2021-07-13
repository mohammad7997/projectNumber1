<style>
    #alert {
        width: 50%;
        margin: 40px auto;
    }

    #alert ul {
        text-align: center;
        direction: rtl;
        list-style: none;
    }

    #alert ul li {
        height: 15px;
        margin: 2px 0;
    }
</style>

@if($errors->any())
    <div id="alert" class="alert alert-danger" style="margin-bottom: 0">
        <ul>
            @foreach($errors->all() as $error)
                <li class="yekan fontn">
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div id="alert" class="alert alert-success" style="margin-bottom: 0">
       <ul>
           <li class="yekan fontn">
               {{session('success')}}
           </li>
       </ul>
    </div>
@endif

@if(session('warning'))
    <div id="alert" class="alert alert-warning" style="margin-bottom: 0">
       <ul>
           <li class="yekan fontn">
               {{session('warning')}}
           </li>
       </ul>
    </div>
@endif