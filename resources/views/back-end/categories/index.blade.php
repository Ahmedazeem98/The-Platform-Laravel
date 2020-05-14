@extends('back-end.layouts.app')

@section('page_title')
    {{$page_title}}
@endsection
@section('nav_title')
    {{$nav_title}}
@endsection

@section('content')

<h3 class="card-header text-left font-weight-bold  py-4"> <a class="btn btn-primary" href="{{route($routeName.'.create')}}"> Add {{$modelName}}</a></h3>
@if(count($rows))
    <div class="card">
        <div id="table" class="table-editable">
         
            <table class="table table-bordered table-responsive-md table-striped text-center">
            <thead>
                <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Keyword</th>
                <th class="text-center">Description</th>
                <th class="text-center" width="18%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                <tr>
                    <td class="pt-3-half" contenteditable="true">{{$row->id}}</td>
                    <td class="pt-3-half" contenteditable="true">{{$row->name}}</td>
                    <td class="pt-3-half" contenteditable="true">{{$row->meta_keywords != '' ? $row->meta_keywords : '-'}}</td>
                    <td class="pt-3-half" contenteditable="true">{{$row->meta_desc != '' ? $row->meta_desc : '-'}}</td>
                    <td class="pt-3-half"  contenteditable="true">

                    @include('back-end.shared.buttons.delete')
                    @include('back-end.shared.buttons.edit')
                      
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