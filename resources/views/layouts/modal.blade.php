


<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    {{-- @if(session('modalshow'))
    <script>
     $(function(){
      $('#loginModal').modal('show');
     });
    </script>
  @endif --}}
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="loginForm" action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div id="errorContainer" class="alert alert-danger" role="alert" style="display: none;"></div>
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="loginEmail" placeholder="Your email">
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Your password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('signup') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div id="success-message" class="alert alert-success" role="alert" style="display: none;"></div>
                    <div class="mb-3">
                        <label for="signupFirstName" class="form-label">First Name</label>
                        <input type="text" name="firstname" class="form-control" id="signupFirstName" placeholder="Your first name" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupLastName" class="form-label">Last Name</label>
                        <input type="text" name="lastname" class="form-control" id="signupLastName" placeholder="Your last name" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="signupEmail" placeholder="Your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="signupPassword" placeholder="Your password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Your Confirm password" required>
                    </div>

              <div class="input-group">

                <div class="mb-3">
                    <label for="userImage" class="form-label">Choose Profile Image</label>

                    <input type="file" name="user_image" class="form-control-file" id="user_image">

                </div>

            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Signup</button>
                </div>
            </form>
        </div>
    </div>
</div>



           <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script>
                $(document).ready(function () {
                    const loginForm = $('#loginForm');
                    const errorContainer = $('#errorContainer');

                    loginForm.submit(function (event) {
                        // Prevent the default form submission
                        event.preventDefault();

                        // Clear any previous error messages
                        errorContainer.hide();

                        // Collect form data
                        const formData = loginForm.serialize();

                        // Perform client-side validation (you can add more validation rules as needed)
                        const email = $('#loginEmail').val();
                        const password = $('#loginPassword').val();

                        if (!email) {
                            errorContainer.text('Email is required.').show();
                            return;
                        }

                        if (!password) {
                            errorContainer.text('Password is required.').show();
                            //console.log('dddkdk');
                              return;
                        }

                        // Make an Ajax request to submit the form data
                        $.ajax({
                            type: 'POST',
                            url: loginForm.attr('action'),
                            data: formData,
                            success: function (response) {
                                if (response.success===true) {
                                if(response.user){
                                  //  $('#success-message2').show();
                                     alert('logged in successfully');
                                     $('#loginModal').modal('hide');

                                     location.reload();

                                }
                            }  else{
                                    alert('password or email incorrect')
                                }
                            },
                            error: function (error) {
                                console.error(error);
                            }
                        });
                    });
                });
            </script>






