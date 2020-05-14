@extends('back-end.layouts.app')

@section('page_title')
    {{$page_title}}
@endsection

@section('nav_title')
    {{$nav_title}}
@endsection

@section('content')
@if(count($rows))
    <div class="card">
        <div id="table">
            <table class="table table-bordered table-responsive-md table-striped text-center">
            <thead>
                <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Message</th>
                <th class="text-center" width = "40px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                <tr>
                    <td class="pt-3-half">{{$row->id}}</td>
                    <td class="pt-3-half">{{$row->name}}</td>
                    <td class="pt-3-half">{{$row->email}}</td>
                    <td class="pt-3-half">{{$row->message }}</td>
                    <td class="pt-3-half">
                        
                    @include('back-end.shared.buttons.delete')
                    &nbsp;
                    @include('back-end.messages.replay')
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            <div class="d-flex justify-content-center">{{$rows->links()}}</div>
        </div>
        </div>
    </div>
@endif

@endsection