@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Escort Videos</h3>
                    {{-- <span class="upload-myVideos" onclick="openModal()">Upload Video </span> --}}
                    <p onclick="openModal()">Add Video <i class="fa fa-upload" aria-hidden="true"></i></p>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="row adminEscort-videos">
                                @if ($videos->isEmpty())
                                    <!-- Display this div when no videos are available -->
                                    <div class="col-lg-3 menu-item no-video-available">
                                        <h4>No videos available</h4>
                                    </div>
                                @else
                                    @foreach ($videos as $vdo)
                                        <div class="col-lg-3 menu-item adminEscort-videos">
                                            <!-- Delete video Form-->
                                            <span class="adminEscort-video-delete-from">
                                                <form
                                                    action="{{ route('admin.escorts.deleteMedia', ['escort_id' => $escort->id, 'media_id' => $vdo->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="name" value="{{ $vdo->name }}">
                                                    <input type="hidden" name="type" value="video">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-times" aria-hidden="true"></i></button>
                                                </form>
                                            </span>
                                            <!-- Show-Videos-->
                                            <div class="video-thumbnail adminEscort-video-thumbnail"
                                                onclick="loadVideo(this, '{{ asset('/public/videos') . '/' . $vdo->name }}')">

                                                <img class="vidio-ply-img"
                                                    src="{{ asset('/public/images/static_img/video_play4.jfif') }}">
                                                <img class="video-thumb9mg"
                                                    src="{{ $vdo->thumb_nail ? asset('/public/images/thumb_nails/' . $vdo->thumb_nail) : asset('/public/images/static_img/default_thumbnail.png') }}"
                                                    alt="">

                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function loadVideo(element, videoSrc) {
            const videoContainer = document.createElement('div'); // Container for the video
            videoContainer.classList.add('my-video-player-active');
            const videoElement = document.createElement('video'); // The video element
            // videoElement.setAttribute('controls', '');
            videoElement.setAttribute('autoplay', ''); // Automatically play the video

            const sourceElement = document.createElement('source'); // Source element for video
            sourceElement.setAttribute('src', videoSrc);
            sourceElement.setAttribute('type', 'video/mp4');

            videoElement.appendChild(sourceElement); // Add the source to the video element
            videoContainer.appendChild(videoElement); // Append video to the container

            // Replace the clicked thumbnail with the video player
            element.parentNode.replaceChild(videoContainer, element);
        }
    </script>

    <div id="AdminUploadModal" class="modal" style="display:none;">
        <div class="modal-content video-upload-forms">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Upload Video</h2>
            <form class="add-video-form" action="{{ route('admin.add_escortVideos', $escort->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <!-- Video Upload -->
                <label for="video">Choose Video:</label>
                <input type="file" id="video" name="video" accept="video/*" required>

                <!-- Thumbnail Upload -->
                <label for="thumbnail">Choose Thumbnail Image:</label>
                <input type="file" id="thumbnail" name="thumb_nail" accept="image/*">

                <input type="hidden" name="media_type_video" value="video">
                <!-- Submit Button -->
                <button type="submit">Upload</button>
            </form>
        </div>
    </div>
    <script>
        function openModal() {
            document.getElementById("AdminUploadModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("AdminUploadModal").style.display = "none";
        }

        // Close modal if the user clicks outside the modal content
        window.onclick = function(event) {
            if (event.target === document.getElementById("AdminUploadModal")) {
                closeModal();
            }
        }
    </script>
    <!-- /page content -->
@endsection
