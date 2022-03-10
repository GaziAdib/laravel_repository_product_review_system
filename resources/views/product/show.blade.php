@extends('layouts.app')

@section('content')

<h1 class="text-center mt-2">{{ $product->title }} | Detail</h1>
<hr>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-9" style="display:flex">

            <div class="container m-2 p-2">
                <img src="/images/{{ $product->picture }}" height="450px" alt="...">
                <div class="container m-2 p-2">
                  <h2>{{ $product->title }}</h2>
                  <h3>Price: ${{ $product->price }}</h3>
                  <hr>
                  <p>{{ $product->description }}</p>
                  <a href="{{ route('product.index') }}" class="btn btn-success">Go Home</a>
                  <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                </div>
              </div>

        </div>


        <div class="col-md-3">
            <h3>All Comments</h3>

            <div class="comments p-2 m-2" style="background-color: rgb(232, 251, 246)">
                @foreach ($product->comments as $comment)
                    <h5>{{ $comment->comment }} ( {{ $comment->rating }} )</h5>
                    <hr>
                @endforeach
            </div>


           <h3>Add Comment...</h3>

           <div class="container m-2 p-2">

            <form action="" method="POST">
                @csrf

                <input type="hidden" id="id" name="id" value="{{ $product->id }}">

                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <input type="text" class="form-control" name="comment" id="comment" placeholder="Enter Comment">
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" class="form-control" name="rating" id="rating" placeholder="Enter Rating">
                </div>

                  <button type="submit" id="addCommentBtn" class="btn btn-success">comment</button>

            </form>

           </div>



        </div>
    </div>
</div>


<script>


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
})



// Add Comment To Product By Id

$("#addCommentBtn").click(function(e){

    //e.preventDefault();
    var comment = $('#comment').val();
    var rating =  $('#rating').val();
    var id = $('#id').val();


    $.ajax({
        type: "POST",
        dataType: "json",
        data: {comment:comment, rating:rating, _token: '{{csrf_token()}}'},
        url: "/products/"+$id,
        success: function(data) {
            console.log('Added Comment');
        },
        error: function(error) {
            console.log(error.responseJSON.errors.comment);
            console.log(error.responseJSON.errors.rating);
        }
    });




});




// Load Comment By Product Id

// function allComments() {

//     var id = $('#id').val();

//     $.ajax({
//         type: "GET",
//         dataType: "json",
//         url: "/products/"+id,
//         success: function(response) {
//             console.log(response);

//             var data = "";

//             $.each(response, function(key, value){
//                 console.log(value);

//                 data = data + "<div>"

//                     data = data + "<p>"+value.comment+"</p>";
//                     data = data + "<p>"+value.rating+"</p>";

//                 data = data + "</div>"

//             })

//             $('.comment_holder').html(data);
//         },
//         error: function(error) {
//             console.log(error);
//         }
//     })


// }

// allComments();


</script>

@endsection


























{{-- @extends('layouts.app')

@section('content')

<h1 class="text-center">Show Single Product</h1>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-8" style="display:flex">

            <div class="card m-2 p-2" style="width: 18rem;">
                <img src="/images/{{ $product->picture }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->title }}</h5>
                  <h5 class="card-title">Price: ${{ $product->price }}</h5>
                  <hr>
                  <p class="card-text">{{ $product->description}} </p>
                  <a href="{{ route('product.index') }}" class="btn btn-primary">go Back</a>
                  <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                </div>
              </div>

        </div>


        <div class="col-md-4">
            <h3>All Comments</h3>

            @foreach ($product->comments as $comment)
                <p>{{ $comment->comment }}</p>
                <p>{{ $comment->rating }}</p>
            @endforeach

           <h3>Add Comment...</h3>

           <div class="conatiner">

            <form action="" method="POST">
                @csrf

                <input type="hidden" id="id" name="id" value="{{ $product->id }}">

                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <input type="text" class="form-control" name="comment" id="comment" placeholder="Enter Comment">
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" class="form-control" name="rating" id="rating" placeholder="Enter Rating">
                </div>

                  <button type="submit" id="addCommentBtn" onclick="addComment($product->id)" class="btn btn-success">comment</button>

            </form>

           </div>



        </div>
    </div>
</div>


<script>


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
})


function addComment($id) {
    var comment = $('#comment').val();
    var rating =  $('#rating').val();
    var id = $('#id').val();


    $.ajax({
        type: "POST",
        dataType: "json",
        data: {comment:comment, rating:rating, _token: '{{csrf_token()}}'},
        url: "/products/"+$id,
        success: function(data) {
            console.log('Added Comment');
        },
        error: function(error) {
            console.log(error.responseJSON.errors.comment);
            console.log(error.responseJSON.errors.rating);
        }
    })
}





</script>


@endsection --}}
