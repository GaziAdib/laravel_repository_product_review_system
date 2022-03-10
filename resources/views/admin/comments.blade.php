@extends('layouts.app')

@section('content')

<h1 class="text-center">Admin All Product Comments</h1>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-12" style="display:flex">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Product Id</th>
                        <th scope="col">Id</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <th scope="row">{{ $comment->product_id }}</th>
                                <th>{{ $comment->id }}</th>
                                <td>{{ $comment->comment }}</td>
                                <td>{{ $comment->rating }}</td>
                                <td><a href="{{ route('product.show', $comment->product_id)}}" class="btn btn-primary">View Product</a></td>
                                <td>
                                    <form action="{{ route('admin.comment.delete', $comment->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>


@endsection
