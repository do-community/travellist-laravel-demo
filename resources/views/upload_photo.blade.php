@extends('main')

@section('content')

    <div class="form_container clearfix">

        <form action="{{ route('Upload') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <h2>Upload Photo</h2>
            <p><label for="image">Photo</label>
                <input type="file" name="image" />
            </p>
                <p><label for="place">Where this photo was taken?</label>
                <select class="text" name="place" id="place">
                    <option value="0">Pick an Existing Place...</option>
                    @foreach ($places as $place)
                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                    @endforeach
                    <option value="new">Add a New Place</option>
                </select>
                </p>
                <h3>...Or Add a New Place</h3>
            <p><label for="place_name">Place Name</label>
                <input type="text" class="text" name="place_name" id="place_name" />
            </p>

            <p><label for="place_lat">Latitude:</label>
                <input type="text" class="text" name="place_lat" id="place_lat" size="10"/>
            </p>

            <p><label for="place_lng">Longitude:</label>
                <input type="text" class="text" name="place_lng" id="place_lng" size="10"/>
            </p>

            <p> <input type="submit" value=" Save " class="text"/></p>
        </form>
    </div>
@endsection