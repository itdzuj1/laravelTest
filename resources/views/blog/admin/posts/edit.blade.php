@extends('layouts.app')

@section('content')
    <div class="container">
        @include('blog.admin.posts.includes.result_message')

        @if($item->exists)
            <form method="POST" action="{{ route('blog.admin.posts.update', $item->id) }}">
                @method('PATCH')
        @else
            <form method="POST" action="{{ route('blog.admin.posts.store') }}">
        @endif

            @csrf
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('blog.admin.posts.includes.main_col')
                    </div>
                    <div class="col-md-3">
                        @include('blog.admin.posts.includes.sub_col')
                    </div>
                </div>
            </form>

        @if($item->exists)
            <br>
            <form method="POST" action="{{ route('blog.admin.posts.destroy', $item->id) }}">
                @method('DELETE')
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body ml-auto mr-auto">
                                <button type="submit" class="btn btn-link">Удалить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
@endsection
