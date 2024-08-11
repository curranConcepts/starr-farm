<div class="chicken-list">
    @foreach($chickens as $chicken)
        @php
            $imageUrl = $chicken->image ? asset('images/chickens/' . $chicken->image) : asset('images/chickens/default.jpg');
        @endphp
        <div class="card -rounded -shadow -margin-10">
            <div class="chicken-image"
                style="background:url('{{ $imageUrl }}');
                background-size: cover;
                background-position: center;">
            </div>
            <div class="card-content">
                <h2>{{ $chicken->name }}</h2>
                <p>
                <strong>Breed:</strong> {{ $chicken->breed }}<br>
                <strong>Birthday:</strong>  {{ \Carbon\Carbon::parse($chicken->birthday)->format('Y-m-d') }}<br>
                <strong>Bio:</strong>  {{ $chicken->bio }}<br>
                </p>
            </div>
        </div>
    @endforeach
</div>

