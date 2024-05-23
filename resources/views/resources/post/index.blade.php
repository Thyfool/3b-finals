<x-app-layout>
            
    <div class="pagetitle">
        <h1>{{ __('Post') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">{{__('Dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{ __('Resource') }}</li>
                <li class="breadcrumb-item active">{{ __('Post') }}</li>
                
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('message'))
                    <div id="autoDismissAlert" class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Use setTimeout to hide the alert after 5 seconds
                            setTimeout(function() {
                                var alertElement = document.getElementById('autoDismissAlert');
                                if (alertElement) {
                                    // Use Bootstrap's alert 'close' method to hide it
                                    var alert = new bootstrap.Alert(alertElement);
                                    alert.close();
                                }
                            }, 5000); // 5000 milliseconds = 5 seconds
                        });
                    </script>
                @endif
                <div class="card p-4">
                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('post.create') }}"  type="button" class="btn btn-primary" ><i class="bi bi-file-earmark-plus-fill me-1  "></i> Add a New Options</a> 
                        </div>
                        <hr class="my-5">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Post</th>
                                    <th scope="col">Status</th>   
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($posts)
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post -> subject}}</td>
                                            <td>{{$post -> post}}</td>
                                            <td>{{ ($post -> status == 1 ? 'Published':'Unpublished') }}</td>
                                            <td>
                                            <a href="{{ route('post.show', $post) }}" class="btn btn-dark m-1" fdprocessedid="sh46d8"><i class="bi bi-folder-symlink"></i></a>
                                            <a href="{{ route('post.edit', $post) }}" type="button" class="btn btn-success m-1" fdprocessedid="sh46d8"><i class="bi bi-pencil-square"></i></a>
                                            <form id="deleteForm{{$post->id}}" action="{{ route('post.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger m-1 delete-button" data-postid="{{$post->id}}"><i class="bi bi-trash-fill"></i></button>
                                            </form>

                                            <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Delete</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this post?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <form id="deletePostForm" method="POST" action="">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-primary"><i class="bi bi-trash-fill"></i>Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    var deleteButtons = document.querySelectorAll('.delete-button');
                                                    var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));

                                                    deleteButtons.forEach(function(button) {
                                                        button.addEventListener('click', function() {
                                                            var postId = this.getAttribute('data-postid');
                                                            var deleteForm = document.getElementById('deleteForm' + postId);
                                                            var actionUrl = deleteForm.getAttribute('action');
                                                            document.getElementById('deletePostForm').setAttribute('action', actionUrl);
                                                            deleteModal.show();
                                                        });
                                                    });
                                                });
                                            </script>


                                            </td>                  
                                        </tr>
                                    @endforeach   
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
