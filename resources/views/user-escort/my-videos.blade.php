@extends('user.layout-auth')
@section('auth_content')
    <div class="escort-profile">
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link ms-0"
                    href="{{ route('escorts.dashboard', Auth::guard('escort')->user()->id) }}">Dashboard</a>
                <a class="nav-link" href="{{ route('escorts.profile', Auth::guard('escort')->user()->id) }}">Profile</a>
                <a class="nav-link" href="{{ route('escorts.myPictures', Auth::guard('escort')->user()->id) }}">My
                    Pictures</a>
                <a class="nav-link active" href="#">My Videos</a>
            </nav>

            <div class="row escort-videos">
                @foreach ($videos as $vdo)
                    <div class="col-lg-3 menu-item escort-videos">
                        <!-- Delete video Form-->
                        <span class="escort-video-delete-from">
                            <form
                                action="{{ route('escorts.deleteMedia', ['escort_id' => Auth::guard('escort')->user()->id, 'media_id' => $vdo->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="name" value="{{ $vdo->name }}">
                                <input type="hidden" name="type" value="video">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-xmark"></i></button>
                            </form>
                        </span>
                        <!-- Show-Videos-->

                        {{-- <iframe width="560" height="315"  src="{{ asset('/public/videos') . '/' . $vdo->name }}"
                            type="video/mp4" title="escort-videos" frameborder="0"
                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe> --}}


                        {{-- <video controls preload="none" poster="{{ asset('/public/images/static_img/nicole.png') }}">
                            <source src="{{ asset('/public/videos') . '/' . $vdo->name }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video> --}}

                        {{-- <iframe src="{{ asset('/public/videos') . '/' . $vdo->name }}"  frameborder="0"
                            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                        </iframe> --}}

                        {{-- <div class="video-thumbnail" id="thumbnail-{{ $vdo->id }}" style="width: 303px; height:213px">
                            <img src="{{ asset('/public/images/static_img/video_play.png') }}" alt="Video Thumbnail"
                                onclick="loadIframe(this, '{{ asset('/public/videos') . '/' . $vdo->name }}', '{{ $vdo->id }}')">
                        </div> --}}

                        <div class="video-thumbnail my-video-img">
                            <img src="{{ asset('/public/images/static_img/video_play.png') }}" alt="Video Thumbnail"
                                 onclick="loadVideo(this, '{{ asset('/public/videos') . '/' . $vdo->name }}')">
                        </div>
                        


                    </div>
                @endforeach
                <!-- Add-Video Form -->
                <form class="add-video-form"
                    action="{{ route('escort.add.media.myVideos', Auth::guard('escort')->user()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="col-lg-3 menu-item escort-add-more-videos">
                        <span onclick="document.getElementById('addVideoInput').click();">
                            <img src="{{ asset('/public/images/static_img/add_more_video1.png') }}"
                                class="menu-img img-fluid" alt="Add Image">
                            <p>Add More</p>
                        </span>
                        <input type="hidden" name="type" value="video">
                        <input type="file" id="addVideoInput" name="name[]" multiple style="display: none;"
                            onchange="this.form.submit()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <script>
        let activeIframe = null; // Keep track of the currently playing iframe

        function loadIframe(element, videoSrc, videoId) {
            // Deactivate any currently playing video
            if (activeIframe) {
                const thumbnail = document.createElement('img');
                thumbnail.src = '{{ asset('/public/images/static_img/video_play.png') }}';
                thumbnail.alt = 'Video Thumbnail';
                thumbnail.setAttribute('onclick',
                    `loadIframe(this, '${activeIframe.dataset.videoSrc}', '${activeIframe.dataset.videoId}')`);

                // Replace the active iframe with its thumbnail
                const activeThumbnailContainer = document.getElementById(`thumbnail-${activeIframe.dataset.videoId}`);
                activeThumbnailContainer.innerHTML = ''; // Clear current content
                activeThumbnailContainer.appendChild(thumbnail); // Insert the thumbnail back
            }

            // Create a new iframe for the new video
            const iframeElement = document.createElement('iframe');
            iframeElement.setAttribute('width', '303');
            iframeElement.setAttribute('height', '213');
            iframeElement.setAttribute('src', videoSrc);
            iframeElement.setAttribute('title', 'escort-video');
            iframeElement.setAttribute('frameborder', '0');
            iframeElement.setAttribute('allow',
                'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
            iframeElement.setAttribute('allowfullscreen', '');
            iframeElement.dataset.videoSrc = videoSrc; // Store the video source URL in a data attribute
            iframeElement.dataset.videoId = videoId; // Store the video ID

            // Replace the clicked thumbnail with the new iframe
            const thumbnailContainer = document.getElementById(`thumbnail-${videoId}`);
            thumbnailContainer.innerHTML = ''; // Clear current content
            thumbnailContainer.appendChild(iframeElement); // Insert the iframe

            // Set the current iframe as active
            activeIframe = iframeElement;
        }
    </script> --}}

    <script>
        function loadVideo(element, videoSrc) {
            const videoContainer = document.createElement('div');  // Container for the video
            const videoElement = document.createElement('video');  // The video element
            videoElement.setAttribute('controls', '');
            videoElement.setAttribute('width', '853');  // Set width and height
            videoElement.setAttribute('height', '480');
            
            const sourceElement = document.createElement('source');  // Source element for video
            sourceElement.setAttribute('src', videoSrc);
            sourceElement.setAttribute('type', 'video/mp4');
            
            videoElement.appendChild(sourceElement);  // Add the source to the video element
            videoContainer.appendChild(videoElement);  // Append video to the container
    
            // Replace the clicked thumbnail with the video player
            element.parentNode.replaceChild(videoContainer, element);
        }
    </script>
    
@endsection
