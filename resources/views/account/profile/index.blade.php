@extends('account.layouts.default')

@section('account.content')
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('account.profile.store') }}" method="post">
                {{ csrf_field() }}

                <div class="from-group{{ $errors->has('name') ? ' has-error ' : ''}}">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', auth()->user()->name) }}">

                    @if($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="from-group{{ $errors->has('email') ? ' has-error ' : ''}}">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email', auth()->user()->email) }}">

                    @if($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-sm btn-info">Update</button>
            </form>
        </div>
    </div>
@endsection