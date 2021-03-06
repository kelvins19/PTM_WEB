@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Login</div>
                  <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger text-center" role="alert">
                                <p>{{ implode('', $errors->all()) }}</p>
                            </div>
                        @endif
                      <form id="login" action="{{ route('login.post') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          @method('post')
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Login
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection

@push('scripts')
<script>
    $(() => {
        $('#login').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('login.post') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: new FormData(event.target),
                dataType: 'html',
                processData: false,
                contentType:"application/json",
            }).done(function() {
                location.href = "{{ route('products') }}"
            }).fail(function(_) {
                iziToast.error({
                    title: 'Error',
                    message: 'Login Failed',
                    position: 'topRight'
                });
            });
        })
    });
</script>
@endpush