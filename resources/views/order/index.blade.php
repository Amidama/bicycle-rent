@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Orders</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="myTable" class="table table-striped table-bordered" style="width:100%" >
                        <thead class="thead-dark">
                            <tr align="center">
                            <th scope="col">#</th>
                            <th scope="col">Locker ID</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">วันที่ยืม</th>
                            <th scope="col">วันที่คืน</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index=>$order)
                            <tr align="center">
                            <td scope="row">{{ ++$index }}</td>
                            <td scope="row">{{$order->locker()->first()->locker_code}}</td>
                            <td scope="row">{{$order->member()->first()->student_id}}</td>
                            <td scope="row">{{$order->member()->first()->first_name}} {{$order->member()->first()->last_name}}</td>
                            <td scope="row">{{$order->started_at}}</td>
                            <td scope="row">{{$order->ended_at}}</td>
                            <td>
                                <form action="{{route('transaction.delete')}}" method="post">
                                    @csrf
                                    <input id='id' name='id' value='{{$order->id}}' type='hidden'>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="thead-dark">
                            <tr align="center">
                            <th scope="col">#</th>
                            <th scope="col">Locker ID</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">วันที่ยืม</th>
                            <th scope="col">วันที่คืน</th>
                            <th scope="col">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <a class="btn btn-primary" href="{{route('home')}}"><< Back</a>
</div>
@endsection
