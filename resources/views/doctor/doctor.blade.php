@extends('Offers.create')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>



        @if(isset($doctor) && $doctor->count() > 0)
            @foreach($doctor as $item )
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>

                    <td><a href="{{route('doctor',$item->id)}}" class="btn btn-danger">doctors</a> </td>
                    <td><a href="{{route('doctor.services.show',$item->id)}}" class="btn btn-success">services</a> </td>
                </tr>
            @endforeach
        @endif


        </tbody>
    </table>
@stop




