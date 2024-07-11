@extends('Offers.create')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.offer name')}}</th>
            <th scope="col">{{__('messages.offer price')}}</th>
            <th scope="col">{{__('messages.offer details')}}</th>
            <th scope="col">{{__('messages.operation')}}</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
            <tr class="offer_row{{$offer->id}}">
                <th scope="row">{{$offer->id}}</th>
                <td>{{$offer->name}}</td>
                <td>{{$offer->price}}</td>
                <td>{{$offer->details}}</td>
                <td><a href="{{url('offer/edit/'.$offer->id)}}" class="btn btn-success">{{__('messages.update')}}</a></td>
                <td><a href="" offer_id="{{$offer->id}}" class="delete btn btn-danger">delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop

@section('scripts')
    <script>
        $(document).on('click','.delete',function (e){
            e.preventDefault();
            var offer_id = $(this).attr('offer_id')
            $.ajax({
                type:'POST',
                url:'{{route('ajax.offer.delete')}}',
                data: {
                    '_token' : '{{csrf_token()}}',
                    'id':offer_id
                } ,
                success:function (data){
                    if (data.status===true){
                        // alert(data.msg)
                        $('.offer_row'+data.id).remove()
                    }
                },
                error:function (){
                }
            });
        });

    </script>
@stop


