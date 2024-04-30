<div>
    <div id="page-container" class="main-content-boxed">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="">
                <div class="hero-static content content-full" data-toggle="appear">
                    <!-- Header -->
                    <div class="py-30 px-5 text-center">
                        <a class="link-effect font-w700" href="index.html">
                            <i class="si si-fire"></i>
                            <span class="font-size-xl text-primary-dark">code</span><span
                                class="font-size-xl">base</span>
                        </a>
                        <h1 class="h2 font-w700 mt-50 mb-10">Create New Account</h1>
                        <h2 class="h4 font-w400 text-muted mb-0">Please add your details</h2>
                    </div>
                    <!-- END Header -->

                    <!-- Sign Up Form -->

                    <div class="row justify-content-center px-5">
                        <div class="col-sm-8 col-md-6 col-xl-4">
                            <!-- jQuery Validation functionality is initialized with .js-validation-signup class in js/pages/op_auth_signup.min.js which was auto compiled from _es6/pages/op_auth_signup.js -->
                            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            {{-- < class="js-validation-signup" action="be_pages_auth_all.html" method="post"> --}}
                            {{-- {{ Form::open(['url' => route('admin.store'), 'class' => 'js-validation-signup', 'method' => 'POST']) }} --}}
<form wire:submit="register">
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        {{-- {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Username']) }} --}}
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Username" wire:model.blur="name">
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                        {{-- <label for="signup-username">Username</label> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        {{-- {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }} --}}
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" wire:model.blur="email">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                        {{-- <label for="signup-email">Email</label> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        {{-- {{ Form::tel('mobile', null, ['class' => 'form-control', 'placeholder' => 'Mobile']) }} --}}
                                        <input type="tel" name="mobile" class="form-control @error('name') is-invalid @enderror" placeholder="Mobile" wire:model.blur="mobile">
                                        @if ($errors->has('mobile'))
                                        <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                    @endif
                                        {{-- <label for="mobile">Mobile</label> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        {{-- {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }} --}}
                                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" wire:model.blur="password">
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif

                                        {{-- <label for="signup-password">Password</label> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        {{-- {{ Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) }} --}}
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" wire:model.blur="password_confirmation">
                                        {{-- <label for="signup-password-confirm">Confirm Password</label> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row text-center">
                                <div class="col-12">

                                </div>
                            </div>
                            <div class="form-group row gutters-tiny">
                                <div class="col-12 mb-10">
                                    {{-- {{ Form::submit('Submit', ['class' => 'btn btn-block btn-hero btn-noborder btn-rounded btn-alt-success']) }} --}}
                                    <button class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-success">Submit</button>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="#"
                                        data-toggle="modal" data-target="#modal-terms">
                                        <i class="si si-book-open text-muted mr-10"></i> Read Terms
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary"
                                        href="{{route('login')}}" wire:navigate>
                                        <i class="si si-login text-muted mr-10"></i> Sign In
                                    </a>
                                </div>
                            </div>
                            </form>
                            {{-- {{ Form::close() }} --}}
                        </div>
                    </div>
                    <!-- END Sign Up Form -->
                </div>
            </div>
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!-- Terms Modal -->
    <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Terms &amp; Conditions</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat
                            magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna
                            molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero
                            condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat
                            nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas
                            vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi
                            suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh
                            orci.</p>
                        <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat
                            magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna
                            molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero
                            condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat
                            nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas
                            vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi
                            suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh
                            orci.</p>
                        <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat
                            magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna
                            molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero
                            condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat
                            nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas
                            vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi
                            suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh
                            orci.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-alt-success" data-dismiss="modal">
                        <i class="fa fa-check"></i> Perfect
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
