@extends('Offers.create')
@section('content')

<form method="post" action="" id="offerForm" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">chose photo</label>
        <input type="file" class="form-control"  name="photo" aria-describedby="emailHelp">
        @error('photo')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror

    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control" name="name_ar" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text"></div>
        @error('name_ar')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror

    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control" name="name_en" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text"></div>
        @error('name_en')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror

    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">price</label>
        <input type="text" name="price" class="form-control" >
        @error('price')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">details</label>
        <input type="text" name="details_ar" class="form-control" >
        @error('details_ar')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">details</label>
        <input type="text" name="details_en" class="form-control" >
        @error('details_en')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <br>
    <br>
    <br>
    <button id="save_data" class="btn btn-primary">Submit</button>
</form>
@stop

@section('scripts')
<script>
    $(document).on('click','#save_data',function (e){
        e.preventDefault();
        var formData = new FormData($('#offerForm')[0]) ;

        $.ajax({
            type:'POST',
            url:'{{route('ajax.offer.store')}}',
            data: formData ,
            processData:false ,
            contentType:false,
            success:function (data){
                if (data.status===true){
                    alert(data.msg)
                }
            },
            error:function (){

            }
        });
    });

</script>
@stop


