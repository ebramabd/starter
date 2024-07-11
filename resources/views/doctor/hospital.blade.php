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
        @if(isset($hospital) && $hospital->count() > 0)
            @foreach($hospital as $item )
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->address}}</td>
                    <td>
                        <a href="{{route('doctor',$item->id)}}" class="btn btn-danger">doctors</a>
                        <a href="{{route('hospital.delete',$item->id)}}" class="btn btn-danger">delete</a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop




