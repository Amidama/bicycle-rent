@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">

                    <div class="row">
                      <div class="col-md-12">
                        <h3>Form Edit Member : {{ $member->student_id }}</h3>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="row">
                        </div>
                          <form action="{{route('member.update')}}" method="post">
                            @csrf
                            <input id='id' name='id' value='{{$member->id}}' type='hidden'>
                            <div class="form-group">
                                <label for="book_name">Card ID</label>
                                <input type="text" class="form-control" id="card_id" placeholder="Card ID" name="card_id" value="{{ $member->card_id }}" required>
                            </div>
                            <div class="form-group">
                                <label for="book_name">Student ID</label>
                                <input type="text" class="form-control" id="student_id" placeholder="Student ID" name="student_id" value="{{ $member->student_id }}" required>
                            </div>
                            <div class="form-group">
                                <label for="type">First Name</label>
                                <input type="text" class="form-control" id="first_name" placeholder="First Name" name="first_name" value="{{ $member->first_name }}" required>
                            </div><div class="form-group">
                                <label for="writer">Last Name</label>
                                <input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="{{ $member->last_name }}" required>
                            </div><div class="form-group">
                                <label for="price">Phone Number</label>
                                <input type="number" class="form-control" id="phone_number" type="number" placeholder="Phone Number" name="phone_number" value="{{ $member->phone_number }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('member')}}"><input type="button" class="btn btn-danger" value="Cancel"></a>
                          </form>
                        </div>
                    </div>
                </div>
   
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <a class="btn btn-primary" href="{{route('member')}}"><< Back</a>
      </div>
    </div>
</div>
@endsection
