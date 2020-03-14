@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a class="text-with-button">Members</a><a href="{{route('member.create')}}"><button type="button" class="btn btn-dark" style="float: right;">+ Add Member</button></a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    
                    
                    <table class="table" id="myTable">
                        <thead class="thead-dark">
                            <tr align="center">
                            <th scope="col">#</th>
                            <th scope="col">Card ID</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $index=>$member)
                            <tr align="center">
                            <th scope="row">{{ ++$index }}</th>
                            <td>{{$member->card_id}}</td>
                            <td>{{$member->student_id}}</td>
                            <td>{{$member->first_name}}</td>
                            <td>{{$member->last_name}}</td>
                            <td>{{$member->phone_number}}</td>
                            <td>
                                <form action="{{route('member.delete')}}" method="post">
                                    @csrf
                                    <a href="{{route('member.edit',$member->id)}}">
                                        <input type="button" class="btn btn-warning" value='Edit'>
                                    </a>
                                    <input id='id' name='id' value='{{$member->id}}' type='hidden'>
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
                            <th scope="col">Card ID</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone Number</th>
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
