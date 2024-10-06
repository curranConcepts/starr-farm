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
                <strong>Breed:</strong> @if(isset($chicken->breed)){{ $chicken->breed }}@else Unknown @endif<br>
                <strong>Birthday:</strong>  @if(isset($chicken->birthday)){{ \Carbon\Carbon::parse($chicken->birthday)->format('Y-m-d') }}@else Unknown @endif<br>
                <strong>Bio:</strong>  @if(isset($chicken->bio)){{ $chicken->bio }}@else Not Available @endif<br>
                </p>
                @auth
                    <div class="row admin-buttons">
                        <div class="five columns">
                        <button type="button" class="edit-button" onclick="openModal('modal-{{ $chicken->id }}')">Edit</button>
                        </div>
                        <div class="five columns">
                        <form id="updateBird" action="/flock/{{ $chicken->id }}/delete" method="GET" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button -rounded" style="border:none;">Delete</button>
                        </form>
                        </div>
                    </div>

                    <!-- Custom Modal -->
                    <div id="modal-{{ $chicken->id }}" class="custom-modal">
                        <div class="custom-modal-content">
                            <span class="close-button" onclick="closeModal('modal-{{ $chicken->id }}')">&times;</span>
                            <h2>Edit Chicken</h2>
                            <form action="/flock/{{ $chicken->id }}/update" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name{{ $chicken->id }}">Name</label>
                                    <input type="text" name="name" id="name{{ $chicken->id }}" value="{{ $chicken->name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="birthday{{ $chicken->id }}">Birthday</label>
                                    <input type="date" name="birthday" id="birthday{{ $chicken->id }}" value="{{ $chicken->birthday }}">
                                </div>

                                <div class="form-group">
                                    <label for="breed{{ $chicken->id }}">Breed</label>
                                    <input type="text" name="breed" id="breed{{ $chicken->id }}" value="{{ $chicken->breed }}">
                                </div>

                                <div class="form-group">
                                    <label for="image{{ $chicken->id }}">Photo</label>
                                    <input type="file" name="image" id="image{{ $chicken->id }}">
                                </div>

                                <div class="form-group">
                                    <label for="bio{{ $chicken->id }}">Bio</label>
                                    <textarea name="bio" id="bio{{ $chicken->id }}">{{ $chicken->bio }}</textarea>
                                </div>

                                <button type="submit" class="save-button">Save changes</button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    @endforeach
</div>
<script>
    function openModal(modalId) {
    document.getElementById(modalId).style.display = "flex";
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

// Close the modal if the user clicks outside of it
window.onclick = function(event) {
    var modals = document.querySelectorAll('.custom-modal');
    modals.forEach(function(modal) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
}
</script>

