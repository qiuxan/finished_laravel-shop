@extends('layouts.app')
@section('title', 'Address List')

@section('content')
<div class="row">
  <div class="col-lg-10 col-lg-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">
        Address List
        <a href="{{ route('user_addresses.create') }}" class="pull-right">Add New Address</a>
      </div>
      <div class="panel-body">
        <table class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Receiver</th>
            <th>Address</th>
            <th>Zip</th>
            <th>Phone</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($addresses as $address)
          <tr>
            <td>{{ $address->contact_name }}</td>
            <td>{{ $address->full_address }}</td>
            <td>{{ $address->zip }}</td>
            <td>{{ $address->contact_phone }}</td>
            <td>
              <button class="btn btn-primary">修改</button>
              <button class="btn btn-danger">删除</button>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
