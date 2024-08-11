<div class="chicken-list">
    @foreach($chickens as $chicken)
        <div class="card -rounded -shadow -margin-10">
            @php
                $imagePath = '/images/chickens/' . $chicken->slug . '.jpg';
                $defaultImage = '/images/chickens/default.jpg';
                $imageUrl = file_exists(public_path($imagePath)) ? asset($imagePath) : asset($defaultImage);
            @endphp
            <div class="chicken-image"
                style="background:url('{{ $imageUrl }}');
                background-size: cover;
                background-position: center;">
            </div>
            <div class="card-content">
                <h2>{{ $chicken->name }}</h2>
                <p>
                Breed: {{ $chicken->breed }}<br>
                Birthday: {{ $chicken->birthday }}<br>
                Age: {{ $chicken->age }}<br>
                Bio: {{ $chicken->bio }}<br>
                </p>
            </div>
        </div>
    @endforeach
</div>
