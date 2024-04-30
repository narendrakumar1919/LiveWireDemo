 <div id="page-container" class="main-content-boxed">

     <!-- Main Container -->

     <main id="main-container">
         @if (session('error'))
             <div class="alert alert-success">
                 {{ session('error') }}
             </div>
         @endif
         <!-- Page Content -->
         <div class="">
             <div class="hero-static content content-full " data-toggle="appear">
                 <!-- Header -->
                 <div class="py-30 px-5 text-center">
                     <a class="link-effect font-w700" href="index.html">
                         <i class="si si-fire"></i>
                         <span class="font-size-xl text-primary-dark">code</span><span class="font-size-xl">base</span>
                     </a>
                     <h1 class="h2 font-w700 mt-50 mb-10">Welcome to Your Dashboard</h1>
                     <h2 class="h4 font-w400 text-muted mb-0">Please sign in</h2>
                 </div>
                 <!-- END Header -->

                 <!-- Sign In Form -->
                 <div class="row justify-content-center px-5">



                     <div class="col-sm-8 col-md-6 col-xl-4">
                         <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js -->
                         <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                         {{-- <form class="js-validation-signin" action="be_pages_auth_all.html" method="post"> --}}
                         {{-- {{ Form::open(['url' => route('admin.login'), 'class' => 'js-validation-signin', 'method' => 'POST']) }} --}}
                         {{-- @csrf --}}
                         <form wire:submit="login">
                             <div class="form-group row">
                                 <div class="col-12">
                                     <div class="form-material floating">
                                         {{-- {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }} --}}
                                         <input type="title" class="form-control" name="email" placeholder="email"
                                             wire:model.blur="email">
                                         @if ($errors->has('email'))
                                             <span class="text-danger">{{ $errors->first('email') }}</span>
                                         @endif
                                     </div>
                                     {{-- @error('email')
                                    <p class="error-help-block">{{ $message }}</p>
                                @enderror --}}

                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-12">
                                     <div class="form-material floating">
                                         {{-- {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }} --}}
                                         <input type="password" name="password" class="form-control" name="password"
                                             placeholder="password" wire:model.blur="password">
                                         @if ($errors->has('password'))
                                             <span class="text-danger">{{ $errors->first('password') }}</span>
                                         @endif
                                     </div>
                                     {{-- @error('password')
                                    <p class="error-help-block">{{ $message }}</p>
                                @enderror --}}
                                 </div>
                             </div>
                             <div class="form-group row gutters-tiny">
                                 <div class="col-12 mb-10">
                                     {{-- {{ Form::submit('Login', ['class' => 'btn btn-block btn-hero btn-noborder btn-rounded btn-alt-success']) }} --}}
                                     <button
                                         class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-success">Login</button>
                                 </div>
                                 <div class="col-sm-6 mb-5">
                                     <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="{{route('register')}}" wire:navigate>
                                         <i class="fa fa-plus text-muted mr-5"></i> New Account
                                     </a>
                                 </div>
                                 <div class="col-sm-6 mb-5">
                                     <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary"
                                         href="op_auth_reminder.html">
                                         <i class="fa fa-warning text-muted mr-5"></i> Forgot password
                                     </a>
                                 </div>
                             </div>
                         </form>
                         {{-- {{ Form::close() }} --}}
                     </div>
                 </div>
                 <!-- END Sign In Form -->
             </div>
         </div>
         <!-- END Page Content -->

     </main>
     <!-- END Main Container -->
 </div>
 <!-- END Page Container -->
