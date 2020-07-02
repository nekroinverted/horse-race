@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Race results input</div>
                <div class="row justify-content-center">
                    <form method="POST" action="/results">
                        @csrf
                        <div class="form-group">
                          <label for="first_name">First name</label>
                        <input type="text"
                        class="form-control"
                        name="first_name"
                        id="first_name"
                        value="{{ $errors->has('first_name') ? "" :  old('first_name') }}"
                        placeholder="Enter the first name">
                        <p class="text-danger"> {{ $errors->first('first_name') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                          <input type="text"
                          class="form-control"
                          name="last_name"
                          id="last_name"
                          value="{{ $errors->has('last_name') ? "" :  old('last_name') }}"
                          placeholder="Enter the last name">
                          <p class="text-danger"> {{ $errors->first('first_name') }}</p>
                          </div>
                          <div class="form-group">
                            <label for="time">Time</label>
                          <input type="text"
                          class="form-control"
                          name="time"
                          id="time"
                          value="{{ $errors->has('time') ? "" :  old('first_name') }}"
                          placeholder="Enter time in seconds">
                          <p class="text-danger"> {{ $errors->first('time') }}</p>
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>

                    <table class="table">
                        <thead>
                            <h1>approved results</h1>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Time</th>
                                @can('edit-results')
                                <th>Actions</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($approvedResults as $result)
                            <tr>
                            <td scope="row">{{ $result->first_name }}</td>
                                <td>{{ $result->last_name }}</td>
                                <td>{{ $result->time }}</td>
                                @can('edit-results')
                                <td>
                                    <form method="POST"  action="/results/{{ $result->id }}" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">delete</button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                    @can('edit-results')


                    <table class="table">
                        <thead>
                            <h1>waiting on approval</h1>
                            <tr>
                                <th>Title</th>
                                <th>excerpt</th>
                                <th>body</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unapprovedResults as $result)
                            <tr>
                            <td scope="row">{{ $result->first_name }}</td>
                                <td>{{ $result->last_name }}</td>
                                <td>{{ $result->time }}</td>
                                @can('edit-results')
                                <td>
                            <form method="POST" action="/results/{{ $result->id }}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">approve</button>
                            </form>

                            <form method="POST" action="/results/{{ $result->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">delete</button>
                            </form>
                            @endcan
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endcan

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
