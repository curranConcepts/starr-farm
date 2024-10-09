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
            <div class="card-content" x-data="{ open: false }">
                <h2>{{ $chicken->name }}</h2>
                <p>
                <strong>Breed:</strong> @if(isset($chicken->breed)){{ $chicken->breed }}@else Unknown @endif<br>
                <strong>Birthday:</strong> @if(isset($chicken->birthday)){{ \Carbon\Carbon::parse($chicken->birthday)->format('Y-m-d') }}@else Unknown @endif<br>
                <strong>Bio:</strong> @if(isset($chicken->bio)){{ $chicken->bio }}@else Not Available @endif<br>
                </p>

                @auth
                    <div class="admin-plus">
                        <button type="button" class="plus-button" @click="open = !open">
                            <div class="plus-icon" :class="{ 'open': open }">
                                <span class="vertical"></span>
                                <span class="horizontal"></span>
                            </div>
                        </button>
                    </div>

                    <div x-show="open" class="">
                        <div class="row admin-buttons">
                            <div class="five columns">
                                <button type="button" class="edit-button" onclick="openModal('modal-{{ $chicken->id }}')">Edit</button>
                            </div>
                            <div class="five columns">
                                <button type="button" class="delete-button" onclick="openModal('delete-modal-{{ $chicken->id }}')">Delete</button>
                            </div>
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

