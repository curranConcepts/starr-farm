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
                @auth
                    <div class="admin-buttons">
                        <a href="/flock/edit/{{ $chicken->id }}" class="button edit-button -rounded" style="border:none;"><i class="fa-regular fa-pen-to-square" style="color:#fff;"></i></a>
                        <a href="/flock/delete/{{ $chicken->id }}" class="button delete-button -rounded" style="border:none;"><i class="fa-regular fa-trash-can" style="color:#fff;"></i></a>
                    </div>
                @endauth
            </div>
        </div>
    @endforeach
</div>

